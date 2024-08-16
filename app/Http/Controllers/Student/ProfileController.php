<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function edit()
    {
        return view("student.profile.edit");
    }


    public function store(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile("cv")) {
            $path = $request->file("cv")->store();
            $data["cv"] = $path;
        }
        $request->user()->update($data);

        return back()->with("The profile was updated!");
    }


}
