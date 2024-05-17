<x-guest>
    <x-slot name="pageTitle">Jobs</x-slot>
{{--    <x-preloader />--}}
    <x-navbar />
    <x-job.hero-section />
    <x-job.filter-box />
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
                <div class="col-lg-3">
                    <div class="left-sidebar">
                        <div class="accordion" id="accordionExample">
                            <x-job.categories-filter />
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 mt-4 pt-2">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="show-results">
                                <div class="float-left">
                                    <h5 class="text-dark mb-0 pt-2 f-18">Showing results 0-20</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <x-job.list-card />
                            <x-job.pagination />
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <x-footer.start />
    <x-footer.end />
</x-guest>
