<?php


namespace App\Services;

use App\Models\Company;
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
        $password = substr(Uuid::uuid4(), 0, 8);
        $data['password'] = bcrypt($password);

        try {
            return DB::transaction(function () use ($data, $password) {

                $user = $this->userRepository->store($data);
                $user->assignRole($data['role']);

                if ($data['role'] === User::ADMIN) {
                    $companies = Company::all();

                    foreach ($companies as $company) {
                        $company->users()->syncWithoutDetaching([$user->id]);
                    }
                }

                Notification::send($user, new WelcomeEmailNotification($data['email'], $password));

                return $user;
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
            $update = $this->userRepository->update($user, $data);
            return $update;
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
            $delete = $this->userRepository->delete($user);
            return $delete;
        } catch (\Exception $exception) {
            return [
                'error'   => true,
                'message' => $exception->getMessage()
            ];
        }
    }


}
