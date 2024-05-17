<div class="tagline">
    <div class="container">
        <div class="float-left">
            <div class="phone">
                <i class="mdi mdi-phone-classic"></i> +233 50 559 4567
            </div>
            <div class="email">
                <a href="#">
                    <i class="mdi mdi-email"></i> atuspport@mail.com
                </a>
            </div>
        </div>
        <div class="float-right">
            <ul class="topbar-list list-unstyled d-flex" style="margin: 11px 0px;">
                <li class="list-inline-item"><a href="javascript:void(0);"><i class="mdi mdi-account mr-2"></i>
                   @auth()
                       {{auth()->user()->full_name}}
                   @endauth
                    </a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
