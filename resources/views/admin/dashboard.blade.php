{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard <small>{{Auth::user()->isManager() ? $extraData['company']->name : ""}}</small></h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{count($extraData['clients'])}}</h3>

                    <p>Alunos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-child"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{count($extraData['workouts'])}}</h3>

                    <p>Treinos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{count($extraData['users'])}}</h3>

                    <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{count($extraData['physicalAssessment'])}}</h3>

                    <p>Avaliações Fisicas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-heartbeat"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

@stop


