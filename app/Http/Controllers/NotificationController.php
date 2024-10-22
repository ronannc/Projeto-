<?php

namespace App\Http\Controllers;

use App\DataTables\NotificationDataTable;
use App\Http\Controllers\Auth\Authorizable;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class NotificationController extends Controller
{
    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @param NotificationDataTable $dataTable
     *
     * @return JsonResponse|View
     */
    public function index(NotificationDataTable $dataTable)
    {
        $resource = 'Notificações';
        return $dataTable->render('components.datatable', compact('resource'));
    }

    /**
     * Set the read_at attribute to current date for all non visualized messages.
     */
    public function visualizeAll()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return redirect(route('notifications.index'));
    }

    /**
     * Marca uma notificação como visualizada.
     */
    public function visualize($id)
    {
        Notification::with([])->findOrFail($id)->update(['read_at' => now()]);

        return back();
    }
}
