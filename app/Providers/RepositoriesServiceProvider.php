<?php

namespace App\Providers;

use App\Models\Back;
use App\Models\BackWorkout;
use App\Models\Biceps;
use App\Models\BicepsWorkout;
use App\Models\Breast;
use App\Models\BreastWorkout;
use App\Models\Client;
use App\Models\Company;
use App\Models\Goal;
use App\Models\LowerMember;
use App\Models\LowerMemberWorkout;
use App\Models\Permission;
use App\Models\PhysicalAssessment;
use App\Models\Role;
use App\Models\Shoulder;
use App\Models\ShoulderWorkout;
use App\Models\Triceps;
use App\Models\TricepsWorkout;
use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutMode;
use App\Repositories\Contracts\BackRepository;
use App\Repositories\Contracts\BackWorkoutRepository;
use App\Repositories\Contracts\BicepsRepository;
use App\Repositories\Contracts\BicepsWorkoutRepository;
use App\Repositories\Contracts\BreastRepository;
use App\Repositories\Contracts\BreastWorkoutRepository;
use App\Repositories\Contracts\ClientRepository;
use App\Repositories\Contracts\CompanyRepository;
use App\Repositories\Contracts\GoalRepository;
use App\Repositories\Contracts\LowerMemberRepository;
use App\Repositories\Contracts\LowerMemberWorkoutRepository;
use App\Repositories\Contracts\PermissionRepository;
use App\Repositories\Contracts\PhysicalAssessmentRepository;
use App\Repositories\Contracts\RoleRepository;
use App\Repositories\Contracts\ShoulderRepository;
use App\Repositories\Contracts\ShoulderWorkoutRepository;
use App\Repositories\Contracts\TricepsRepository;
use App\Repositories\Contracts\TricepsWorkoutRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\WorkoutModeRepository;
use App\Repositories\Contracts\WorkoutRepository;
use App\Repositories\EloquentBackRepository;
use App\Repositories\EloquentBackWorkoutRepository;
use App\Repositories\EloquentBicepsRepository;
use App\Repositories\EloquentBicepsWorkoutRepository;
use App\Repositories\EloquentBreastRepository;
use App\Repositories\EloquentBreastWorkoutRepository;
use App\Repositories\EloquentClientRepository;
use App\Repositories\EloquentCompanyRepository;
use App\Repositories\EloquentGoalRepository;
use App\Repositories\EloquentLowerMemberRepository;
use App\Repositories\EloquentLowerMemberTreinoRepository;
use App\Repositories\EloquentPermissionRepository;
use App\Repositories\EloquentPhysicalAssessmentRepository;
use App\Repositories\EloquentRoleRepository;
use App\Repositories\EloquentShoulderRepository;
use App\Repositories\EloquentShoulderWorkoutRepository;
use App\Repositories\EloquentTricepsRepository;
use App\Repositories\EloquentTricepsWorkoutRepository;
use App\Repositories\EloquentUserRepository;
use App\Repositories\EloquentWorkoutModeRepository;
use App\Repositories\EloquentWorkoutRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(BicepsRepository::class, function () {
            return new EloquentBicepsRepository(new Biceps());
        });

        $this->app->bind(BicepsWorkoutRepository::class, function () {
            return new EloquentBicepsWorkoutRepository(new BicepsWorkout());
        });

        $this->app->bind(ClientRepository::class, function () {
            return new EloquentClientRepository(new Client());
        });

        $this->app->bind(BackRepository::class, function () {
            return new EloquentBackRepository(new Back());
        });

        $this->app->bind(BackWorkoutRepository::class, function () {
            return new EloquentBackWorkoutRepository(new BackWorkout());
        });

        $this->app->bind(LowerMemberRepository::class, function () {
            return new EloquentLowerMemberRepository(new LowerMember());
        });

        $this->app->bind(LowerMemberWorkoutRepository::class, function () {
            return new EloquentLowerMemberTreinoRepository(new LowerMemberWorkout());
        });

        $this->app->bind(ShoulderRepository::class, function () {
            return new EloquentShoulderRepository(new Shoulder());
        });

        $this->app->bind(ShoulderWorkoutRepository::class, function () {
            return new EloquentShoulderWorkoutRepository(new ShoulderWorkout());
        });

        $this->app->bind(BreastRepository::class, function () {
            return new EloquentBreastRepository(new Breast());
        });

        $this->app->bind(BreastWorkoutRepository::class, function () {
            return new EloquentBreastWorkoutRepository(new BreastWorkout());
        });

        $this->app->bind(WorkoutRepository::class, function () {
            return new EloquentWorkoutRepository(new Workout());
        });

        $this->app->bind(UserRepository::class, function () {
            return new EloquentUserRepository(new User());
        });

        $this->app->bind(TricepsRepository::class, function () {
            return new EloquentTricepsRepository(new Triceps());
        });

        $this->app->bind(TricepsWorkoutRepository::class, function () {
            return new EloquentTricepsWorkoutRepository(new TricepsWorkout());
        });

        $this->app->bind(WorkoutModeRepository::class, function () {
            return new EloquentWorkoutModeRepository(new WorkoutMode());
        });

        $this->app->bind(CompanyRepository::class, function () {
            return new EloquentCompanyRepository(new Company());
        });

        $this->app->bind(PhysicalAssessmentRepository::class, function () {
            return new EloquentPhysicalAssessmentRepository(new PhysicalAssessment());
        });

        $this->app->bind(RoleRepository::class, function () {
            return new EloquentRoleRepository(new Role());
        });

        $this->app->bind(PermissionRepository::class, function () {
            return new EloquentPermissionRepository(new Permission());
        });

        $this->app->bind(GoalRepository::class, function () {
            return new EloquentGoalRepository(new Goal());
        });

    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            BicepsRepository::class,
            BicepsWorkoutRepository::class,
            ClientRepository::class,
            BackRepository::class,
            BackWorkoutRepository::class,
            LowerMemberRepository::class,
            LowerMemberWorkoutRepository::class,
            ShoulderRepository::class,
            ShoulderWorkoutRepository::class,
            BreastRepository::class,
            BreastWorkoutRepository::class,
            WorkoutRepository::class,
            TricepsRepository::class,
            TricepsWorkoutRepository::class,
            UserRepository::class,
            CompanyRepository::class,
            PhysicalAssessmentRepository::class,
            RoleRepository::class,
            PermissionRepository::class,
            GoalRepository::class,
        ];
    }
}
