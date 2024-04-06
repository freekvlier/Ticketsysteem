<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\Ticket;
use App\Http\Requests\TicketStoreRequest;

class TicketController extends Controller
{
    public function create()
    {
        return Inertia::render('Ticket/Create');
    }

    public function store(TicketStoreRequest $request)
    {
        $ticket = Ticket::create($request->all());

        return redirect()->route('ticket.create', $ticket);
    }
}
