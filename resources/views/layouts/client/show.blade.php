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
                    <h5 class="widget-user-desc">Identificador: {{$cliente['id'] ?? ''}}</h5>
                </div>

                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$cliente['cpf'] ?? ''}}</h5>
                                <span class="description-text">CPF</span>
                            </div>
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$cliente['telefone'] ?? ''}}</h5>
                                <span class="description-text">Telefone</span>
                            </div>
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$cliente['nascimento'] ?? ''}}</h5>
                                <span class="description-text">Data Nascimento</span>
                            </div>
                        </div>
{{--                        <div class="col-sm-3">--}}
{{--                            <div class="description-block">--}}
                        {{--                                <h5 class="description-header">{{$client['intervalo'] ?? ''}}</h5>--}}
{{--                                <span class="description-text">Intervalo Treino</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listagem de Treinos</h3>
        </div>
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
    </div>

{{--    <div class="row">--}}
{{--        <div class="col-sm-4">--}}
{{--            <div class="box box-primary">--}}
{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">Triceps</h3>--}}
{{--                </div>--}}
{{--                <div class="box-body">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th style="width: 10px">#</th>--}}
{{--                            <th>Exercicio</th>--}}
{{--                            <th>Rep</th>--}}
{{--                            <th>Serie</th>--}}
{{--                            <th>Kg</th>--}}
{{--                        </tr>--}}
    {{--                    @foreach($workout['triceps_treino'] as $exercicioTreino)--}}

{{--                            <tr>--}}
{{--                                <td>{{$exercicioTreino['id_triceps']}}</td>--}}
{{--                                <td>{{ \App\Models\Triceps::find($exercicioTreino['id_triceps'])['exercicio']}}</td>--}}
{{--                                <td>{{$exercicioTreino['rep']}}</td>--}}
{{--                                <td>{{$exercicioTreino['serie']}}</td>--}}
{{--                                <td>{{$exercicioTreino['kg']}}</td>--}}
{{--                            </tr>--}}

{{--                    @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-sm-4">--}}
{{--            <div class="box box-primary">--}}
{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">Biceps</h3>--}}
{{--                </div>--}}
{{--                <div class="box-body">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th style="width: 10px">#</th>--}}
{{--                            <th>Exercicio</th>--}}
{{--                            <th>Rep</th>--}}
{{--                            <th>Serie</th>--}}
{{--                            <th>Kg</th>--}}
{{--                        </tr>--}}
    {{--                    @foreach($workout['biceps_treino'] as $exercicioTreino)--}}
{{--                        <tr>--}}
{{--                            <td>{{$exercicioTreino['id_biceps']}}</td>--}}
{{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['id_biceps'])['exercicio']}}</td>--}}
{{--                            <td>{{$exercicioTreino['rep']}}</td>--}}
{{--                            <td>{{$exercicioTreino['serie']}}</td>--}}
{{--                            <td>{{$exercicioTreino['kg']}}</td>--}}
{{--                        </tr>                    @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-sm-4">--}}
{{--            <div class="box box-primary">--}}
{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">Peitoral</h3>--}}
{{--                </div>--}}
{{--                <div class="box-body">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th style="width: 10px">#</th>--}}
{{--                            <th>Exercicio</th>--}}
{{--                            <th>Rep</th>--}}
{{--                            <th>Serie</th>--}}
{{--                            <th>Kg</th>--}}
{{--                        </tr>--}}
    {{--                    @foreach($workout['peitoral_treino'] as $exercicioTreino)--}}
{{--                        <tr>--}}
{{--                            <td>{{$exercicioTreino['id_peitoral']}}</td>--}}
{{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['id_peitoral'])['exercicio']}}</td>--}}
{{--                            <td>{{$exercicioTreino['rep']}}</td>--}}
{{--                            <td>{{$exercicioTreino['serie']}}</td>--}}
{{--                            <td>{{$exercicioTreino['kg']}}</td>--}}
{{--                        </tr>                    @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="row">--}}

{{--        <div class="col-sm-4">--}}
{{--            <div class="box box-primary">--}}
{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">Costa</h3>--}}
{{--                </div>--}}
{{--                <div class="box-body">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th style="width: 10px">#</th>--}}
{{--                            <th>Exercicio</th>--}}
{{--                            <th>Rep</th>--}}
{{--                            <th>Serie</th>--}}
{{--                            <th>Kg</th>--}}
{{--                        </tr>--}}
    {{--                    @foreach($workout['costa_treino'] as $exercicioTreino)--}}
{{--                        <tr>--}}
{{--                            <td>{{$exercicioTreino['id_costa']}}</td>--}}
{{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['id_costa'])['exercicio']}}</td>--}}
{{--                            <td>{{$exercicioTreino['rep']}}</td>--}}
{{--                            <td>{{$exercicioTreino['serie']}}</td>--}}
{{--                            <td>{{$exercicioTreino['kg']}}</td>--}}
{{--                        </tr>                    @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-sm-4">--}}
{{--            <div class="box box-primary">--}}
{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">Ombro</h3>--}}
{{--                </div>--}}
{{--                <div class="box-body">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th style="width: 10px">#</th>--}}
{{--                            <th>Exercicio</th>--}}
{{--                            <th>Rep</th>--}}
{{--                            <th>Serie</th>--}}
{{--                            <th>Kg</th>--}}
{{--                        </tr>--}}
    {{--                    @foreach($workout['ombro_treino'] as $exercicioTreino)--}}
{{--                        <tr>--}}
{{--                            <td>{{$exercicioTreino['id_ombro']}}</td>--}}
{{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['id_ombro'])['exercicio']}}</td>--}}
{{--                            <td>{{$exercicioTreino['rep']}}</td>--}}
{{--                            <td>{{$exercicioTreino['serie']}}</td>--}}
{{--                            <td>{{$exercicioTreino['kg']}}</td>--}}
{{--                        </tr>                    @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="col-sm-4">--}}
{{--            <div class="box box-primary">--}}
{{--                <div class="box-header">--}}
{{--                    <h3 class="box-title">Membro Inferior</h3>--}}
{{--                </div>--}}
{{--                <div class="box-body">--}}
{{--                    <table class="table table-striped">--}}
{{--                        <tbody>--}}
{{--                        <tr>--}}
{{--                            <th style="width: 10px">#</th>--}}
{{--                            <th>Exercicio</th>--}}
{{--                            <th>Rep</th>--}}
{{--                            <th>Serie</th>--}}
{{--                            <th>Kg</th>--}}
{{--                        </tr>--}}
    {{--                    @foreach($workout['membro_inferior_treino'] as $exercicioTreino)--}}
{{--                        <tr>--}}
{{--                            <td>{{$exercicioTreino['id_membro_inferior']}}</td>--}}
{{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['id_membro_inferior'])['exercicio']}}</td>--}}
{{--                            <td>{{$exercicioTreino['rep']}}</td>--}}
{{--                            <td>{{$exercicioTreino['serie']}}</td>--}}
{{--                            <td>{{$exercicioTreino['kg']}}</td>--}}
{{--                        </tr>                    @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}





@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">--}}
    {!! $dataTable->scripts() !!}
@stop