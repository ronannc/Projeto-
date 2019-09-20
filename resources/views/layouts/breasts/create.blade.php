@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Exercicios - Peitoral</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('breasts.store')}}" method="post">
            @csrf
            <div class="box-body">
                @include('components.input_exercise')
                @include('components.input_description')
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
