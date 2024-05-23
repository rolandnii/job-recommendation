<div class="col-lg-12 mt-4 pt-2">
    <div class="job-list-box border rounded">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="company-logo-img">
{{--                        <img src="{{asset('template/images/featured-job/img-1.png')}}" alt="" class="img-fluid mx-auto d-block">--}}
                    </div>
                </div>
                <div class="col-lg-7 col-md-9">
                    <div class="job-list-desc">
                        <h6 class="mb-2"><a href="#" class="text-dark">{{$job->name}}</a></h6>
                        <p class="text-muted mb-0"><i class="mdi mdi-bank mr-2"></i>{{$job->user->is_admin ? 'Admin' : $job->user->company->name}}</p>
                        <ul class="list-inline mb-0">
{{--                            <li class="list-inline-item mr-3">--}}
{{--                                <p class="text-muted mb-0"><i class="mdi mdi-map-marker mr-2"></i>Confederate Drive Potsdam, NY 13676</p>--}}
{{--                            </li>--}}


                            <li class="list-inline-item">
                                <p class="text-muted mb-0"><i class="mdi mdi-clock-outline mr-2"></i>{{$job->created_at->diffForHumans()}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="job-list-button-sm text-right">
                        <span class="badge badge-success">{{ucwords($job->job_type)}}</span>

                        <div class="mt-3">
                            <a href="{{url('jobs/'.$job->id)}}" class="btn btn-sm btn-primary">Apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
