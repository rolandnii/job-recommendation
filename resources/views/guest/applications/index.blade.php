<x-guest>
    <x-slot name="pageTitle">My Application</x-slot>
    {{--    <x-preloader />--}}
    <x-navbar />
    <x-job.hero-section />
    <section class="section">
        <div class="container">
            <div class="row row-cols-2">

              @forelse($applications as $application)

                    <div class="col-md-6 p-2">
                        <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title">{{$application->job->name}}</h5>
                                <p class="card-text"> Job posted  by {{$application->job->user->is_admin ? 'Admin' : $application->job->user->company->name  }}</p>
                                <div class="d-flex justify-content-between">
                                    <span class="badge badge-warning text-start"> {{$application->status}}</span>
                                    <span class="text-muted w-full text-end"> {{$application->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                  No applications yet
              @endforelse

            </div>


        </div>
    </section>
    <x-footer.start />
    <x-footer.end />
</x-guest>
