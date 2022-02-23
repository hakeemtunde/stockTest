<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\ETicket\CommonStr;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.tickets')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create-ticket')->with(['success'=> null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'topic' => 'required|min:3|string',
            'message' => 'required',
            'status' => 'required'
        ]);
        $data = $request->only(['topic', 'message', 'status']);
        $data['user_id'] = $request->user()->id;
        
        Ticket::create($data);
        
        return view('ticket.create-ticket')->with(['success'=> 'ticket created']);
    }

    public function show(Ticket $ticket)
    {
        return view('ticket.update-ticket')->with(['ticket'=> $ticket, 'success'=>null]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'topic' => 'required|min:3|string',
            'message' => 'required',
            'status' => 'required'
        ]);
        $data = $request->only(['topic', 'message', 'status']);
        
        $ticket->update($data);
        
        return redirect(CommonStr::TICKET_PATH);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticket)
    {
        Ticket::findOrFail($ticket)->delete();
        return back();
    }
}
