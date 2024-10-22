@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

@include('components.status')
@php $data = $workout @endphp
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Exercicio</h3>
        </div>
        <form action="{{route('editExercicio.store', $workout->id)}}" method="post">
            @csrf
            <div class="box-body">
                @include('components.select_triceps')
                @include('components.select_biceps')
                @include('components.select_back')
                @include('components.select_shoulder')
                @include('components.select_breast')
                @include('components.select_lower_member')
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
            </div>
        </form>

    </div>
@stop


@section('js')
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@stop

