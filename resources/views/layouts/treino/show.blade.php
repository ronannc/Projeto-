@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')
    <div class="col-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Dados do Treino</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body " style="">
                <ul class="nav nav-stacked">
                    <li>Inicio <span class="pull-right">{{$data['inicio']}}</span></li>
                    <li>Proxima Ficha <span class="pull-right">{{$data['prox_ficha']}}</span></li>
                    <li>Descricao<span class="pull-right">{{$data['descricao']}}</span></li>
                    <li>Objetivo<span class="pull-right">{{$data['objetivo']}}</span></li>
                    <li>Intervalo<span class="pull-right">{{$data['intervalo']}}</span></li>
                    <li>Metodo<span class="pull-right">{{$data['metodo']}}</span></li>
                    <li>Frequencia<span class="pull-right">{{$data['frequencia']}}</span></li>
                    <li>Aerobico Inicial<span class="pull-right">{{$data['aerob_ini']}}</span></li>
                    <li>Aerobico Final<span class="pull-right">{{$data['aerob_fim']}}</span></li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="box no-border">
        <div class="box-header with-border">
            <h3 class="box-title">Treino </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('treino.update', $data)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Triceps</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['triceps_treino'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['id_triceps']}}</td>
                                            <td style="width: 150px">{{ \App\Models\Triceps::find($exercicioTreino['id_triceps'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_triceps_{{$exercicioTreino['id_triceps']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="serie_triceps_{{$exercicioTreino['id_triceps']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="kg_triceps_{{$exercicioTreino['id_triceps']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Biceps</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['biceps_treino'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['id_biceps']}}</td>
                                            <td style="width: 150px">{{ \App\Models\Triceps::find($exercicioTreino['id_biceps'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_biceps_{{$exercicioTreino['id_biceps']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="serie_biceps_{{$exercicioTreino['id_biceps']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="kg_biceps_{{$exercicioTreino['id_biceps']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Peitoral</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['peitoral_treino'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['id_peitoral']}}</td>
                                            <td style="width: 150px">{{ \App\Models\Triceps::find($exercicioTreino['id_peitoral'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_peitoral_{{$exercicioTreino['id_peitoral']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="serie_peitoral_{{$exercicioTreino['id_peitoral']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="kg_peitoral_{{$exercicioTreino['id_peitoral']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Costa</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['costa_treino'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['id_costa']}}</td>
                                            <td style="width: 150px">{{ \App\Models\Triceps::find($exercicioTreino['id_costa'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_costa_{{$exercicioTreino['id_costa']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="serie_costa_{{$exercicioTreino['id_costa']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="kg_costa_{{$exercicioTreino['id_costa']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Ombro</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['ombro_treino'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['id_ombro']}}</td>
                                            <td style="width: 150px">{{ \App\Models\Triceps::find($exercicioTreino['id_ombro'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_ombro_{{$exercicioTreino['id_ombro']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="serie_ombro_{{$exercicioTreino['id_ombro']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="kg_ombro_{{$exercicioTreino['id_ombro']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Membro Inferior</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['membro_inferior_treino'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['id_membro_inferior']}}</td>
                                            <td style="width: 150px">{{ \App\Models\Triceps::find($exercicioTreino['id_membro_inferior'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_inferior_{{$exercicioTreino['id_membro_inferior']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="serie_inferior_{{$exercicioTreino['id_membro_inferior']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                            <td><input class="form-control" name="kg_inferior_{{$exercicioTreino['id_membro_inferior']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}" @if($data['status']) disabled @endif></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@stop

