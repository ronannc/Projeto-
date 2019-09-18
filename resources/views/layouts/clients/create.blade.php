@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Cliente</h3>
        </div>
        <form action="{{route('clients.store')}}" method="post">
            @csrf
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
                @include('layouts.components.input_email')
                @include('layouts.components.input_sex')
                @include('layouts.components.select_blood_type')
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
            </div>
        </form>
    </div>
@stop
