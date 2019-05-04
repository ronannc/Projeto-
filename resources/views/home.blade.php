@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>

    @role('admin')
        Eu sou um admin!
    @endrole

    @role('cliente')
        Eu sou um cliente!
    @endrole


@stop


