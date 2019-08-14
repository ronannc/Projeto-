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
use App\Repositories\Contracts\BackWorkoutRepository;
use App\Repositories\Contracts\BicepsRepository;
use App\Repositories\Contracts\BicepsTreinoRepository;
use App\Repositories\Contracts\BreastRepository;
use App\Repositories\Contracts\ClientRepository;
use App\Repositories\Contracts\ConfiguracaoClienteRepository;
use App\Repositories\Contracts\ExercicioTreinoRepository;
use App\Repositories\Contracts\LowerMemberRepository;
use App\Repositories\Contracts\LowerMemberWorkoutRepository;
use App\Repositories\Contracts\PeitoralTreinoRepository;
use App\Repositories\Contracts\ShoulderRepository;
use App\Repositories\Contracts\ShoulderWorkoutRepository;
use App\Repositories\Contracts\TreinoRepository;
use App\Repositories\Contracts\TricepsRepository;
use App\Repositories\Contracts\TricepsTreinoRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\EloquentBackRepository;
use App\Repositories\EloquentBackWorkoutRepository;
use App\Repositories\EloquentBicepsRepository;
use App\Repositories\EloquentBicepsTreinoRepository;
use App\Repositories\EloquentBreastRepository;
use App\Repositories\EloquentBreastTreinoRepository;
use App\Repositories\EloquentClientRepository;
use App\Repositories\EloquentConfiguracaoClienteRepository;
use App\Repositories\EloquentLowerMemberRepository;
use App\Repositories\EloquentLowerMemberTreinoRepository;
use App\Repositories\EloquentShoulderRepository;
use App\Repositories\EloquentShoulderTreinoRepository;
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

        $this->app->bind(BackWorkoutRepository::class, function () {
            return new EloquentBackWorkoutRepository(new CostaTreino());
        });

        $this->app->bind(LowerMemberRepository::class, function () {
            return new EloquentLowerMemberRepository(new MembroInferior());
        });

        $this->app->bind(LowerMemberWorkoutRepository::class, function () {
            return new EloquentLowerMemberTreinoRepository(new MembroInferiorTreino());
        });

        $this->app->bind(ShoulderRepository::class, function () {
            return new EloquentShoulderRepository(new Ombro());
        });

        $this->app->bind(ShoulderWorkoutRepository::class, function () {
            return new EloquentShoulderTreinoRepository(new OmbroTreino());
        });

        $this->app->bind(BreastRepository::class, function () {
            return new EloquentBreastRepository(new Peitoral());
        });

        $this->app->bind(PeitoralTreinoRepository::class, function () {
            return new EloquentBreastTreinoRepository(new PeitoralTreino());
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
            BackWorkoutRepository::class,
            LowerMemberRepository::class,
            LowerMemberWorkoutRepository::class,
            ShoulderRepository::class,
            ShoulderWorkoutRepository::class,
            BreastRepository::class,
            PeitoralTreinoRepository::class,
            TreinoRepository::class,
            ExercicioTreinoRepository::class,
            TricepsRepository::class,
            TricepsTreinoRepository::class,
            UserRepository::class
        ];
    }
}
