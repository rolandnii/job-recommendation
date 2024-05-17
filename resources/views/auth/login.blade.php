<x-guest>
    <x-slot name="pageTitle">Login</x-slot>
    <!-- Hero Start -->
    <section class="vh-100" style="background: url('https://via.placeholder.com/2000X1333//88929f/5a6270C/O https://placeholder.com/') center center;">

        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="login-page bg-white shadow rounded p-4">
                                <div class="text-center">
                                    <h4 class="mb-4">Login</h4>
                                </div>
                                <form class="login-form" method="POST" action="{{route('login')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Your Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required>
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" placeholder="Password" name="password"  required autocomplete="current-password" />
                                                @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <p class="float-right forgot-pass"><a href="{{url('forgot-password')}}" class="text-dark font-weight-bold">Forgot password ?</a></p>
                                            <div class="form-group">
                                                <div class="custom-control m-0 custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
{{--                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-0">
                                            <button class="btn btn-primary w-100">Sign in</button>
                                        </div>

                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Don't have an account ?</small> <a href="{{route('register')}}" class="text-dark font-weight-bold">Sign Up</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div><!---->
                        </div> <!--end col-->
                    </div><!--end row-->
                </div> <!--end container-->
            </div>
        </div>
    </section><!--end section-->
    <!-- Hero End -->
    <x-back-home />
</x-guest>
