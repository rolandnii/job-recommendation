<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::query()
            ->when($request->query('search') ?? false, function (Builder $q) use ($request) {
                return $q->where('name', 'like', "%" . $request->query('search') . "%")
                    ->orWhere('qualification', "%" . $request->query('search') . "%")
                    ->orWhere('skill', "%" . $request->query('search') . "%");
            })
            ->when($request->query('type') ?? false, function (Builder $q) use ($request) {
                return $q->where('job_type', $request->query('type'));
            })
            ->when($request->query('category') ?? false, function (Builder $q) use ($request) {
                return $q->whereJsonContains('categories', $request->query('category'));
            })
            ->with(['user', 'user.company.company'])
            ->paginate(15);
        $categories  = Category::query()->get();

        return view('guest.job.index', compact('jobs','categories'));
    }

    public function show(Job $job, Request $request)
    {

        Cookie::queue('categories', json_encode($job->categories), 30);
        $hasApplied = $request->user()?->applications()->where('job_id', $job->id)->exists();
        return view('guest.job.show', compact('job', 'hasApplied'));
    }


}
