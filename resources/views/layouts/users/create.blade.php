@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de novo administrador</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('users.store')}}" method="post">
            @csrf
            <div class="box-body">
                @include('components.input_name')
                @include('components.input_email')
                @include('components.input_password')
                @include('components.input_password_confirmation')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@stop
