@extends('adminlte::page')

@section('title', 'AdminLTE')


@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')
    @include('layouts.components.menssagens')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listagem de Exercicios Biceps</h3>
        </div>
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">--}}
    {!! $dataTable->scripts() !!}
@stop


