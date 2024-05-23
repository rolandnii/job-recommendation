<div class="col-lg-12 mt-4 pt-2">
    <nav aria-label="Page navigation example">
        <ul class="pagination job-pagination mb-0 justify-content-center">
            <li class="page-item {{$jobs->previousPageUrl() ? '' : 'disabled'}}">
                <a class="page-link" href="{{$jobs->previousPageUrl()}}" tabindex="-1" aria-disabled="true">
                    <i class="mdi mdi-chevron-double-left"></i>
                </a>
            </li>
{{--            <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--            <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--           @if($jobs->hasMorePages())--}}
                <li class="page-item {{$jobs->nextPageUrl()  ? '' : 'disabled'}}">
                    <a class="page-link" href="{{$jobs->nextPageUrl()}}">
                        <i class="mdi mdi-chevron-double-right"></i>
                    </a>
                </li>
{{--           @endif--}}
        </ul>
    </nav>
</div>
