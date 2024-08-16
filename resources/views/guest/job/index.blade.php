<x-guest>
    <x-slot name="pageTitle">Jobs</x-slot>
    {{--    <x-preloader />--}}
    <x-navbar/>
    <x-job.hero-section  mainPage="Jobs" subPage=""/>
    <x-job.filter-box :categories="$categories"/>
    <section class="section pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mb-4 pb-2">
                        <h4 class="title title-line pb-5">Available job for you</h4>
                        {{--                        <p class="text-muted para-desc mx-auto mb-1">Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>--}}
                    </div>
                </div>
            </div>

            <div class="row">


                <div class="col-lg-12 mt-4 pt-2">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="show-results">
                                <div class="float-left">
                                    <h5 class="text-dark mb-0 pt-2 f-18">Showing results {{$jobs->count()}}-{{$jobs->total()}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @forelse($jobs as $job)
                            <x-job.list-card :job="$job"/>
                        @empty
                            No jobs available
                        @endforelse
                           @if( (bool)$jobs->previousPageUrl() || $jobs->hasMorePages() )
                                <x-job.pagination :jobs="$jobs"/>
                           @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer.start/>
    <x-footer.end/>
</x-guest>
