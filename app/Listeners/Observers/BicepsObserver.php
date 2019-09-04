<?php

namespace App\Listeners\Observers;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BicepsObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param Model $model
     *
     * @return void
     * @throws Exception
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
        //
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
