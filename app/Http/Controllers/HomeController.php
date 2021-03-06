<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lesson;
use Auth;
use App\ActivityLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(auth()->user()->is_admin){
            return redirect('/admin/home');
        }

        $completeLessons = Auth::user()->lessonTakens->where('is_complete', 1)->unique('lesson_id');
        foreach($completeLessons as $lesson){

            $lesson->times = Auth::user()->lessonTakens
                                         ->where('is_complete', 1)
                                         ->where('lesson_id' , $lesson->lesson_id)
                                         ->count();
        }

        $activities = Auth::user()->activities()->orderBy('created_at','desc')->get();


        return view('home', compact('completeLessons','activities'));
    }

    

    public function showUsers()
    {
        $users = User::where("id" , "!=" , Auth::user()->id)
                      ->where('is_admin' , '==' , 0)
                      ->paginate(5);


        $activities = ActivityLog::where('user_id', '!=', auth()->user()->id)->orderBy('created_at','desc')->get();


        return view('users.usersList', compact('users', 'activities'));
    }

    public function showAllLessons(){
        

        $adminlessons = Lesson::has('quizzes' , '>' , 0 )->whereHas('user' , function($query){
             $query->where('is_admin' , '=' , 1);
        })->orderByDesc('created_at')->get();

        $userlessons = Lesson::has('quizzes' , '>' , 0 )->whereHas('user' , function($query){
            $query->where('is_admin' , '=' , 0);
       })->orderByDesc('created_at')->get();

        $sortedLessons =  $adminlessons->merge($userlessons);

        return view('lessons.lessons', compact('sortedLessons'));
    }

    
}
