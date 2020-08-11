@extends('adminlte::page')

@section('title', 'AdminLTE')

@php($data = $model)

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Treino</h3>
        </div>
        <form action="{{route('workouts.update', $data->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">

                @include('components.input_start', ['extraData' => $data])
                @include('components.input_next_workout', ['extraData' => $data])
                @include('components.input_interval', ['extraData' => $data])
                @include('components.input_frequency', ['extraData' => $data])
                @include('components.input_goal', ['extraData' => $data])
                @include('components.input_method', ['extraData' => $data])
                @include('components.input_obs', ['extraData' => $data])
                @include('components.select_client')

                @foreach($data['workout'] as $group => $groupWorkout)
                    <div class="col-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Agrupamento {{$group}}</h3>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    @foreach($groupWorkout->groupBy('type') as $type => $exercicios)
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h3 class="box-title">{{$type}}</h3>
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
                                                        @foreach($exercicios as $exercicioTreino)
                                                            <tr>
                                                            <tr>
                                                                <td><input class="form-control"
                                                                           name="group_{{$type}}_{{$exercicioTreino['id']}}"
                                                                           type="text" value="{{$exercicioTreino['group'] ?? ''}}"></td>
                                                                <td style="width: 180px">{{$exercicioTreino['description'] ?? ''}}</td>
                                                                <td><input class="form-control"
                                                                           name="repetition_{{$type}}_{{$exercicioTreino['id']}}" type="text"
                                                                           value="{{$exercicioTreino['repetition'] ?? ''}}"></td>
                                                                <td><input class="form-control"
                                                                           name="series_{{$type}}_{{$exercicioTreino['id']}}"
                                                                           type="text" value="{{$exercicioTreino['series'] ?? ''}}"></td>
                                                                <td><input class="form-control"
                                                                           name="load_{{$type}}_{{$exercicioTreino['id']}}" type="text"
                                                                           value="{{$exercicioTreino['load'] ?? ''}}"></td>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="col-sm-4">

                @include('components.checkbox_workout')
                @include('components.input_porcentagem')
                </div>
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
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

