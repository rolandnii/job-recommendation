<x-guest>
    <x-slot name="pageTitle">Jobs</x-slot>
    {{--    <x-preloader />--}}
    <x-navbar />
    <x-job.hero-section />
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-dark mb-3">{{$job->name}}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="job-detail border rounded p-4">

                        <x-job.details-content  :job="$job"/>

{{--                        <x-job.details-desc class="mt-4">--}}
{{--                            <p class="text-muted mb-3">Neque porro quisquam est qui dolorem ipsum dolor sit amet consectetur adipisci velit a quia non eius modi tempora incidunt ut labore dolore magnam aliquam quaerat voluptatem Nemo enim ipsam voluptatem quia voluptas sit aspernatur odit aut fugit sed quia consequuntur magni dolores eose.</p>--}}

{{--                        </x-job.details-desc>--}}
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-dark mt-4">Job Description :</h5>
                        </div>
                    </div>

                   <x-job.details-container>
                       <x-job.details-desc>
                           <p class="text-muted mb-3">
                            {!! $job->description !!}
                           </p>

                       </x-job.details-desc>
                   </x-job.details-container>

                    @if(!empty($job->qualification))
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="text-dark mt-4"> Qualifications :</h5>
                            </div>
                        </div>

                        <x-job.details-container>
                            <x-job.details-desc>
                                @foreach($job->qualification as $qualification)
                                    <x-job::details-item>
                                        {{$qualification}}
                                    </x-job::details-item>
                                @endforeach
                            </x-job.details-desc>
                        </x-job.details-container>
                    @endif

                    @if(!empty($job->skill))
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="text-dark mt-4">Skills :</h5>
                            </div>
                        </div>

                        <x-job.details-container>
                            <x-job.details-desc>
                                @foreach($job->skill as  $skill)
                                    <x-job::details-item>
                                        {{$skill}}
                                    </x-job::details-item>
                                @endforeach
                            </x-job.details-desc>
                        </x-job.details-container>
                    @endif


                </div>
                <x-job.details-company-info :job="$job" :has-applied="$hasApplied" />
            </div>
        </div>
    </section>
    <x-footer.start />
    <x-footer.end />
</x-guest>
