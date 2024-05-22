<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class JobController extends Controller
{
    public function index()
    {

        return view('guest.job.index');
    }

    public function show(Job $job, Request $request)
    {

        Cookie::queue('categories', json_encode($job->categories),30);
        return view('guest.job.show', compact('job'));
    }


}
