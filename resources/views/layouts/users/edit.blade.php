@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar administradores</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('users.update', $user)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_email', ['data' => $user])
                @include('layouts.components.select_client', ['data' => $user])
                @include('layouts.components.select_company', ['data' => $user])
                @include('layouts.components.input_password', ['data' => $user])
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@stop