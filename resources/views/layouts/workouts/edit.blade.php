@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Treino</h3>
        </div>
        <form action="{{route('workouts.update', $data)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">

                @include('components.input_start', ['extraData' => $data])
                @include('components.input_next_workout', ['extraData' => $data])
                @include('components.input_goal', ['extraData' => $data])
                @include('components.input_interval', ['extraData' => $data])
                @include('components.select_method', ['extraData' => $extraData])
                @include('components.input_frequency', ['extraData' => $data])
                @include('components.select_client')

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
                                                       name="group_triceps_{{$exercicioTreino['triceps_id']}}"
                                                       type="text" value="{{$exercicioTreino['group'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Triceps::find($exercicioTreino['triceps_id'])['exercise']}}</td>
                                            <td><input class="form-control"
                                                       name="repetition_triceps_{{$exercicioTreino['triceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="series_triceps_{{$exercicioTreino['triceps_id']}}"
                                                       type="text" value="{{$exercicioTreino['series'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="load_triceps_{{$exercicioTreino['triceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['load'] ?? ''}}"></td>
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
                                                       name="group_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['group'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Biceps::find($exercicioTreino['biceps_id'])['exercise']}}</td>
                                            <td><input class="form-control"
                                                       name="repetition_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="series_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['series'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="load_biceps_{{$exercicioTreino['biceps_id']}}" type="text"
                                                       value="{{$exercicioTreino['load'] ?? ''}}"></td>
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
                                                       name="group_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['group'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Breast::find($exercicioTreino['breast_id'])['exercise']}}</td>
                                            <td><input class="form-control"
                                                       name="repetition_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="series_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['series'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="load_breast_{{$exercicioTreino['breast_id']}}" type="text"
                                                       value="{{$exercicioTreino['load'] ?? ''}}"></td>
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
                                                       name="group_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['group'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Back::find($exercicioTreino['back_id'])['exercise']}}</td>
                                            <td><input class="form-control"
                                                       name="repetition_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="series_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['series'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="load_back_{{$exercicioTreino['back_id']}}" type="text"
                                                       value="{{$exercicioTreino['load'] ?? ''}}"></td>
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
                                                       name="group_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['group'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Shoulder::find($exercicioTreino['shoulder_id'])['exercise']}}</td>
                                            <td><input class="form-control"
                                                       name="repetition_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="series_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['series'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="load_shoulder_{{$exercicioTreino['shoulder_id']}}"
                                                       type="text" value="{{$exercicioTreino['load'] ?? ''}}"></td>
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
                                                       name="group_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['group'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\LowerMember::find($exercicioTreino['lower_member_id'])['exercise']}}</td>
                                            <td><input class="form-control"
                                                       name="repetition_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="series_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['series'] ?? ''}}"></td>
                                            <td><input class="form-control"
                                                       name="load_inferior_{{$exercicioTreino['lower_member_id']}}"
                                                       type="text" value="{{$exercicioTreino['load'] ?? ''}}"></td>
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

