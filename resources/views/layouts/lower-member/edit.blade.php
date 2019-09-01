@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar de Exercicio - Membro Inferior</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('lower-member.update', $lowerMember)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_exercise', ['data' => $lowerMember])
                @include('layouts.components.input_description', ['data' => $lowerMember])
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
