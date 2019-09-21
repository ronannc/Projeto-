<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Repositories\Contracts\UserRepository;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    private $userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        auth()->user()->update(['last_access' => now()]);
        return redirect(route('dashboard'));
    }

    public function dashboard(){
        $dashboardBadges       = $this->generateSidebarBadges();
        $usersOnlineStatsChart = $this->usersOnlineStatsChart();
        $exceptionsStatsChart  = $this->notificationsStatsChart();

        return view('admin.dashboard', [
            'usersOnlineStatsChart' => $usersOnlineStatsChart,
            'exceptionsStatsChart'  => $exceptionsStatsChart,
            'dashboardBadges'       => $dashboardBadges,
        ]);
    }

    /**
     * Gera os badges (contadores) da sidebar.
     *
     * @return array
     */
    private function generateSidebarBadges()
    {
        $user = new User();
        $usersOnlineCount = count($user->allOnline());


        return [
            'usersCount'       => $user->count(),
            'usersOnlineCount' => $usersOnlineCount,
        ];
    }

    /**
     * Gera um gráfico com o número de usuários online na última semana.
     *
     * @return mixed
     */
    private function usersOnlineStatsChart()
    {
        return app()->chartjs
            ->name('usersOnlineLastWeek')
            ->type('line')
            ->size([
                'width'  => 400,
                'height' => 200
            ])
            ->labels([
                'Domingo',
                'Segunda',
                'Terça',
                'Quarta',
                'Quinta',
                'Sexta',
                'Sábado',
            ])
            ->datasets([
                [
                    "label"                     => "Usuários online na última semana",
                    'backgroundColor'           => "rgba(38, 185, 154, 0.31)",
                    'borderColor'               => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor"          => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor"      => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor"     => "rgba(220,220,220,1)",
                    'data'                      => [
                        $this->userRepository->getOnlineUsersOnLastWeek(1),
                        $this->userRepository->getOnlineUsersOnLastWeek(2),
                        $this->userRepository->getOnlineUsersOnLastWeek(3),
                        $this->userRepository->getOnlineUsersOnLastWeek(4),
                        $this->userRepository->getOnlineUsersOnLastWeek(5),
                        $this->userRepository->getOnlineUsersOnLastWeek(6),
                        $this->userRepository->getOnlineUsersOnLastWeek(7)
                    ],
                ],
            ])
            ->options([]);
    }

    /**
     * Gera um gráfico com a contagem de exceptions no último ano.
     *
     * @return mixed
     */
    private function notificationsStatsChart()
    {
        return app()->chartjs
            ->name('exceptionsStatsLastYear')
            ->type('line')
            ->size([
                'width'  => 400,
                'height' => 200
            ])
            ->labels([
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ])
            ->datasets([
                [
                    "label"                     => "Notificações no Último Ano",
                    'backgroundColor'           => "rgba(191, 221, 252, 1)",
                    'borderColor'               => "rgba(10, 112, 214, 1)",
                    "pointBorderColor"          => "rgba(10, 112, 214, 1)",
                    "pointBackgroundColor"      => "rgba(191, 221, 252, 1)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor"     => "rgba(255,0,0,1)",
                    'data'                      => [
                        $this->getNotificationsCountOfMonth(1),
                        $this->getNotificationsCountOfMonth(2),
                        $this->getNotificationsCountOfMonth(3),
                        $this->getNotificationsCountOfMonth(4),
                        $this->getNotificationsCountOfMonth(5),
                        $this->getNotificationsCountOfMonth(6),
                        $this->getNotificationsCountOfMonth(7),
                        $this->getNotificationsCountOfMonth(8),
                        $this->getNotificationsCountOfMonth(9),
                        $this->getNotificationsCountOfMonth(10),
                        $this->getNotificationsCountOfMonth(11),
                        $this->getNotificationsCountOfMonth(12),
                    ],
                ],
            ])
            ->options([]);
    }

    /**
     * Conta as exceptions de um dado mês no último ano.
     *
     * @param $month
     *
     * @return int
     */
    private function getNotificationsCountOfMonth($month)
    {
        $notificationsNumber = Notification::with([])
            ->where('created_at', '>=', Carbon::now()->subYear(1))
            ->where(DB::raw('MONTH(DATE(created_at))'), $month)
            ->count();

        $numberOfAdmins = count(User::allAdmins());

        $realNumberOfNotifications = intdiv($notificationsNumber, $numberOfAdmins);

        return $realNumberOfNotifications;
    }
}
