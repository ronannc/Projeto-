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
                @include('components.input_name')
                @include('components.input_cpf')
                @include('components.input_birthday')
                @include('components.input_phone')
                @include('components.select_company')
                @include('components.input_street')
                @include('components.input_neighborhood')
                @include('components.input_number')
                @include('components.input_complement')
                @include('components.input_zipcode')
                @include('components.select_city')
                @include('components.input_email')
                @include('components.input_sex')
                @include('components.select_blood_type')
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
