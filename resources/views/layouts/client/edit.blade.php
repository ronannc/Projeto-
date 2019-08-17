@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Cliente</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('client.update', $data)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_name')
                @include('layouts.components.input_cpf')
                @include('layouts.components.input_birthday')
                @include('layouts.components.input_phone')
                @include('layouts.components.select_company')
                @include('layouts.components.input_street')
                @include('layouts.components.input_neighborhood')
                @include('layouts.components.input_number')
                @include('layouts.components.input_complement')
                @include('layouts.components.input_zipcode')
                @include('layouts.components.select_city')
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
