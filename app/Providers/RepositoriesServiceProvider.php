<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Biceps;
use App\Models\Cliente;
use App\Models\Costa;
use App\Models\MembroInferior;
use App\Models\Ombro;
use App\Models\Peitoral;
use App\Models\Treino;
use App\Models\Triceps;
use App\Models\User;
use App\Repositories\Contracts\BicepsRepository;
use App\Repositories\Contracts\ClienteRepository;
use App\Repositories\Contracts\CostaRepository;
use App\Repositories\Contracts\MembroInferiorRepository;
use App\Repositories\Contracts\OmbroRepository;
use App\Repositories\Contracts\PeitoralRepository;
use App\Repositories\Contracts\TreinoRepository;
use App\Repositories\Contracts\TricepsRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\EloquentBicepsRepository;
use App\Repositories\EloquentClienteRepository;
use App\Repositories\EloquentCostaRepository;
use App\Repositories\EloquentMembroInferiorRepository;
use App\Repositories\EloquentPeitoralRepository;
use App\Repositories\EloquentTreinoRepository;
use App\Repositories\EloquentTricepsRepository;
use App\Repositories\EloquentOmbroRepository;
use App\Repositories\EloquentUserRepository;

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

        $this->app->bind(ClienteRepository::class, function () {
            return new EloquentClienteRepository(new Cliente());
        });

        $this->app->bind(CostaRepository::class, function () {
            return new EloquentCostaRepository(new Costa());
        });


        $this->app->bind(MembroInferiorRepository::class, function () {
            return new EloquentMembroInferiorRepository(new MembroInferior());
        });

        $this->app->bind(OmbroRepository::class, function () {
            return new EloquentOmbroRepository(new Ombro());
        });

        $this->app->bind(PeitoralRepository::class, function () {
            return new EloquentPeitoralRepository(new Peitoral());
        });

        $this->app->bind(TreinoRepository::class, function () {
            return new EloquentTreinoRepository(new Treino());
        });

        $this->app->bind(UserRepository::class, function () {
            return new EloquentUserRepository(new User());
        });

        $this->app->bind(TricepsRepository::class, function () {
            return new EloquentTricepsRepository(new Triceps());
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
            ClienteRepository::class,
            CostaRepository::class,
            MembroInferiorRepository::class,
            OmbroRepository::class,
            PeitoralRepository::class,
            TreinoRepository::class,
            TricepsRepository::class,
            UserRepository::class
        ];
    }
}
