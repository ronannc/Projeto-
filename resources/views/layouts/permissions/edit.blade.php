@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')

    @include('layouts.components.status')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Permission</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('permission.update', $permission)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">
                @include('layouts.components.input_name', ['data' => $permission])
                <div class="form-group">
                    <label for="name">Permissions associadas a role </label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           id="name" placeholder="Nome"
                           value="Ainda falta terminar esse input">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-info pull-right">Editar</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
@stop