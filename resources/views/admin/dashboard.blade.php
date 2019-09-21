{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <script src="{{ asset('js/chartjs/chartjs.min.js') }}"
            type="text/javascript"></script>
    <link href="{{ asset('css/components-md.min.css') }}"
          rel="stylesheet"
          id="style_components"
          type="text/css"/>
    <div class="row"
         style="margin-top: 20px">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue"
               href="{{ route('users.index') }}">
                <div class="visual">
                    <i class="fa fa-users"></i>
                </div>
                <div class="details">
                    <div class="number">
                                <span data-counter="counterup"
                                      data-value="{{ $dashboardBadges['usersCount'] }}">{{ $dashboardBadges['usersCount'] }}</span>
                    </div>
                    <div class="desc">Usuários registrados</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green"
               href="{{ route('notifications.index') }}">
                <div class="visual">
                    <i class="fa fa-bell-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                                <span data-counter="counterup"
                                      data-value="{{ session('notificationsNotVisualizedCount') }}">{{ session('notificationsNotVisualizedCount') }}0</span></div>
                    <div class="desc">{{ session('notificationsNotVisualizedCount') == 1 ? 'Notificação não visualizada' : 'Notificações não visualizadas' }}</div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 green-dark"
               href="{{ route('users.online') }}">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                                <span data-counter="counterup"
                                      data-value="{{ $dashboardBadges['usersOnlineCount'] }}">{{ $dashboardBadges['usersOnlineCount'] }}</span>
                    </div>
                    <div class="desc">{{ $dashboardBadges['usersOnlineCount'] == 1 ? 'Usuário' : 'Usuários'}}
                        online</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue-dark">
                <div class="visual">
                    <i class="fa fa-code"></i>
                </div>
                <div class="details">
                    <div class="number">
                                <span data-counter="counterup"
                                      data-value="{{ substr(phpversion(), 0, 5) }}">{{ substr(phpversion(), 0, 5) }}</span>
                    </div>
                    <div class="desc">Versão do PHP</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 dark">
                <div class="visual">
                    <i class="fa fa-code"></i>
                </div>
                <div class="details">
                    <div class="number">
                                <span data-counter="counterup"
                                      data-value="{{ \Illuminate\Support\Facades\App::version() }}">{{ \Illuminate\Support\Facades\App::version() }}</span>
                    </div>
                    <div class="desc">Versão do Laravel</div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 purple"
               href="">
                <div class="visual">
                    <i class="fa fa-stack-overflow"></i>
                </div>
                <div class="details">
                    <div class="number">
                                <span data-counter="counterup"
                                      data-value="">Horizon</span></div>
                </div>
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h3>Usuários online na última semana</h3>
            {!! $usersOnlineStatsChart->render() !!}
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h3>Notificações no último ano</h3>
            {!! $exceptionsStatsChart->render() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
