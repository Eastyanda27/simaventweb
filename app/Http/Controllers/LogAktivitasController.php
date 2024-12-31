<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogAktivitasController extends Controller
{
    public function index()
    {
        $activities = Activity::join('users', 'users.id', '=', 'activity_log.causer_id')
                              ->select('activity_log.description', 'users.employee_name', 'activity_log.properties', 'activity_log.created_at',
                                       'users.access')
                              ->paginate(10)->withQueryString();
        
        return view('/logaktivitas', compact('activities'));
    }
}
