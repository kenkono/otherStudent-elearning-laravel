<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\User;
use App\Follower;
use App\ActivityLog;
use Storage;
use Validator;

class UserController extends Controller
{
    public function edit($id)
    {   
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    public function update($id){

        $user = Auth::user()->update([
            'name' => request()->new_name,
            'email' => request()->new_email,
        ]);


        if(request()->file('image')){

            request()->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $file = request()->file('image')->getClientOriginalName(); 

            request()->file('image')->storeAs('public/images', $file); 
            
            $user = User::find($id);
            $user->avatar = '/storage/images/'.$file;
            $user->save();
        }
        if(request()->password){
            //validation rule
            request()->validate([
                'password' => ['required', 'min:6', 'confirmed']
            ]);
            if(Hash::check(request()->current_password, Auth::user()->password)){
                Auth::user()->update([
                    'password' => Hash::make(request()->password)
                ]);
            } else {
                return "incorrect password";
            }
            
        }

        return redirect('/home'); 
    }

    public function showFollowing(){
        $users = Auth::user()->following()->paginate(3);
        return view('users.usersList', compact('users'));
    }
    public function showFollowers(){
        $users = Auth::user()->followers()->paginate(3);
        return view('users.usersList', compact('users'));
    }

    public function showUserProfile($id)
    {
        $user = User::find($id); 
        $activities = $user->activities()->orderBy('created_at','desc')->get();

        return view('users.userProfile', compact('user', 'activities'));
    }

    public function follow($id){
        Auth::user()->following()->attach($id);

        $follower = Follower::where('user_id' , $id)
                              ->where('follower_id' , auth()->user()->id)
                              ->first();


        $follower->activities()->create(['user_id' =>  auth()->user()->id,
                                            'message' => $follower->follower->name.' followed '.$follower->user->name]);
        
        return redirect()->back();
    }
    public function unfollow($id){
        $unfollow = Auth::user()->following()->detach($id);
        
        return redirect()->back();
    }
}
