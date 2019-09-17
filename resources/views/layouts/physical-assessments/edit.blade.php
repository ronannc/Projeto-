@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar de Exercicio - Costa</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('physical-assessment.update', $PhysicalAssessment)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_neck', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_shoulder', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_chest', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_right_arm', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_left_arm', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_right_forearm', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_left_forearm', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_waist', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_abdomen', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_hip', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_right_thigh', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_left_thigh', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_right_calf', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_left_calf', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_weight', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_height', ['data' => $PhysicalAssessment])
                @include('layouts.components.input_blood_pressure', ['data' => $PhysicalAssessment])
                @include('layouts.components.select_client', ['data' => $PhysicalAssessment])
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button  class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@stop
