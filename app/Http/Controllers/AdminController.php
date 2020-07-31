<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    use AuthenticatesUsers;
    public function index()
    {
        
        return view('admin_dashboard.login');

    }
    protected $redirectTo = '/admin/dashboard';
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $email = $request->input('email');
        // $password = \Hash::make($request->input('password'));
        $password = $request->input('password');
        // Hash::check($oldpassword, $user_password);
        // echo true; exit();
        if(Auth::attempt(['email' => $email, 'password' => $password, 'role' => 'admin', 'status' => 1])){
            // return redirect('/admin/dashboard');
            return redirect()->intended('/admin/dashboard');
        }else{
            return redirect('/admin/login')->with('error','Email Address / Password Mismatch');
        };
        // $user = User::where('email',$email)->where('role','admin')->where('status',true)->get();

        // if($user->count() > 0 ){
        //     $user_password = $user[0]->password; 
        //     if(Hash::check($password, $user_password)){
        //         // take admin to admin dashboard
               
        //         echo auth()->user()->email; exit();
        //         //redirect the user to the admin dashboard 
        //         // return redirect('/admin/dashboard');
            
        //     }else{
        //         echo "wrong password";
        //     }
            
        // }else{
        //     echo "Admin Record not found";exit();
        // }
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
