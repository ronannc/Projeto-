@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.menssagens')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Treino</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('treino.update', $treino)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_inicio', ['data' => $treino])
                @include('layouts.components.input_prox_ficha', ['data' => $treino])
                @include('layouts.components.input_descricao', ['data' => $treino])
                @include('layouts.components.input_objetivo', ['data' => $treino])
                @include('layouts.components.input_intervalo', ['data' => $treino])
                @include('layouts.components.input_metodo', ['data' => $treino])
                @include('layouts.components.select_triceps', ['data' => $treino])
                @include('layouts.components.select_biceps', ['data' => $treino])
                @include('layouts.components.select_costa', ['data' => $treino])
                @include('layouts.components.select_ombro', ['data' => $treino])
                @include('layouts.components.select_peitoral', ['data' => $treino])
                @include('layouts.components.select_membro_inferior', ['data' => $treino])
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
