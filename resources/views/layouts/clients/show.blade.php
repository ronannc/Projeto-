@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    @php
        $client = $data['client'];
        $physicalAssessments = $data['physicalAssessments'];
    @endphp
    @include('components.status')
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-widget widget-user">
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{$client['name']}}</h3>
                    <h5 class="widget-user-desc">Email: {{$client['email'] ?? ''}}</h5>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$client['cpf'] ?? ''}}</h5>
                                <span class="description-text">CPF</span>
                            </div>
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{$client['phone'] ?? ''}}</h5>
                                <span class="description-text">Telefone</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">{{ date('d/m/Y', strtotime($client['birthday'])) ?? ''}}</h5>
                                <span class="description-text">Data Nascimento</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Avaliação Física</h3>
            <h5 class="widget-user-desc">{{date('d/m/Y', strtotime($physicalAssessments['date'] ?? ''))}}</h5>
        </div>
        <div class="box-body">
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">{{$physicalAssessments['height'] ?? ''}}</h5>
                    <span class="description-text">Altura</span>
                </div>
            </div>
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">{{$physicalAssessments['weight'] ?? ''}}</h5>
                    <span class="description-text">Peso</span>
                </div>
            </div>
            <div class="col-sm-4 border-right">
                <div class="description-block">
                    <h5 class="description-header">{{ $physicalAssessments['imc'] }}</h5>
                    <span class="description-text">IMC</span>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header">
            <h3 class="box-title">Listagem de Treinos</h3>
        </div>
        <div class="box-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@stop

@section('js')
    {!! $dataTable->scripts() !!}
@stop
