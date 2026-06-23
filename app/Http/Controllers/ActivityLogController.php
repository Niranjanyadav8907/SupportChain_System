<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Display activity log.
     */
    public function index()
    {
        $logs = ActivityLog::with('user')->latest()->paginate(50);
        return view('modules.activity_logs.index', compact('logs'));
    }
}
