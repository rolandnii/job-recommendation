<?php

namespace App\Http\Controllers;


use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {

        $jobs = Job::all();

        $recommendedJobs = $jobs->reject(function (Job $job) use ($request) {
            $cookie = json_decode($request->cookie('categories')) ?? [];
            if (!empty($cookie)) {
                $cookie  = is_array($cookie) ? $cookie : [$cookie];
            }

            return empty(array_intersect($job->categories,$cookie));
        }) ;

        $recommendedJobs = $recommendedJobs->shuffle();

        $recentJobs = $jobs->toQuery()->latest()->paginate(1);



        return view('home',compact('recentJobs','recommendedJobs',));
    }


}

