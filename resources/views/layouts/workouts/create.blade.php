@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Treino</h3>
        </div>
        <form action="{{route('workouts.store')}}" method="post">
            @csrf
            <div class="box-body">
                <div class="col-md-6">
                    @include('components.input_start')
                </div>
                <div class="col-md-6">
                    @include('components.input_next_workout')
                </div>
                <div class="col-md-6">
                    @include('components.input_interval')
                </div>
                <div class="col-md-6">
                    @include('components.input_frequency')
                </div>
                <div class="col-md-6">
                    @include('components.input_goal')
                </div>
                <div class="col-md-6">
                    @include('components.input_method')
                </div>
                <div class="col-md-12 ">
                    @include('components.input_obs')
                </div>
                <div class="col-md-12">
                    @include('components.select_client')
                </div>
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
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

