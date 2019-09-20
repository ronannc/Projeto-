@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    @include('components.status')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Permissions</h3>
        </div>
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@section('js')
    {!! $dataTable->scripts() !!}
@stop


