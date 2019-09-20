@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Metodos de Treino</h3>
        </div>
        <form action="{{route('goals.update', $goal)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_name', ['data' => $goal])
                @include('components.input_description', ['data' => $goal])
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
        </form>
    </div>
@stop
