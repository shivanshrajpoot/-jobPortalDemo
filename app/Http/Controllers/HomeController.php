<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(auth()->user())) {
            if(!@auth()->user()->role){
                $jobs = Job::search(['user_id'=>auth()->id()]);
                return view('home',compact('jobs'));
            }else{
                $jobs = auth()->user()->applications;
                return view('home',compact('jobs'));
            }
        }else{
            return redirect()->action('HomeController@welcome');
        }
    }

    public function welcome()
    {
        return view('welcome');
    }

}
