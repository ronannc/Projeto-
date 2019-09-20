@extends('adminlte::page')

@section('title', 'AdminLTE')

@php($data = $model)

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar de exercício - Ombro</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('shoulders.update', $data->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_exercise', ['data' => $data])
                @include('components.input_description', ['data' => $data])
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
