<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
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
    public function index()
    {
        //
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
    public function update(Request $request)
    {
        //`username`, `email`, `password`, `role`, `activated`, `status`,`ending_date`
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
                    return redirect('user/profile/settings')->with(['success' => 'Profile Updated Successfully']);
                }
            } else {
                return redirect('user/profile/settings')->with(['error' => 'Passwords does not Match ']);
            }
        } else {
            return redirect('user/profile/settings')->with(['error' => 'Wrong Old Password']);
        }
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
