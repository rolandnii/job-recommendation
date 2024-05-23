<div class="col-lg-4 col-md-5 mt-4 mt-sm-0">
    <div class="job-detail border rounded p-4">
        <h5 class="text-muted text-center pb-2"><i class="mdi mdi-map-marker mr-2"></i>Location</h5>

        <div class="job-detail-location pt-4 border-top">
            {{--            <div class="job-details-desc-item">--}}
            {{--                <div class="float-left mr-2">--}}
            {{--                    <i class="mdi mdi-bank text-muted"></i>--}}
            {{--                </div>--}}
            {{--                <p class="text-muted mb-2">: Web Themes.pvt.Ltd</p>--}}
            {{--            </div>--}}

            <div class="job-details-desc-item">
                <div class="float-left mr-2">
                    <i class="mdi mdi-email text-muted"></i>
                </div>
                <p class="text-muted mb-2">: Webthemescom@gmail.com</p>
            </div>

            <div class="job-details-desc-item">
                <div class="float-left mr-2">
                    <i class="mdi mdi-web text-muted"></i>
                </div>
                <p class="text-muted mb-2">: https://www.WebThemes.com</p>
            </div>

            <div class="job-details-desc-item">
                <div class="float-left mr-2">
                    <i class="mdi mdi-cellphone-iphone text-muted"></i>
                </div>
                <p class="text-muted mb-2">: {{$job?->phone}}</p>
            </div>

            <div class="job-details-desc-item">
                <div class="float-left mr-2">
                    <i class="mdi mdi-currency-usd text-muted"></i>
                </div>
                <p class="text-muted mb-2">: {{$job->salary}}</p>
            </div>

            <div class="job-details-desc-item">
                <div class="float-left mr-2">
                    <i class="mdi mdi-clock-outline text-muted"></i>
                </div>
                <p class="text-muted mb-2">
                    : {{\Illuminate\Support\Carbon::parse($job->created_at)->diffForHumans()}}</p>
            </div>


        </div>
    </div>



    @if(session('apply-success'))
        <div class="alert alert-success mt-4" role="alert">
            {{session('apply-success')}}
        </div>
    @elseif($hasApplied)
        <div class="job-detail border border-success text-success rounded mt-4 p-4">
            You have  applied for this job
        </div>
    @else
        @auth()
            <div class="job-detail border rounded mt-4">
                <button class="btn btn-primary btn-block" form="applicationForm">Apply For Job</button>
                <form action="{{url('apply-job')}}" method="post" id="applicationForm">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="job_id" value="{{$job->id}}">
                </form>
            </div>
        @endauth
   @endif


</div>
