@extends('adminlte::page')

@section('title', $resource)

@section('content')
    @include('components.status')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ __($resource) }}</h3>
        </div>
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
@stop


