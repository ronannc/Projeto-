@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.menssagens')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Exercicio Treino</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('exercicioTreino.update', $exercicioTreino)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_id_treino', ['data', $exercicioTreino])
                @include('layouts.components.input_id_membros_inferiores', ['data', $exercicioTreino])
                @include('layouts.components.input_id_peitorais', ['data', $exercicioTreino])
                @include('layouts.components.input_id_biceps', ['data', $exercicioTreino])
                @include('layouts.components.input_id_triceps', ['data', $exercicioTreino])
                @include('layouts.components.input_id_costa', ['data', $exercicioTreino])
                @include('layouts.components.input_id_ombro', ['data', $exercicioTreino])
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
