@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Exercicios - Biceps</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form>
            <div class="box-body">
                @include('layouts.coponents.input_exercicio')
                @include('layouts.coponents.input_descricao')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@stop
