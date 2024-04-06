<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Http\Requests\TicketReplyRequest;

class TicketReplyController extends Controller
{
    public function store(TicketReplyRequest $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->status = $request->status ?? 'open';

        $userId = auth()->id();

        $reply = new TicketReply($request->all());
        $reply->user_id = $userId;

        $ticket->replies()->save($reply);

        return back()->with('success', 'Reply added successfully.');
    }
}
