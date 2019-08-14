@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.menssagens')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Treino</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('workout')}}" method="post">
            @csrf
            <div class="box-body">
                @include('layouts.components.input_inicio')
                @include('layouts.components.input_prox_ficha')
                @include('layouts.components.input_descricao')
                @include('layouts.components.input_objetivo')
                @include('layouts.components.input_intervalo')
                @include('layouts.components.input_metodo')
                @include('layouts.components.input_frequencia')
                @include('layouts.components.input_aerob_ini')
                @include('layouts.components.input_aerob_fim')
                @include('layouts.components.select_cliente')
                @include('layouts.components.select_triceps')
                @include('layouts.components.select_biceps')
                @include('layouts.components.select_back')
                @include('layouts.components.select_shoulder')
                @include('layouts.components.select_breast')
                @include('layouts.components.select_lower_member')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
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

