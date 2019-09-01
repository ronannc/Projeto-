@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Usuario</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div class="box-body">
                @include('layouts.components.input_email')
                @include('layouts.components.select_client')
                @include('layouts.components.select_company')
                @include('layouts.components.input_password')
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
