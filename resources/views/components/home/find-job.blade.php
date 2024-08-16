
<@php(
    $defaultImage = '01HXSZS0KA1VGB6BYR4ZMZ4ZYC.png'
)
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title title-line pb-5">Find Your Jobs </h4>
{{--                    <p class="text-muted para-desc mx-auto mb-1">Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>--}}
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center mt-4 pt-2">
                <ul class="nav nav-pills nav nav-pills bg-white rounded nav-justified flex-column flex-sm-row" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link rounded active" id="recommended-job-tab" data-toggle="pill" href="#recommended-job" role="tab" aria-controls="recommended-job" aria-selected="true">Recommended</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link rounded" id="recent-job-tab" data-toggle="pill" href="#recent-job" role="tab" aria-controls="recent-job" aria-selected="false">Recent Jobs</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content mt-2" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="recommended-job" role="tabpanel" aria-labelledby="recommended-job-tab">
                        <div class="row">
                            <div class="col-lg-12">

                                @forelse($recommendedJobs as $recommendedJob)
{{--                                    @php(dd($recommendedJob->user))--}}
                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                        <div class="lable text-center pt-2 pb-2">
                                            <ul class="list-unstyled best text-white mb-0 text-uppercase">
                                                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <div class="mo-mb-2">
                                                        @php($image = $recommendedJob->user?->company?->company  ? $recommendedJob->user->company->company->logo  : $defaultImage)
                                                        <img src="{{asset( 'storage/'.$image)}}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>

                                                        <h5 class="f-18"><a href="#" class="text-dark">{{$recommendedJob->name}}</a></h5>
                                                        <p class="text-muted mb-0">{{ $recommendedJob->user?->company?->id ? $recommendedJob->user?->company?->company?->name  : 'Admin' }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>{{$recommendedJob->location}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <p class="text-muted mb-0 mo-mb-2"><span class="text-primary">GHC</span>{{$recommendedJob->salary}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <p class="text-muted mb-0">{{ucwords($recommendedJob->job_type)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 bg-light">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div>
{{--                                                        <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Experience :</span> 1 - 2 years</p>--}}
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <a href="{{url('jobs/'.$recommendedJob->id)}}" class="text-primary">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <p class="text-muted para-desc mx-auto mb-1">
                                        No job recommendation currently
                                        .</p>

                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="recent-job" role="tabpanel" aria-labelledby="recent-job-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                @forelse($recentJobs->load('user.company.company') as $recentJob)
                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
{{--                                        <div class="lable text-center pt-2 pb-2">--}}
{{--                                            <ul class="list-unstyled best text-white mb-0 text-uppercase">--}}
{{--                                                <li class="list-inline-item"><i class="mdi mdi-star"></i></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
                                        <div class="p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <div class="mo-mb-2">
                                                        @php($image = $recentJob->user?->company?->company  ? $recentJob->user->company->company->logo  : $defaultImage)
                                                        <img src="{{asset( 'storage/'.$image)}}" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>

                                                        <h5 class="f-18"><a href="#" class="text-dark">{{$recentJob->name}}</a></h5>
                                                        <p class="text-muted mb-0">{{ $recentJob->user?->company?->company ? $recentJob->user->company->company->name  : 'Admin' }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>{{$recentJob->location}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <p class="text-muted mb-0 mo-mb-2"><span class="text-primary mr-1">GHC</span>{{$recentJob->salary}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <p class="text-muted mb-0">{{ucwords($recentJob->job_type)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-3 bg-light">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div>
                                                        {{--                                                        <p class="text-muted mb-0 mo-mb-2"><span class="text-dark">Experience :</span> 1 - 2 years</p>--}}
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div>
                                                        <a href="{{url('jobs/'.$recentJob->id)}}" class="text-primary">Apply Now <i class="mdi mdi-chevron-double-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <p class="text-muted para-desc mx-auto mb-1">
                                        No job recommendation currently
                                        .</p>

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <!-- end row -->
        <div class="row">
            <div class="col-lg-12 mt-4 pt-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination job-pagination mb-0 justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="mdi mdi-chevron-double-left f-15"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="mdi mdi-chevron-double-right f-15"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- end containar -->
</section>
