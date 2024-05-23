<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $applications = Application::with(['user.roles','job'])->where('user_id',$request->user()->id)->get();
        return view('guest.applications.index',[
            'applications' => $applications
        ]);
    }
}
