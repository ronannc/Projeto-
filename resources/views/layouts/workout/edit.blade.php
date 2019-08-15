@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Treino</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('workout.update', $data)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">

                @include('layouts.components.input_inicio', ['extraData' => $data])
                @include('layouts.components.input_prox_ficha', ['extraData' => $data])
                @include('layouts.components.input_description', ['extraData' => $data])
                @include('layouts.components.input_objetivo', ['extraData' => $data])
                @include('layouts.components.input_interval', ['extraData' => $data])
                @include('layouts.components.input_method', ['extraData' => $data])
                @include('layouts.components.input_frequency', ['extraData' => $data])
                @include('layouts.components.input_aerob_ini', ['extraData' => $data])
                @include('layouts.components.input_aerob_fim', ['extraData' => $data])
                @include('layouts.components.select_client')

                <div class="row">
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Triceps</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['triceps_workout'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control"
                                                       name="grupo_triceps_{{$exercicioTreino['triceps_id']}}"
                                                       type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Triceps::find($exercicioTreino['triceps_id'])['exercicio']}}</td>
                                            <td><input class="form-control"
                                                       name="rep_triceps_{{$exercicioTreino['triceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="serie_triceps_{{$exercicioTreino['triceps_id']}}"
                                                       type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="kg_triceps_{{$exercicioTreino['triceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Biceps</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['biceps_workout'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control"
                                                       name="grupo_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Biceps::find($exercicioTreino['biceps_id'])['exercicio']}}</td>
                                            <td><input class="form-control"
                                                       name="rep_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="serie_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="kg_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Peitoral</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['breast_workout'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control"
                                                       name="grupo_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Peitoral::find($exercicioTreino['breast_id'])['exercicio']}}</td>
                                            <td><input class="form-control"
                                                       name="rep_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="serie_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="kg_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['back_workout'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control"
                                                       name="grupo_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Costa::find($exercicioTreino['back_id'])['exercicio']}}</td>
                                            <td><input class="form-control"
                                                       name="rep_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="serie_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="kg_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Ombro</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['shoulder_workout'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control"
                                                       name="grupo_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Ombro::find($exercicioTreino['shoulder_id'])['exercicio']}}</td>
                                            <td><input class="form-control"
                                                       name="rep_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="serie_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="kg_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Membro Inferior</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['lower_member_workout'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control"
                                                       name="grupo_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\MembroInferior::find($exercicioTreino['lower_member_id'])['exercicio']}}</td>
                                            <td><input class="form-control"
                                                       name="rep_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="serie_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="kg_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@stop

