@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Empresas</h3>
        </div>
        <form action="{{route('companies.store')}}" method="post">
            @csrf
            <div class="box-body">
                @include('components.input_name')
                @include('components.input_social_reason')
                @include('components.input_cnpj')
                @include('components.input_phone')
                @include('components.input_street')
                @include('components.input_neighborhood')
                @include('components.input_number')
                @include('components.input_complement')
                @include('components.input_zipcode')
                @include('components.select_city')
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
            </div>
        </form>
    </div>
@stop
