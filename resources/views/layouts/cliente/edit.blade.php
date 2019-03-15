@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.menssagens')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('cliente.update', $cliente)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_nome', ['data' => $cliente])
                @include('layouts.components.input_cpf', ['data' => $cliente])
                @include('layouts.components.input_telefone', ['data' => $cliente])
                @include('layouts.components.select_treino')



{{--                @include('layouts.components.input_treino', ['data' => $cliente])--}}
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
