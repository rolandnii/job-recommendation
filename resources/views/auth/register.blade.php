<x-guest>
    <x-slot name="pageTitle">Register</x-slot>

    <section class="vh-100" style="background: center center;">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="login_page bg-white shadow rounded p-4">
                                <div class="text-center">
                                    <h4 class="mb-4">Signup</h4>
                                </div>
                                <form class="login-form" method="post" action="{{route('register')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>First name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{old('first_name')}}" required>
                                                @error('first_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group position-relative">
                                                <label>Last name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Last Name" name="last_name"  value="{{old('last_name')}}" required>
                                                @error('last_name')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Your Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email" name="email"  value="{{old('email')}}" required>
                                                @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" placeholder="Password"  value="{{old('password')}}" required=>
                                                @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                                @error('password_confirmation')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <button class="btn btn-primary w-100">Register</button>
                                        </div>
                                        <div class="mx-auto">
                                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Already have an account ?</small> <a href="{{url('login')}}" class="text-dark font-weight-bold">Sign in</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <!--end col-->
                    </div><!--end row-->
                </div> <!--end container-->
            </div>
        </div>
    </section>
    <x-back-home />
</x-guest>
