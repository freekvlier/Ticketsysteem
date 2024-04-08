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

        $data = $request->validated();
        
        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('attachments');
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'path' => $path,
                ];
            }

            $data['attachments'] = json_encode($attachments);
        }

        $reply = new TicketReply();
        $reply->fill($data);
        $reply->user_id = $userId;
        $ticket->replies()->save($reply);

        return back()->with('success', 'Reply added successfully.');
    }
}
