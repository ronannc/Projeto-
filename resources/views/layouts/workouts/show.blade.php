@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="col-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Dados do Treino</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body " style="">
                <ul class="nav nav-stacked">
                    <li>Início <span class="pull-right">{{date('d/m/Y', strtotime($data['start']))}}</span></li>
                    <li>Próxima Ficha <span class="pull-right">{{date('d/m/Y', strtotime($data['next_workout']))}}</span></li>
                    <li>Intervalo<span class="pull-right">{{$data['interval']}}</span></li>
                    <li>Objetivo<span class="pull-right">{{$data['goal']}}</span></li>
                    <li>Metodo<span class="pull-right">{{$data['method']}}</span></li>
                    <li>Observações<span class="pull-right">{{$data['obs']}}</span></li>
                    <li>Frequência<span class="pull-right">{{$data['frequency']}}</span></li>
                    <li>Cliente<span class="pull-right">{{$data->client->name}}</span></li>
                </ul>
            </div>
        </div>
    </div>

    @foreach($data['workout'] as $group => $groupWorkout)
        <div class="col-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Agrupamento {{$group}}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Grupo</th>
                                <th>Exercício</th>
                                <th>Serie</th>
                                <th>Rep</th>
                                <th>Kg</th>
                            </tr>
                            @foreach($groupWorkout as $exercicioTreino)
                                <tr>
                                    <td>{{$exercicioTreino['group'] ?? ''}}</td>
                                    <td style="width: 150px">{{$exercicioTreino['description'] ?? ''}}</td>
                                    <td>{{$exercicioTreino['series'] ?? ''}}</td>
                                    <td>{{$exercicioTreino['repetition'] ?? ''}}</td>
                                    <td>{{number_format($exercicioTreino['load'] ?? 0, 0)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@stop

