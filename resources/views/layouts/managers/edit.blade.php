@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@php($data = $model)

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Gerente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('user.update', $data->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_name')
                @include('components.input_email')
                @include('components.input_password')
                @include('components.input_password_confirmation')
                @include('components.select_company')
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
