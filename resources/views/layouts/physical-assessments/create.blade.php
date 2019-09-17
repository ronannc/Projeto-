@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Cadastro de Exercicios - Costa</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('physical-assessment.store')}}" method="post">
            @csrf
            <div class="box-body">
                @include('layouts.components.input_neck')
                @include('layouts.components.input_shoulder')
                @include('layouts.components.input_chest')
                @include('layouts.components.input_right_arm')
                @include('layouts.components.input_left_arm')
                @include('layouts.components.input_right_forearm')
                @include('layouts.components.input_left_forearm')
                @include('layouts.components.input_waist')
                @include('layouts.components.input_abdomen')
                @include('layouts.components.input_hip')
                @include('layouts.components.input_right_thigh')
                @include('layouts.components.input_left_thigh')
                @include('layouts.components.input_right_calf')
                @include('layouts.components.input_left_calf')
                @include('layouts.components.input_weight')
                @include('layouts.components.input_height')
                @include('layouts.components.input_blood_pressure')
                @include('layouts.components.select_client')
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Cadastrar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@stop
