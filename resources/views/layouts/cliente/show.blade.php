@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')
    @include('layouts.components.menssagens')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{$cliente['nome']}}</h3>
                    <h5 class="widget-user-desc">Descricao do Treino: {{$treino['descricao'] ?? ''}}</h5>
                </div>

                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$treino['objetivo'] ?? ''}}</h5>
                                <span class="description-text">Objetivo Treino</span>
                            </div>
                        </div>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$treino['inicio'] ?? ''}}</h5>
                                <span class="description-text">Inicio Treino</span>
                            </div>
                        </div>
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$treino['metodo'] ?? ''}}</h5>
                                <span class="description-text">Metodo Treino</span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="description-block">
                                <h5 class="description-header">{{$treino['intervalo'] ?? ''}}</h5>
                                <span class="description-text">Intervalo Treino</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Triceps</h3>
                </div>
                <div class="box-body">
                    @foreach($treino['triceps_treino'] as $exercicioTreino)
                        <p>{{ \App\Models\Triceps::find($exercicioTreino['id_triceps'])['exercicio']}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Biceps</h3>
                </div>
                <div class="box-body">
                    @foreach($treino['biceps_treino'] as $exercicioTreino)
                        <p>{{ \App\Models\Biceps::find($exercicioTreino['id_biceps'])['exercicio']}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Peitoral</h3>
                </div>
                <div class="box-body">
                    @foreach($treino['peitoral_treino'] as $exercicioTreino)
                        <p>{{ \App\Models\Peitoral::find($exercicioTreino['id_peitoral'])['exercicio']}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Costa</h3>
                </div>
                <div class="box-body">
                    @foreach($treino['costa_treino'] as $exercicioTreino)
                        <p>{{ \App\Models\Costa::find($exercicioTreino['id_costa'])['exercicio']}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Ombro</h3>
                </div>
                <div class="box-body">
                    @foreach($treino['ombro_treino'] as $exercicioTreino)
                        <p>{{ \App\Models\Ombro::find($exercicioTreino['id_ombro'])['exercicio']}}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Membro Inferior</h3>
                </div>
                <div class="box-body">
                    @foreach($treino['membro_inferior_treino'] as $exercicioTreino)
                        <p>{{ \App\Models\MembroInferior::find($exercicioTreino['id_membro_inferior'])['exercicio']}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>





@stop

@section('js')

@stop
