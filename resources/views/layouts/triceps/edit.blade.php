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
            <h3 class="box-title">Editar de exercício - Triceps</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('triceps.update', $model->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_exercise', ['data' => $model])
                @include('components.input_description', ['data' => $model])
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
