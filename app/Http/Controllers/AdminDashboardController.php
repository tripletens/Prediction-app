<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Games;
use App\Tickets;
class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {  
        if(Auth::guest() || Auth::user() == null){
            if(Auth::user() != null && Auth::user()->role != 'admin'){
                $this->middleware('auth');
            }
            $this->middleware('auth');
        }
    }

    public function index()
    {
        //
        // return view('admin_dashboard.login'); //
    }

    public function home()
    {
        return view('admin_dashboard.index');
    }
    public function fetch_users()
    {
        $userrole = auth()->user()->role;
       
        if ($userrole == 'admin') {
            // check fetch all the users 
            $users = User::all();
                return view('admin_dashboard.view_users')->with(['users' => $users]);
        }else{
            return redirect('/login');
        }
    }
    public function fetch_one_user(Request $request , $id)
    {
        $userrole = auth()->user()->role;

        if ($userrole == 'admin') {
            // check fetch all the users 
            $users = User::find($id);
             
            return view('admin_dashboard.view-one-user')->with(['users' => $users]);
        } else {
            return redirect('/login');
        }
    }
    public function activate_user(Request $request, $id)
    {
        if (auth()->user()->id !== null) {
            $userrole = auth()->user()->role;
            if ($userrole == 'admin') {
                $user = User::find($id);
                // echo $user; exit();
                $duration = $request->input('duration');
                $old_expiry_date = $user->ending_date;
                if ($old_expiry_date > date('Y-m-d h-i-sa')) {
                    // means the user already has an ongoing plan 
                    // old date + the three months = new month date
                    $d = strtotime("$old_expiry_date +" . $duration . "Months");
                   
                    $ending_date = date("Y-m-d h:i:s", $d);
                } else {
                    $d = strtotime("+" . $duration . "Months");
                    $ending_date = date("Y-m-d h:i:s", $d);
                    //meaning user's plan has expired
                    $user->activated = 1;
                }
                $user->ending_date = $ending_date;
                $user->status = 1;
                $user->save();
                if ($user->save()) {
                    $users = User::all();
                    return view('admin_dashboard.view_users')->with(['users' => $users, 'success' => 'User Activated']);
                }
            }else{
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
    public function deactivate_user(Request $request, $id)
    {
        if (auth()->user()->id !== null) {
            $userrole = auth()->user()->role;
            if ($userrole == 'admin') {
                $user = User::find($id);
                $user->status = 0;
                $user->save();
                if ($user->save()) {
                    $users = User::all();
                    return view('admin_dashboard.view_users')->with(['users' => $users, 'success' => 'User Deactivated']);
                }
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
    public function add_game(){
        if (auth()->user()->id !== null) {
            $userrole = auth()->user()->role;
            if ($userrole == 'admin') {
                return view('admin_dashboard.add_games');
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
    public function process_add_game(Request $request)
    {
        if (auth()->user()->id !== null) {
            $userrole = auth()->user()->role;
            if ($userrole == 'admin') {
                $game_code = substr(str_shuffle(str_repeat("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", 10)), 0, 10);
                
                //  `game_code`, `picture`, `status`, `created_at`,
                //   `updated_at`, `match_time`, `team_a`, `team_b`, 
                //   `percent`, `result_a`, `result_b`, `match_date`, `game_type`,
                //   `game_status`, `team_a_odd`, `team_b_odd`, `category`,
                //    `package`, `current_package`
                $this->validate($request, [
                    'match_time' => 'required',
                    'match_date' => 'required',
                    'team_a'=>'required',
                    'team_b'=>'required',
                    'percent'=>'required',
                    'game_type'=>'required',
                    'team_a_odd' => 'required',
                    'team_b_odd' => 'required',
                    'category'=>'required',
                    'package' => 'required'
                ]);
                $game = new Games();
                $game->match_time = $request->input('match_time');
                $game->match_date = $request->input('match_date');
                $game->team_a = $request->input('team_a');
                $game->team_b = $request->input('team_b');
                $game->percent = $request->input('percent');
                $game->game_type = $request->input('game_type');
                $game->team_a_odd = $request->input('team_a_odd');
                $game->team_b_odd = $request->input('team_b_odd');
                $game->category = $request->input('category');
                $game->package = $request->input('package');
                // lemme add other variables 
                $game->game_code = $game_code;
                $game->created_at = date("Y-m-d h:i:s");
                $game->updated_at = date("Y-m-d h:i:s");
                $save = $game->save();

                if($save == TRUE){
                    return redirect('/admin/add-game')->with('success','Successfully Added');
                }else{
                    return redirect('/admin/add-game')->with('error' , 'An Error Occured, unable to add game ');
                }
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
    public function update_result(Request $request, $category, $type, $id){
        $this->validate($request, [
            'result_a' => 'required',
            'result_b' => 'required'
        ]);
        $game = Games::find($id);
        $game->result_a = $request->input('result_a');
        $game->result_b = $request->input('result_b');
        $game->save();
        return redirect('/admin/games/view/' . $category . '/' . $type)->with('success','Successfully Added Result');
    }
    public function view(){
        $userrole = auth()->user()->role;
        $activated = auth()->user()->activated;
        if ($userrole == 'user') {
            // check if user is activated 
            // if($activated == true){
                // check fetch all the games 
                $games = Games::where('status', 1)
                   ->orderBy('id', 'desc')
                   ->get();
                return view('user_dashboard.view_games')->with(['games'=>$games]);
            // }else{
            //     // redirect users to the payment page 
            //     return view('user_dashboard.not-activated-page');
            // }
        }else{
            $games = Games::all();
            return view('admin_dashboard.view_games')->with(['games' => $games]);
        }
    }
    public function view_free(Request $request , $type = null)
    {
        $userrole = auth()->user()->role;
    
        if ($userrole == 'admin') {
            //  allow user access to free games  
            //  get yesterday's games tomorrow
            
            $yesterday = date("Y-m-d", strtotime("yesterday"));
        
            $yesterday_games = Games::where('game_type', $type)
                ->where('category', 'free')
                ->where('match_date',$yesterday)
                // ->where('status', 1) admin should be able to see all yesterday's games 
                ->orderBy('id', 'desc')
                ->get();
            // echo $yesterday;
            // exit();
            // echo $yesterday_games; exit();
            $today = date("Y-m-d", strtotime("today"));
        
            $today_games = Games::where('game_type', $type)
                ->where('category', 'free')
                ->where('match_date',$today)
                
                ->orderBy('id', 'desc')
                ->get();
            // echo $today; exit();
            $tomorrow = date("Y-m-d", strtotime("tomorrow"));
        
            $tomorrow_games = Games::where('game_type', $type)
                ->where('category', 'free')
                ->where('match_date',$tomorrow)
                
                ->orderBy('id', 'desc')
                ->get();

            $data = [
                        'yesterday'=> $yesterday_games,
                        'today'=> $today_games,
                        'tomorrow'=> $tomorrow_games
                    ];
            return view('admin_dashboard.view_free_games')->with($data);
        }
    }
    public function view_paid(Request $request, $type = null)
    {
        $userrole = auth()->user()->role;
       
        if ($userrole == 'admin') {
                //  allow user access to free games  
                //  get yesterday's games tomorrow
                //  category means either paid or free
                $yesterday = date("Y-m-d", strtotime("yesterday"));
                // echo $yesterday; exit();
                $yesterday_games = Games::where('game_type', $type)
                    ->where('category', 'paid')
                    ->where('match_date', $yesterday)
                    ->orderBy('id', 'desc')
                    ->get();

                $today = date("Y-m-d", strtotime("today"));

                $today_games = Games::where('game_type', $type)
                    ->where('match_date', $today)
                    ->where('category', 'paid')
                    ->orderBy('id', 'desc')
                    ->get();
                // echo $today; exit();
                $tomorrow = date("Y-m-d", strtotime("tomorrow"));

                $tomorrow_games = Games::where('game_type', $type)
                    ->where('match_date', $tomorrow)
                    ->where('category', 'paid')
                    ->orderBy('id', 'desc')
                    ->get();

                $data = [
                    'yesterday' => $yesterday_games,
                    'today' => $today_games,
                    'tomorrow' => $tomorrow_games
                ];
                return view('admin_dashboard.view_paid_games')->with($data);   
            }
    }
    public function activate_game(Request $request, $category, $type, $id)
    {
        // /admin/games/activate/{{ $item_y->category }}
        // /{{ $item_y->game_type }}/{{ $item_y->id }}
        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;

        // echo $id ;exit();
        //checks if a user is logged in 
        if ($user_id != null) {
            if ($user_role == 'admin') {
                $game = Games::find($id);
                $game->status = 1;
                $game->save();
                return redirect('/admin/games/view/' . $category . '/' . $type);
            } else {
                return redirect('/login');
            }
        }
    }
    public function deactivate_game(Request $request, $category, $type, $id )
    {
        // /admin/games/activate/{{ $item_y->category }}
        // /{{ $item_y->game_type }}/{{ $item_y->id }}
        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;

        //checks if a user is logged in 
        if ($user_id != null) {
            if ($user_role == 'admin') {
                $game = Games::find($id);
                $game->status = 0;
                $game->save();
                return redirect('/admin/games/view/'. $category .'/' . $type);            
            } else {
                return redirect('/login');
            }
        }
    }

    public function open_ticket(Request $request)
    {

        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;

        //checks if a user is logged in 
        if ($user_id != null) {

            if($user_role == 'admin'){
                return view('admin_dashboard.tickets-open');
            }else{
                return redirect('/login');
            }
            
        }
    }
    public function view_ticket(Request $request)
    {

        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;
        //checks if a user is logged in 
        if ($user_id != null) {

            if ($user_role == 'admin') {
                $user_id = auth()->user()->id;
                $user_tickets = Tickets::orderBy('id', 'DESC')
                    ->get();
                $data = array(
                    'tickets' => $user_tickets
                );
                return view('admin_dashboard.tickets-view')->with($data);
            } else {
                return redirect('/login');
            }
        }
    }
    public function reply_ticket(Request $request , $id){
        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;
        //checks if a user is logged in 
        if ($user_id != null) {

            if ($user_role == 'admin') {
                $user_id = auth()->user()->id;
                $user_tickets = Tickets::find($id);
                $data = array(
                    'ticket' => $user_tickets
                );
                return view('admin_dashboard.tickets-reply')->with($data);
            } else {
                return redirect('/login');
            }
        }
    }
    public function process_ticket(Request $request)
    {

        $user_id = auth()->user()->id;

        //`user_id`, `title`, `message`, `reply`, `status`,
        $this->validate($request, [
            'title' => 'required',
            'message' => 'required'
        ]);


        //checks if a user is logged in 
        if ($user_id != null) {

            $ticket = new Tickets;

            $ticket->user_id = $user_id;
            $ticket->title = $request->input('title');
            $ticket->message = $request->input('message');

            // save the data to the database now 
            $save = $ticket->save();

            if ($save == true) {
                return redirect('/admin/ticket/open')->with(['success' => 'Successfully sent Ticket']);
            }
        }
    }
    public function process_reply_ticket(Request $request , $id)
    {

        $user_id = auth()->user()->id;

        //`user_id`, `title`, `message`, `reply`, `status`,
        $this->validate($request, [
            'reply' => 'required'
        ]);


        //checks if a user is logged in 
        if ($user_id != null) {

            // check if user is admin 

            if(auth()->user()->role == 'admin'){
                $ticket =  Tickets::find($id);

                // echo true; exit();
                $ticket->reply = $request->input('reply');
                $ticket->status = 0;

                // save the data to the database now 
                $save = $ticket->save();

                if ($save == true) {
                    return redirect( '/admin/ticket/reply/' . $id)->with(['success' => 'Successfully replied Ticket']);
                }
            }else{
                return redirect('/login');
            }

            
        }
    }
    public function profile(Request $request)
    {
        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;
        //checks if a user is logged in 
        if ($user_id != null) {

            if ($user_role == 'admin') { 
                return view('admin_dashboard.profile');
            } else {
                return redirect('/login');
            }
        }
    }
    public function profile_settings(){
        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;
        //checks if a user is logged in 
        if ($user_id != null) {

            if ($user_role == 'admin') {
                return view('admin_dashboard.profile-setting');
            } else {
                return redirect('/login');
            }
        }
    }
    public function process_profile_settings(Request $request){
        if(auth()->user()->role == 'admin'){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $user_password = auth()->user('id')->password;
            $this->validate($request, [
                'username' => 'required',
                'old-password' => 'required',
                'new-password' => 'required|min:8',
                'confirm-new-password' => 'required|min:8|same:new-password'
            ]);
            $username = $request->input('username');
            $oldpassword = $request->input('old-password');
            $newpassword = $request->input('new-password');
            $cnewpassword = $request->input('confirm-new-password');


            if (Hash::check($oldpassword, $user_password)) {

                if ($newpassword == $cnewpassword) {
                    $user->username = $username;
                    $user->password = Hash::make($newpassword);
                    $save = $user->save();
                    if ($save) {
                        return redirect('admin/profile/settings')->with(['success' => 'Profile Updated Successfully']);
                    }
                } else {
                    return redirect('admin/profile/settings')->with(['error' => 'Passwords does not Match ']);
                }
            } else {
                return redirect('admin/profile/settings')->with(['error' => 'Wrong Old Password']);
            }
        }
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
        //
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
