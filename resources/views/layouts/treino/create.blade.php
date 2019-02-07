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
        <form action="{{route('treino.store')}}" method="post">
            @csrf
            <div class="box-body">
                @include('layouts.components.input_inicio')
                @include('layouts.components.input_descricao')
                @include('layouts.components.input_objetivo')
                @include('layouts.components.input_intervalo')
                @include('layouts.components.input_metodo')

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
