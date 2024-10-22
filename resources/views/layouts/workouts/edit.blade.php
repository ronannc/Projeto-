@extends('adminlte::page')

@section('title', 'AdminLTE')

@php($data = $model)

@section('content')

    @include('components.status')
    <form action="{{route('workouts.update', $data->id)}}" method="post">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Treino</h3>
            </div>
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                <div class="col-md-6">
                    @include('components.input_start', ['extraData' => $data])
                </div>
                <div class="col-md-6">
                    @include('components.input_next_workout', ['extraData' => $data])
                </div>
                <div class="col-md-6">
                    @include('components.input_interval', ['extraData' => $data])
                </div>
                <div class="col-md-6">
                    @include('components.input_frequency', ['extraData' => $data])
                </div>
                <div class="col-md-6">
                    @include('components.input_goal', ['extraData' => $data])
                </div>
                <div class="col-md-6">
                    @include('components.input_method', ['extraData' => $data])
                </div>
                <div class="col-md-12">
                    @include('components.input_obs', ['extraData' => $data])
                </div>
                <div class="col-md-12">
                    @include('components.select_client')
                </div>
            </div>
        </div>
        @foreach($data['workout'] as $group => $groupWorkout)

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{$group}}</h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Grupo</th>
                            <th>SUB Grupo</th>
                            <th>Exercício</th>
                            <th>Serie</th>
                            <th>Rep</th>
                            <th>Kg</th>
                        </tr>

                        @foreach($groupWorkout as $exercicioTreino)
                            <tr>
                                <td><input class="form-control"
                                           name="group_{{$exercicioTreino['type']}}_{{$exercicioTreino['id']}}"
                                           type="text" value="{{$exercicioTreino['group'] ?? ''}}">
                                </td>
                                <td><input class="form-control"
                                           name="subGroup_{{$exercicioTreino['type']}}_{{$exercicioTreino['id']}}"
                                           type="text" value="{{$exercicioTreino['sub_group'] ?? ''}}">
                                </td>
                                <td style="width: 180px">{{$exercicioTreino['description'] ?? ''}}</td>
                                <td><input class="form-control"
                                           name="repetition_{{$exercicioTreino['type']}}_{{$exercicioTreino['id']}}"
                                           type="text"
                                           value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                <td><input class="form-control"
                                           name="series_{{$exercicioTreino['type']}}_{{$exercicioTreino['id']}}"
                                           type="text" value="{{$exercicioTreino['series'] ?? ''}}">
                                </td>
                                <td><input class="form-control"
                                           name="load_{{$exercicioTreino['type']}}_{{$exercicioTreino['id']}}"
                                           type="text"
                                           value="{{$exercicioTreino['load'] ?? ''}}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Editar</button>
        </div>
    </form>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('.multiple').select2();
        });
    </script>
@stop

