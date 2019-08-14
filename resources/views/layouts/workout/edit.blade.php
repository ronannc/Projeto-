@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    {{--<h1>Dashboard</h1>--}}
@stop

@section('content')

    @include('layouts.components.menssagens')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Treino</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{route('workout', $data)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="box-body">

                @include('layouts.components.input_inicio', ['extraData' => $data])
                @include('layouts.components.input_prox_ficha', ['extraData' => $data])
                @include('layouts.components.input_descricao', ['extraData' => $data])
                @include('layouts.components.input_objetivo', ['extraData' => $data])
                @include('layouts.components.input_intervalo', ['extraData' => $data])
                @include('layouts.components.input_metodo', ['extraData' => $data])
                @include('layouts.components.input_frequencia', ['extraData' => $data])
                @include('layouts.components.input_aerob_ini', ['extraData' => $data])
                @include('layouts.components.input_aerob_fim', ['extraData' => $data])
                @include('layouts.components.select_cliente')

                <div class="row">
                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Triceps</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['triceps_treino'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control" name="grupo_triceps_{{$exercicioTreino['id_triceps']}}" type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Triceps::find($exercicioTreino['id_triceps'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_triceps_{{$exercicioTreino['id_triceps']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control" name="serie_triceps_{{$exercicioTreino['id_triceps']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control" name="kg_triceps_{{$exercicioTreino['id_triceps']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Biceps</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['biceps_treino'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control" name="grupo_biceps_{{$exercicioTreino['id_biceps']}}" type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Biceps::find($exercicioTreino['id_biceps'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_biceps_{{$exercicioTreino['id_biceps']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control" name="serie_biceps_{{$exercicioTreino['id_biceps']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control" name="kg_biceps_{{$exercicioTreino['id_biceps']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Peitoral</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['peitoral_treino'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control" name="grupo_peitoral_{{$exercicioTreino['id_peitoral']}}" type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Peitoral::find($exercicioTreino['id_peitoral'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_peitoral_{{$exercicioTreino['id_peitoral']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control" name="serie_peitoral_{{$exercicioTreino['id_peitoral']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control" name="kg_peitoral_{{$exercicioTreino['id_peitoral']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Costa</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['costa_treino'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control" name="grupo_costa_{{$exercicioTreino['id_costa']}}" type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Costa::find($exercicioTreino['id_costa'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_costa_{{$exercicioTreino['id_costa']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control" name="serie_costa_{{$exercicioTreino['id_costa']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control" name="kg_costa_{{$exercicioTreino['id_costa']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Ombro</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['ombro_treino'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control" name="grupo_ombro_{{$exercicioTreino['id_ombro']}}" type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\Ombro::find($exercicioTreino['id_ombro'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_ombro_{{$exercicioTreino['id_ombro']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control" name="serie_ombro_{{$exercicioTreino['id_ombro']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control" name="kg_ombro_{{$exercicioTreino['id_ombro']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Membro Inferior</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Exercicio</th>
                                        <th>Rep</th>
                                        <th>Serie</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['membro_inferior_treino'] as $exercicioTreino)
                                        <tr>
                                            <td><input class="form-control" name="grupo_inferior_{{$exercicioTreino['id_membro_inferior']}}" type="text" value="{{$exercicioTreino['grupo'] ?? ''}}"></td>
                                            <td style="width: 180px">{{ \App\Models\MembroInferior::find($exercicioTreino['id_membro_inferior'])['exercicio']}}</td>
                                            <td><input class="form-control" name="rep_inferior_{{$exercicioTreino['id_membro_inferior']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>
                                            <td><input class="form-control" name="serie_inferior_{{$exercicioTreino['id_membro_inferior']}}" type="text" value="{{$exercicioTreino['serie'] ?? ''}}"></td>
                                            <td><input class="form-control" name="kg_inferior_{{$exercicioTreino['id_membro_inferior']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>
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

