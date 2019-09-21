@extends('adminlte::page')

@section('title', 'AdminLTE')
@php($data = $model)

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ediçao de Empresas</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('companies.update', $data->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_name', ['data' => $data])
                @include('components.input_social_reason', ['data' => $data])
                @include('components.input_cnpj', ['data' => $data])
                @include('components.input_phone', ['data' => $data])
                @include('components.input_street', ['data' => $data])
                @include('components.input_neighborhood', ['data' => $data])
                @include('components.input_number', ['data' => $data])
                @include('components.input_complement', ['data' => $data])
                @include('components.input_zipcode', ['data' => $data])
                @include('components.select_city', ['data' => $data])
            </div>
            <div class="box-footer">
                <button class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Salvar</button>
            </div>
        </form>
    </div>
@stop
