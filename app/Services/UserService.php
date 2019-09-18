<?php


namespace App\Services;

use App\Models\User;
use App\Notifications\WelcomeEmailNotification;
use App\Repositories\Contracts\UserRepository;
use App\Support\Notify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Ramsey\Uuid\Uuid;

class UserService
{
    /** @var UserRepository */
    protected $repository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(array $data)
    {
        try {
            $password = substr(Uuid::uuid4(), 0, 8);
            $data['password'] = bcrypt($password);

            return DB::transaction(function () use ($data, $password) {

                /** @var User $response */
                $response = $this->repository->store($data);
                $response->assignRole($data['role']);

                Notification::send($response, new WelcomeEmailNotification($data['email'], $password));

                return $response;
            });


        } catch (\Exception $exception) {
            Log::error(Notify::log($exception));

            return [
                'error'   => true,
                'message' => Notify::ERROR_MESSAGE
            ];
        }
    }

    public function update(array $data, User $user)
    {
        try {
            $response = $this->repository->update($user, $data);
            return $response;
        } catch (\Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function destroy($id)
    {
        $model = $this->repository->findOneById($id);

        try {
            return $model->delete();
        } catch (\Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
