@extends('adminlte::page')

@section('title', 'AdminLTE')

@php($data = $model)

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar de exercício - Costa</h3>
        </div>
        <form action="{{route('physical-assessments.update', $data->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_neck', ['data' => $data])
                @include('components.input_shoulder', ['data' => $data])
                @include('components.input_chest', ['data' => $data])
                @include('components.input_right_arm', ['data' => $data])
                @include('components.input_left_arm', ['data' => $data])
                @include('components.input_right_forearm', ['data' => $data])
                @include('components.input_left_forearm', ['data' => $data])
                @include('components.input_waist', ['data' => $data])
                @include('components.input_abdomen', ['data' => $data])
                @include('components.input_hip', ['data' => $data])
                @include('components.input_right_thigh', ['data' => $data])
                @include('components.input_left_thigh', ['data' => $data])
                @include('components.input_right_calf', ['data' => $data])
                @include('components.input_left_calf', ['data' => $data])
                @include('components.input_weight', ['data' => $data])
                @include('components.input_height', ['data' => $data])
                @include('components.input_blood_pressure', ['data' => $data])
                @include('components.select_client', ['data' => $data])
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
        </form>
    </div>
@stop
