<?php

namespace App\Providers;

use App\Listeners\Observers\BackObserver;
use App\Listeners\Observers\BackWorkoutObserver;
use App\Listeners\Observers\BicepsObserver;
use App\Listeners\Observers\BicepsWorkoutObserver;
use App\Listeners\Observers\BreastObserver;
use App\Listeners\Observers\BreastWorkoutObserver;
use App\Listeners\Observers\ClientObserver;
use App\Listeners\Observers\CompanyObserver;
use App\Listeners\Observers\LowerMemberObserver;
use App\Listeners\Observers\LowerMemberWorkoutObserver;
use App\Listeners\Observers\MethodObserver;
use App\Listeners\Observers\PermissionObserver;
use App\Listeners\Observers\PhysicalAssessmentObserver;
use App\Listeners\Observers\RoleObserver;
use App\Listeners\Observers\ShoulderObserver;
use App\Listeners\Observers\ShoulderWorkoutObserver;
use App\Listeners\Observers\TricepsObserver;
use App\Listeners\Observers\TricepsWorkoutObserver;
use App\Listeners\Observers\UserObserver;
use App\Listeners\Observers\WorkoutModeObserver;
use App\Listeners\Observers\WorkoutObserver;
use App\Models\Back;
use App\Models\BackWorkout;
use App\Models\Biceps;
use App\Models\BicepsWorkout;
use App\Models\Breast;
use App\Models\BreastWorkout;
use App\Models\Client;
use App\Models\Company;
use App\Models\LowerMember;
use App\Models\LowerMemberWorkout;
use App\Models\Method;
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
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Back::observe(BackObserver::class);
        BackWorkout::observe(BackWorkoutObserver::class);
        Biceps::observe(BicepsObserver::class);
        BicepsWorkout::observe(BicepsWorkoutObserver::class);
        Breast::observe(BreastObserver::class);
        BreastWorkout::observe(BreastWorkoutObserver::class);
        Client::observe(ClientObserver::class);
        Company::observe(CompanyObserver::class);
        LowerMember::observe(LowerMemberObserver::class);
        LowerMemberWorkout::observe(LowerMemberWorkoutObserver::class);
        Method::observe(MethodObserver::class);
        PhysicalAssessment::observe(PhysicalAssessmentObserver::class);
        Shoulder::observe(ShoulderObserver::class);
        ShoulderWorkout::observe(ShoulderWorkoutObserver::class);
        Triceps::observe(TricepsObserver::class);
        TricepsWorkout::observe(TricepsWorkoutObserver::class);
        User::observe(UserObserver::class);
        Workout::observe(WorkoutObserver::class);
        WorkoutMode::observe(WorkoutModeObserver::class);
        Permission::observe(PermissionObserver::class);
        Role::observe(RoleObserver::class);
    }
}
