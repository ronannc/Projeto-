@extends('adminlte::page')

@section('title', 'AdminLTE')

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
                    <li>Início <span class="pull-right">{{date('d/m/Y', strtotime($data['start']))}}</span></li>
                    <li>Próxima Ficha <span class="pull-right">{{date('d/m/Y', strtotime($data['next_workout']))}}</span></li>
                    <li>Objetivo<span class="pull-right">{{$data['goal']}}</span></li>
                    <li>Intervalo<span class="pull-right">{{$data['interval']}}</span></li>
                    <li>Método<span class="pull-right">{{$data->goal->description}}</span></li>
                    <li>Frequência<span class="pull-right">{{$data['frequency']}}</span></li>
                    <li>Cliente<span class="pull-right">{{$data->client->name}}</span></li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
{{--    <div class="box no-border">--}}
{{--        <div class="box-header with-border">--}}
{{--            <h3 class="box-title">Treino </h3>--}}
{{--        </div>--}}
        <!-- /.box-header -->
        <!-- form start -->
    <form action="{{route('workouts.update', $data)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
{{--            <div class="box-body">--}}

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
                                        <th>Grupo</th>
                                        <th>Exercício</th>
                                        <th>Serie</th>
                                        <th>Rep</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['triceps_workout'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['group'] ?? ''}}</td>
                                            <td style="width: 150px">{{ \App\Models\Triceps::find($exercicioTreino['triceps_id'])['exercise']}}</td>
                                            <td>{{$exercicioTreino['series'] ?? ''}}</td>
{{--                                            @if($data['status'])--}}
                                                <td>{{$exercicioTreino['repetition'] ?? ''}}</td>
                                                <td>{{number_format($exercicioTreino['load'] ?? 0, 0)}}</td>
{{--                                            @else--}}
                                            {{--                                                <td><input class="form-control" name="rep_triceps_{{$exercicioTreino['triceps_id']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>--}}
                                            {{--                                                <td><input class="form-control" name="kg_triceps_{{$exercicioTreino['triceps_id']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>--}}
{{--                                            @endif--}}
                                       </tr >
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
                                        <th>Grupo</th>
                                        <th>Exercício</th>
                                        <th>Serie</th>
                                        <th>Rep</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['biceps_workout'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['group'] ?? ''}}</td>
                                            <td style="width: 150px">{{ \App\Models\Biceps::find($exercicioTreino['biceps_id'])['exercise']}}</td>
                                            <td>{{$exercicioTreino['series'] ?? ''}}</td>
{{--                                            @if($data['status'])--}}
                                                <td>{{$exercicioTreino['repetition'] ?? ''}}</td>
                                                <td>{{number_format($exercicioTreino['load'] ?? 0, 0)}}</td>
{{--                                            @else--}}
                                            {{--                                                <td><input class="form-control" name="rep_biceps_{{$exercicioTreino['biceps_id']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>--}}
                                            {{--                                                <td><input class="form-control" name="kg_biceps_{{$exercicioTreino['biceps_id']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>--}}
{{--                                            @endif--}}
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
                                        <th>Grupo</th>
                                        <th>Exercício</th>
                                        <th>Serie</th>
                                        <th>Rep</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['breast_workout'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['group'] ?? ''}}</td>
                                            <td style="width: 150px">{{ \App\Models\Breast::find($exercicioTreino['breast_id'])['exercise']}}</td>
                                            <td>{{$exercicioTreino['series'] ?? ''}}</td>
{{--                                            @if($data['status'])--}}
                                                <td>{{$exercicioTreino['repetition'] ?? ''}}</td>
                                                <td>{{number_format($exercicioTreino['load'] ?? 0, 0)}}</td>
{{--                                            @else--}}
                                            {{--                                                <td><input class="form-control" name="rep_breast_{{$exercicioTreino['breast_id']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>--}}
                                            {{--                                                <td><input class="form-control" name="kg_breast_{{$exercicioTreino['breast_id']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>--}}
{{--                                            @endif--}}
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
                                        <th>Grupo</th>
                                        <th>Exercício</th>
                                        <th>Serie</th>
                                        <th>Rep</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['back_workout'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['group'] ?? ''}}</td>
                                            <td style="width: 150px">{{ \App\Models\Back::find($exercicioTreino['back_id'])['exercise']}}</td>
                                            <td>{{$exercicioTreino['series'] ?? ''}}</td>
{{--                                            @if($data['status'])--}}
                                                <td>{{$exercicioTreino['repetition'] ?? ''}}</td>
                                                <td>{{number_format($exercicioTreino['load'] ?? 0, 0)}}</td>
{{--                                            @else--}}
                                        {{--                                                <td><input class="form-control" name="rep_back_{{$exercicioTreino['back_id']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>--}}
                                        {{--                                                <td><input class="form-control" name="kg_back_{{$exercicioTreino['back_id']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>--}}
{{--                                            @endif--}}
{{--                                        </tr>--}}
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
                                        <th>Grupo</th>
                                        <th>Exercício</th>
                                        <th>Serie</th>
                                        <th>Rep</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['shoulder_workout'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['group'] ?? ''}}</td>
                                            <td style="width: 150px">{{ \App\Models\Shoulder::find($exercicioTreino['shoulder_id'])['exercise']}}</td>
                                            <td>{{$exercicioTreino['series'] ?? ''}}</td>
{{--                                            @if($data['status'])--}}
                                                <td>{{$exercicioTreino['repetition'] ?? ''}}</td>
                                                <td>{{number_format($exercicioTreino['load'] ?? 0, 0)}}</td>
{{--                                            @else--}}
                                            {{--                                                <td><input class="form-control" name="rep_shoulder_{{$exercicioTreino['shoulder_id']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>--}}
                                            {{--                                                <td><input class="form-control" name="kg_shoulder_{{$exercicioTreino['shoulder_id']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>--}}
{{--                                            @endif--}}
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
                                        <th>Grupo</th>
                                        <th>Exercício</th>
                                        <th>Serie</th>
                                        <th>Rep</th>
                                        <th>Kg</th>
                                    </tr>
                                    @foreach($data['lower_member_workout'] as $exercicioTreino)
                                        <tr>
                                            <td>{{$exercicioTreino['group'] ?? ''}}</td>
                                            <td style="width: 150px">{{ \App\Models\LowerMember::find($exercicioTreino['lower_member_id'])['exercise']}}</td>
                                            <td>{{$exercicioTreino['series'] ?? ''}}</td>
{{--                                            @if($data['status'])--}}
                                                <td>{{$exercicioTreino['repetition'] ?? ''}}</td>
                                                <td>{{number_format($exercicioTreino['load'] ?? 0, 0)}}</td>
{{--                                            @else--}}
                                            {{--                                                <td><input class="form-control" name="rep_inferior_{{$exercicioTreino['lower_member_id']}}" type="text" value="{{$exercicioTreino['rep'] ?? ''}}"></td>--}}
                                            {{--                                                <td><input class="form-control" name="kg_inferior_{{$exercicioTreino['lower_member_id']}}" type="text" value="{{$exercicioTreino['kg'] ?? ''}}"></td>--}}
{{--                                            @endif--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
{{--            </div>--}}
{{--        @if(!$data['status'])--}}
{{--            <!-- /.box-body -->--}}
{{--            <div class="box-footer">--}}

{{--                <button  class="btn btn-default">Cancelar</button>--}}
{{--                <button type="submit" class="btn btn-info pull-right">Editar</button>--}}

{{--            </div>--}}
{{--            <!-- /.box-footer -->--}}
{{--        @endif--}}
        </form>
{{--    </div>--}}
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.multiple').select2();
        });
    </script>
@stop

