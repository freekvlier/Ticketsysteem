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
    public function index(Request $request)
    {
        $query = Ticket::query();

        $sortBy = $request->input('sortBy', 'id');
        $sortDirection = $request->input('sortDirection', 'asc');

        if ($sortBy === 'priority') {
            $priorities = ['low', 'medium', 'high'];
            if ($sortDirection === 'asc') {
                $priorityOrder = "FIELD(priority, '" . implode("', '", $priorities) . "') ASC";
            } else {
                $priorityOrder = "FIELD(priority, '" . implode("', '", $priorities) . "') DESC";
            }
            $query->orderByRaw($priorityOrder);
        } else {
            $query->orderBy($sortBy, $sortDirection);
        }

        $tickets = $query->paginate(20)->through(function ($ticket) {
            return [
                'id' => $ticket->id,
                'name' => $ticket->name,
                'email' => $ticket->email,
                'subject' => $ticket->subject,
                'priority' => $ticket->priority,
                'status' => $ticket->status,
            ];
        })->withQueryString();

        return Inertia::render('Ticket/Index', [
            'tickets' => $tickets,
            'sortBy' => $sortBy,
            'sortDirection' => $sortDirection,
        ]);
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
