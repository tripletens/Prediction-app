<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Games;

class GamesController extends Controller
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
        $activated = auth()->user()->activated;
        if ($userrole == 'user') {
            //  allow user access to free games  
            //  get yesterday's games tomorrow
            
            $yesterday = date("Y-m-d", strtotime("yesterday"));
        
            $yesterday_games = Games::where('game_type', $type)
                ->where('category', 'free')
                ->where('match_date',$yesterday)
                ->orderBy('id', 'desc')
                ->get();

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
            return view('user_dashboard.view_free_games')->with($data);
        } else {
            $games = Games::all();
            return view('admin_dashboard.view_games')->with(['games' => $games]);
        }
    }
    public function view_paid(Request $request, $type = null)
    {
        $userrole = auth()->user()->role;
        $activated = auth()->user()->activated;
        $user_package = auth()->user()->current_package;
        if ($userrole == 'user') {
            if($activated == true){
                //  allow user access to free games  
                //  get yesterday's games tomorrow
                //  category means either paid or free
                $yesterday = date("Y-m-d", strtotime("yesterday"));

                $yesterday_games = Games::where('game_type', $type)
                    ->where('category', 'paid')
                    ->where('package', $user_package)
                    ->where('match_date', $yesterday)
                    ->orderBy('id', 'desc')
                    ->get();

                $today = date("Y-m-d", strtotime("today"));

                $today_games = Games::where('game_type', $type)
                    ->where('match_date', $today)
                    ->where('category', 'paid')
                    ->where('package', $user_package)
                    ->orderBy('id', 'desc')
                    ->get();
                // echo $today; exit();
                $tomorrow = date("Y-m-d", strtotime("tomorrow"));

                $tomorrow_games = Games::where('game_type', $type)
                    ->where('match_date', $tomorrow)
                    ->where('category', 'paid')
                    ->where('package', $user_package)
                    ->orderBy('id', 'desc')
                    ->get();

                $data = [
                    'yesterday' => $yesterday_games,
                    'today' => $today_games,
                    'tomorrow' => $tomorrow_games
                ];
                return view('user_dashboard.view_paid_games')->with($data);   
            }else{
                //  take users to the packages page so user can pay for a package  
                $games = Games::where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();
                return view('user_dashboard.view_games')->with(['games' => $games]);
            }
        } else {
            $games = Games::all();
            return view('admin_dashboard.view_games')->with(['games' => $games]);
        }
    }
    public function view_one(Request $request , $id){
        
        if(auth()->user() !== null ){
            $userrole = auth()->user()->role;
            $is_activated = auth()->user()->activated;
            if ($userrole == 'user' && $is_activated == true) { 
                $game = Games::find($id);
                // echo  var_dump($game[0]);exit();
                if($game != null){
                    // echo true; exit();
                    return view('user_dashboard.view-one-game')->with(['game'=>$game]);
                }else{
                    echo false;exit();
                }
            }else if( $userrole == 'admin'){
                $game = Games::find($id);
                if ($game != null) {
                    return view('admin_dashboard.view-one-game')->with(['game' => $game]);
                }
            }else{
                return redirect('/login');
            }
        }
          
    }
    
    public function activate_game(Request $request, $id){
        if (auth()->user()->id !== null) {
            $userrole = auth()->user()->role;
            if($userrole == 'admin'){   
                $game = Games::find($id);
                $game->status = 1;
                $game->save();
                if($game->save()){
                    return view('admin_dashboard.view-one-game')->with(['game' => $game,'success'=>'Game Activated']);
                }
            }else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
    }
    public function deactivate_game(Request $request, $id)
    {   
        if (auth()->user() !== null) {
            $userrole = auth()->user()->role;
            if ($userrole == 'admin') {
                $game = Games::find($id);
                $game->status = 0;
                $game->save();
                if ($game->save()) {
                    return view('admin_dashboard.view-one-game')->with(['game' => $game, 'success' => 'Game Deactivated']);
                }
            }else{
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
    public function add_game(Request $request)
    {
        // echo true;exit();
        if (auth()->user() !== null) {
            $userrole = auth()->user()->role;
            if ($userrole == 'admin') {
                $game = new Games();
                $image_file = $request->file('picture');
                $game->game_code = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10);
                // echo  $image_file_mime; exit();
                $this->validate($request, [
                    'picture' => 'required',

                ]);
                // $image_file = $request->file('image');
                if ($image_file != "" || !empty($image_file)) {
                    $image_file_size = $image_file->getSize();
                    $image_file_name = $image_file->getClientOriginalName();
                    $image_file_extension = $image_file->getClientOriginalExtension();
                    $image_file_path = $image_file->getRealPath();
                    $image_file_mime = $image_file->getMimeType();
                    $picture = md5(str_random(100000)) . $image_file->getClientOriginalName();
                    $game->picture = $picture;

                    if (
                        $image_file !== "" && !empty($image_file) || strtolower($image_file_extension)
                        == 'jpg' ||  strtolower($image_file_extension)
                        == 'jpeg' ||  strtolower($image_file_extension) == 'png'
                    ) {

                        // check for the image size 
                        if ($image_file_size > 2000000) { }
                        //Move Uploaded File
                        $destinationPath = 'uploads';
                        // i have to fetch the image with the name from that images path 
                        // and delete the image 
                        $current_pic  = $game->picture;
                        $game->save();
                        $picturefile = $destinationPath . '/' . $current_pic;
                        $moved = $image_file->move($destinationPath, $picture);
                        if ($moved == true) {
                            return redirect('/admin/add-game')->with(['success' => 'Game Added Successfully']);
                            // echo "<script>alert('uploaded');</script>";
                            // exit();
                        } else {
                            return redirect('/admin/add-game')->with(['error' => 'Error Uploading Game']);
                            // echo "<script>alert('error uploading ');</script>";
                        }
                    }
                } else {
                    $game->picture = "No Image";
                }
                
                $game->save();

                if ($game->save()) {
                    return view('admin_dashboard.add_games')->with(['success' => 'Game Added Successfully']);
                }
            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login');
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
