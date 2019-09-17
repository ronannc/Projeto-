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
    protected $userRepository;

    /**
     * StationService constructor.
     *
     * @param $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->userRepository = $repository;
    }

    public function store(array $data)
    {
        try {
            $password = substr(Uuid::uuid4(), 0, 8);
            $data['password'] = bcrypt($password);

            return DB::transaction(function () use ($data, $password) {

                /** @var User $response */
                $response = $this->userRepository->store($data);
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
            $response = $this->userRepository->update($user, $data);
            return $response;
        } catch (\Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }

    public function delete(User $user)
    {
        try {
            $response = $this->userRepository->delete($user);
            return $response;
        } catch (\Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
