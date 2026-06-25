<?php

namespace App\Http\Controllers;

use App\Models\Escalation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EscalationController extends Controller
{
    
    //======================================= Display escalations log.==========================================
    
    public function index()
    {
        $user = auth()->user();
        $query = Escalation::with(['ticket', 'oldAssignee', 'escalatedTo']);

        if (!$user->isAdmin()) {
            if ($user->isTeamLead() || $user->isProjectManager()) {
                // Filter by escalated_to self
                $query->where('escalated_to', $user->id);
            } else {
                abort(403, 'Unauthorized access to escalation logs.');
            }
        }

        $escalations = $query->latest()->get();

        return view('modules.escalations.index', compact('escalations'));
    }

    
    //================================= Mark escalation as resolved.===============================================
    
    public function resolve(Request $request, Escalation $escalation)
    {
        $escalation->update([
            'status' => 'resolved',
            'resolved_at' => Carbon::now()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Escalation log updated as resolved.'
        ]);
    }
}
