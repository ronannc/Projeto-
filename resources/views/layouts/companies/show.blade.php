@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')
    @include('components.status')
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
    {{--                    @foreach($workout['triceps_workout'] as $exercicioTreino)--}}

{{--                            <tr>--}}
    {{--                                <td>{{$exercicioTreino['triceps_id']}}</td>--}}
    {{--                                <td>{{ \App\Models\Triceps::find($exercicioTreino['triceps_id'])['exercicio']}}</td>--}}
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
    {{--                    @foreach($workout['biceps_workout'] as $exercicioTreino)--}}
{{--                        <tr>--}}
    {{--                            <td>{{$exercicioTreino['biceps_id']}}</td>--}}
    {{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['biceps_id'])['exercicio']}}</td>--}}
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
    {{--                    @foreach($workout['breast_workout'] as $exercicioTreino)--}}
{{--                        <tr>--}}
    {{--                            <td>{{$exercicioTreino['breast_id']}}</td>--}}
    {{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['breast_id'])['exercicio']}}</td>--}}
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
    {{--                    @foreach($workout['back_workout'] as $exercicioTreino)--}}
{{--                        <tr>--}}
    {{--                            <td>{{$exercicioTreino['back_id']}}</td>--}}
    {{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['back_id'])['exercicio']}}</td>--}}
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
    {{--                    @foreach($workout['shoulder_workout'] as $exercicioTreino)--}}
{{--                        <tr>--}}
    {{--                            <td>{{$exercicioTreino['shoulder_id']}}</td>--}}
    {{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['shoulder_id'])['exercicio']}}</td>--}}
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
    {{--                    @foreach($workout['lower_member_workout'] as $exercicioTreino)--}}
{{--                        <tr>--}}
    {{--                            <td>{{$exercicioTreino['lower_member_id']}}</td>--}}
    {{--                            <td>{{ \App\Models\Triceps::find($exercicioTreino['lower_member_id'])['exercicio']}}</td>--}}
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
