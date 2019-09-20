@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar de Exercicio - Costa</h3>
        </div>
        <form action="{{route('physical-assessments.update', $PhysicalAssessment)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('components.input_neck', ['data' => $PhysicalAssessment])
                @include('components.input_shoulder', ['data' => $PhysicalAssessment])
                @include('components.input_chest', ['data' => $PhysicalAssessment])
                @include('components.input_right_arm', ['data' => $PhysicalAssessment])
                @include('components.input_left_arm', ['data' => $PhysicalAssessment])
                @include('components.input_right_forearm', ['data' => $PhysicalAssessment])
                @include('components.input_left_forearm', ['data' => $PhysicalAssessment])
                @include('components.input_waist', ['data' => $PhysicalAssessment])
                @include('components.input_abdomen', ['data' => $PhysicalAssessment])
                @include('components.input_hip', ['data' => $PhysicalAssessment])
                @include('components.input_right_thigh', ['data' => $PhysicalAssessment])
                @include('components.input_left_thigh', ['data' => $PhysicalAssessment])
                @include('components.input_right_calf', ['data' => $PhysicalAssessment])
                @include('components.input_left_calf', ['data' => $PhysicalAssessment])
                @include('components.input_weight', ['data' => $PhysicalAssessment])
                @include('components.input_height', ['data' => $PhysicalAssessment])
                @include('components.input_blood_pressure', ['data' => $PhysicalAssessment])
                @include('components.select_client', ['data' => $PhysicalAssessment])
            </div>
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
        </form>
    </div>
@stop
