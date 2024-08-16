<x-guest>
    <x-slot name="pageTitle">
        Home
    </x-slot>

    <x-navbar />
    <x-hero-section />
    <x-home::find-job  :recent-jobs="$recentJobs"  :recommended-jobs="$recommendedJobs"/>
{{--    <x-home::how-it-works />--}}
{{--    <x-home::popular-category />--}}

    <x-footer.start />
    <hr>
    <x-footer.end />
</x-guest>
