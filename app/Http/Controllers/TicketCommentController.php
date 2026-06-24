<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketComment;
use App\Models\TicketAttachment;
use App\Notifications\TicketCommentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TicketCommentController extends Controller
{
    
    public function store(Request $request, Ticket $ticket)
    {
        $request->validate([
            'comment' => 'required|string',
            'is_internal' => 'nullable|boolean',
            'attachment' => 'nullable|file|max:10240'
        ]);

        $user = Auth::user();
        $isInternal = $request->boolean('is_internal', false);

        if ($isInternal && !$user->isAdmin() && !$user->isTeamLead() && !$user->isProjectManager() && !$user->isHR()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized to add internal notes.'
            ], 403);
        }

        // ====================== Upload attachment if any ============================================
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('comments', 'public');
        }

        $comment = $ticket->comments()->create([
            'user_id' => $user->id,
            'comment' => $request->comment,
            'is_internal' => $isInternal,
            'attachment_path' => $attachmentPath
        ]);

        
        if ($request->hasFile('attachment')) {
            TicketAttachment::create([
                'ticket_id' => $ticket->id,
                'user_id' => $user->id,
                'file_name' => $request->file('attachment')->getClientOriginalName(),
                'file_path' => $attachmentPath,
                'file_size' => $request->file('attachment')->getSize(),
                'mime_type' => $request->file('attachment')->getMimeType()
            ]);
        }

        // ======================= Send notifications =====================================
        // Notify Assignee (if comment by creator) or Creator (if comment by assignee)
        $notifyUser = null;
        if ($comment->user_id === $ticket->user_id) {
            $notifyUser = $ticket->assignee;
        } else {
            $notifyUser = $ticket->creator;
        }

        if ($notifyUser && !$isInternal) {
            try {
                $notifyUser->notify(new TicketCommentNotification($ticket, $comment, $notifyUser));
            } catch (\Exception $e) {
                Log::error("Failed to send TicketCommentNotification: " . $e->getMessage());
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Comment posted successfully.',
            'comment' => $comment->load('user'),
            'formatted_date' => $comment->created_at->format('d M Y h:i A')
        ]);
    }
}
