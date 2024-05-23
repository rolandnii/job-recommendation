<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationStoreRequest;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function __invoke(JobApplicationStoreRequest $request)
    {
        $data = $request->validated();
        $request->user()->applications()->create($data);

        return back()->with('apply-success', 'Your application was successful');
    }
}
