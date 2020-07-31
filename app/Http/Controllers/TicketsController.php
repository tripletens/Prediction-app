<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tickets;
class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
    {
        //
        $user_id = auth()->user()->id;
        $user_tickets = Tickets::where('user_id', $user_id)
           ->orderBy('id', 'desc')
           ->get();
        $data = array(
            'tickets'=>$user_tickets
        );
        return view('user_dashboard.tickets-view')->with($data);
    }

    public function open()
    {
        //
        return view('user_dashboard.tickets-open');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user_id = auth()->user()->id;
        
        //`user_id`, `title`, `message`, `reply`, `status`,
        $this->validate($request, [
            'title' => 'required',
            'message' => 'required'
        ]);

        
        //checks if a user is logged in 
        if($user_id != null){

            $ticket = new Tickets;

            $ticket->user_id = $user_id;
            $ticket->title = $request->input('title');
            $ticket->message = $request->input('message');
            
            // save the data to the database now 
            $save = $ticket->save();

            if($save == true){
                return redirect('/user/ticket/open')->with(['success'=>'Successfully sent Ticket']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
