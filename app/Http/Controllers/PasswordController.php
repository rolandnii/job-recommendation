<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit()
    {
        return view("student.change-password");
    }


    public function update(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'password' => $request->password
        ]);
        return back()->with("success", "password changes successful");
    }
}
