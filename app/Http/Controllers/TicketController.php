<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Ticket;
use App\Http\Requests\TicketStoreRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::paginate(20)->through(function ($ticket) {
            return [
                'id' => $ticket->id,
                'name' => $ticket->name,
                'email' => $ticket->email,
                'subject' => $ticket->subject,
                'priority' => $ticket->priority,
                'status' => $ticket->status,
            ];
        });

        return Inertia::render('Ticket/Index', ['tickets' => $tickets]);
    }

    public function create()
    {
        return Inertia::render('Ticket/Create', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function store(TicketStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('attachments')) {
            $attachments = [];
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('public/attachments');
    
                $url = Storage::url($path);
    
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $url,
                ];
            }
    
            $data['attachments'] = json_encode($attachments);
        }

        $ticket = Ticket::create($data);

        return redirect()->back()->with('success', 'Ticket created successfully.');
    }

    public function show($id)
    {
        $ticket = Ticket::with('replies.user')->findOrFail($id);
        
        return Inertia::render('Ticket/Show', ['ticket' => $ticket]);
    }
}
