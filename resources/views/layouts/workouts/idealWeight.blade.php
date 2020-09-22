@extends('adminlte::page')

@section('title', 'AdminLTE')

@php($data = $model)

@section('content')

    @include('components.status')
    <form action="{{route('calcIdealWeight.store', $data->id)}}" method="post">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Calcular Carga Ideal</h3>
            </div>
            @csrf
            {{ method_field('PUT') }}

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
                            <th>Exercício</th>
                            <th>Serie</th>
                            <th>Rep</th>
                            <th>Kg</th>
                        </tr>

                        @foreach($groupWorkout as $exercicioTreino)
                            <tr>
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
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Porcentagem para Calculo</h3>
            </div>
            <div class="box-body">
                <div class="col-sm-4">
                    @include('components.input_porcentagem')
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Calcular</button>
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

