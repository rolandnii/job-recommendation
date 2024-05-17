<x-guest>
    <x-slot name="pageTitle">Jobs</x-slot>
    {{--    <x-preloader />--}}
    <x-navbar />
    <x-job.hero-section />
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-dark mb-3">Web Developer</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="job-detail border rounded p-4">

                        <x-job.details-content />

                        <x-job.details-desc class="mt-4">
                            <p class="text-muted mb-3">Neque porro quisquam est qui dolorem ipsum dolor sit amet consectetur adipisci velit a quia non eius modi tempora incidunt ut labore dolore magnam aliquam quaerat voluptatem Nemo enim ipsam voluptatem quia voluptas sit aspernatur odit aut fugit sed quia consequuntur magni dolores eose.</p>

                        </x-job.details-desc>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h5 class="text-dark mt-4">Job Description :</h5>
                        </div>
                    </div>

                   <x-job.details-container>
                       <x-job.details-desc>
                           <p class="text-muted mb-3">Neque porro quisquam est qui dolorem ipsum dolor sit amet consectetur adipisci velit a quia non eius modi tempora incidunt ut labore dolore magnam aliquam quaerat voluptatem Nemo enim ipsam voluptatem quia voluptas sit aspernatur odit aut fugit sed quia consequuntur magni dolores eose.</p>

                       </x-job.details-desc>
                   </x-job.details-container>


                </div>
                <x-job.details-company-info />
            </div>
        </div>
    </section>
    <x-footer.start />
    <x-footer.end />
</x-guest>
