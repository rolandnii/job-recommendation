<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('guest.job.index');
    }

    public function show(Request $request)
    {

        return view('guest.job.show');
    }


}
