@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <span>Menu</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Dashboard</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Horizon</span>
                    </li>
                </ul>
                @include('layouts.components.back')
            </div>
            <div class="row"
                 style="margin-top: 20px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <iframe src="{{ env('APP_URL') }}/horizon" frameborder="0" width="100%" height="600px"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
