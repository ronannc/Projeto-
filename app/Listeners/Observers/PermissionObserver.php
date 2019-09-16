<?php

namespace App\Listeners\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Uuid;

class PermissionObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param Model $model
     *
     * @return void
     * @throws \Exception
     */
    public function creating(Model $model)
    {
        $model->id = Uuid::uuid4();
    }

    /**
     * Handle the user "created" event.
     *
     * @param Model $model
     *
     * @return void
     */
    public function created(Model $model)
    {
        Cache::tags('permissions')->flush();
        Cache::forget('spatie.permission.cache');
    }

    /**
     * Handle the user "updated" event.
     *
     * @param Model $model
     *
     * @return void
     */
    public function updated(Model $model)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param Model $model
     *
     * @return void
     */
    public function deleted(Model $model)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param Model $model
     *
     * @return void
     */
    public function restored(Model $model)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param Model $model
     *
     * @return void
     */
    public function forceDeleted(Model $model)
    {
        //
    }
}
