<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display settings panel.
     */
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('modules.settings.index', compact('settings'));
    }

    /**
     * Batch update settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'settings' => 'required|array'
        ]);

        foreach ($request->settings as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        // Log action
        \App\Models\ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'SETTINGS UPDATED',
            'description' => 'System settings updated in bulk.',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return back()->with('status', 'Settings updated successfully.');
    }
}
