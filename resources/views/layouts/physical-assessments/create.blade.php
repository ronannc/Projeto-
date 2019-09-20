@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Avaliação Fisica</h3>
        </div>
        <form action="{{route('physical-assessments.store')}}" method="post">
            @csrf
            <div class="box-body">
                @include('components.input_neck')
                @include('components.input_shoulder')
                @include('components.input_chest')
                @include('components.input_right_arm')
                @include('components.input_left_arm')
                @include('components.input_right_forearm')
                @include('components.input_left_forearm')
                @include('components.input_waist')
                @include('components.input_abdomen')
                @include('components.input_hip')
                @include('components.input_right_thigh')
                @include('components.input_left_thigh')
                @include('components.input_right_calf')
                @include('components.input_left_calf')
                @include('components.input_weight')
                @include('components.input_height')
                @include('components.input_blood_pressure')
                @include('components.select_client')
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
            </div>
        </form>
    </div>
@stop
