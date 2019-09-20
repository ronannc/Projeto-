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
            <h3 class="box-title">Editar cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('clients.update', $data->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_name', ['data' => $data])
                @include('components.input_cpf', ['data' => $data])
                @include('components.input_birthday', ['data' => $data])
                @include('components.input_phone', ['data' => $data])
                @include('components.select_company', ['data' => $data])
                @include('components.input_street', ['data' => $data])
                @include('components.input_neighborhood', ['data' => $data])
                @include('components.input_number', ['data' => $data])
                @include('components.input_complement', ['data' => $data])
                @include('components.input_zipcode', ['data' => $data])
                @include('components.select_city', ['data' => $data])
                @include('components.input_email', ['data' => $data])
                @include('components.input_sex', ['data' => $data])
                @include('components.select_blood_type', ['data' => $data])
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
