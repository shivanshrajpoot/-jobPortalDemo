<?php

namespace App\Http\Controllers;

use App\Job;
use App\Job_application;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class JobController extends Controller
{


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $jobs = DB::table('jobs AS jb')
                        ->leftJoin('job_applications', 'jb.id', '=', 'job_applications.job_id')
                        ->leftJoin('users', 'users.id', '=', 'job_applications.user_id')
                        ->select('jb.*', 'job_applications.user_id AS applied_id')
                        ->where('jb.title','like', '%'.$search.'%')
                        ->groupBy('jb.id')
                        ->get();
        return view('search',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->role) {
            return view('create_job');
        }else{
            return redirect()->home();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required|string|max:50|min:5',
            'description' => 'required|max:500|min:50',
        ]);
        auth()->user()->publish(
            new Job(request(['title','description']))
        );
        return redirect()->home();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('view_applications',compact('job'));
    }


    public function apply(Request $request)
    {
        if (auth()->user()->role) {
            $response = auth()->user()->apply(
                new Job_application(['job_id'=>base64_decode($request->id)])
            );
            return !$response 
                        ? ['response'=>200,'message'=>'Successfuly Applied.']
                        : ['response'=>500,'message'=>'Something Went Wrong.'];
        }else{
            return redirect()->login();
        }
    }

}
