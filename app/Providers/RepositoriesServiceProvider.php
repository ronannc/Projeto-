<?php

namespace App\Providers;

use App\Models\Biceps;
use App\Models\BicepsTreino;
use App\Models\Cliente;
use App\Models\ConfiguracaoCliente;
use App\Models\Costa;
use App\Models\CostaTreino;
use App\Models\MembroInferior;
use App\Models\MembroInferiorTreino;
use App\Models\Ombro;
use App\Models\OmbroTreino;
use App\Models\Peitoral;
use App\Models\PeitoralTreino;
use App\Models\Treino;
use App\Models\Triceps;
use App\Models\TricepsTreino;
use App\Models\User;
use App\Repositories\Contracts\BackRepository;
use App\Repositories\Contracts\BicepsRepository;
use App\Repositories\Contracts\BicepsTreinoRepository;
use App\Repositories\Contracts\ClientRepository;
use App\Repositories\Contracts\ConfiguracaoClienteRepository;
use App\Repositories\Contracts\CostaTreinoRepository;
use App\Repositories\Contracts\ExercicioTreinoRepository;
use App\Repositories\Contracts\MembroInferiorRepository;
use App\Repositories\Contracts\MembroInferiorTreinoRepository;
use App\Repositories\Contracts\OmbroRepository;
use App\Repositories\Contracts\OmbroTreinoRepository;
use App\Repositories\Contracts\PeitoralRepository;
use App\Repositories\Contracts\PeitoralTreinoRepository;
use App\Repositories\Contracts\TreinoRepository;
use App\Repositories\Contracts\TricepsRepository;
use App\Repositories\Contracts\TricepsTreinoRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\EloquentBackRepository;
use App\Repositories\EloquentBackTreinoRepository;
use App\Repositories\EloquentBicepsRepository;
use App\Repositories\EloquentBicepsTreinoRepository;
use App\Repositories\EloquentClientRepository;
use App\Repositories\EloquentConfiguracaoClienteRepository;
use App\Repositories\EloquentMembroInferiorRepository;
use App\Repositories\EloquentMembroInferiorTreinoRepository;
use App\Repositories\EloquentOmbroRepository;
use App\Repositories\EloquentOmbroTreinoRepository;
use App\Repositories\EloquentPeitoralRepository;
use App\Repositories\EloquentPeitoralTreinoRepository;
use App\Repositories\EloquentTreinoRepository;
use App\Repositories\EloquentTricepsRepository;
use App\Repositories\EloquentTricepsTreinoRepository;
use App\Repositories\EloquentUserRepository;
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

        $this->app->bind(BicepsTreinoRepository::class, function () {
            return new EloquentBicepstreinoRepository(new BicepsTreino());
        });

        $this->app->bind(ClientRepository::class, function () {
            return new EloquentClientRepository(new Cliente());
        });

        $this->app->bind(ConfiguracaoClienteRepository::class, function () {
            return new EloquentConfiguracaoClienteRepository(new ConfiguracaoCliente());
        });


        $this->app->bind(BackRepository::class, function () {
            return new EloquentBackRepository(new Costa());
        });

        $this->app->bind(CostaTreinoRepository::class, function () {
            return new EloquentBackTreinoRepository(new CostaTreino());
        });

        $this->app->bind(MembroInferiorRepository::class, function () {
            return new EloquentMembroInferiorRepository(new MembroInferior());
        });

        $this->app->bind(MembroInferiortreinoRepository::class, function () {
            return new EloquentMembroInferiorTreinoRepository(new MembroInferiorTreino());
        });

        $this->app->bind(OmbroRepository::class, function () {
            return new EloquentOmbroRepository(new Ombro());
        });

        $this->app->bind(OmbroTreinoRepository::class, function () {
            return new EloquentOmbroTreinoRepository(new OmbroTreino());
        });

        $this->app->bind(PeitoralRepository::class, function () {
            return new EloquentPeitoralRepository(new Peitoral());
        });

        $this->app->bind(PeitoralTreinoRepository::class, function () {
            return new EloquentPeitoralTreinoRepository(new PeitoralTreino());
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

        $this->app->bind(TricepsTreinoRepository::class, function () {
            return new EloquentTricepsTreinoRepository(new TricepsTreino());
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
            BicepsTreinoRepository::class,
            ClientRepository::class,
            ConfiguracaoClienteRepository::class,
            BackRepository::class,
            CostaTreinoRepository::class,
            MembroInferiorRepository::class,
            MembroInferiorTreinoRepository::class,
            OmbroRepository::class,
            OmbroTreinoRepository::class,
            PeitoralRepository::class,
            PeitoralTreinoRepository::class,
            TreinoRepository::class,
            ExercicioTreinoRepository::class,
            TricepsRepository::class,
            TricepsTreinoRepository::class,
            UserRepository::class
        ];
    }
}
