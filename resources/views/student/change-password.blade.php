<x-guest>
    <x-slot name="pageTitle">My Application</x-slot>
    {{--    <x-preloader />--}}
    <x-navbar/>
    <x-job.hero-section/>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-dark">Change Password :</h5>
                </div>
                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form action="{{url("change-password")}}" method="post" >
                            @method('Post')
                            @csrf
                            <div class="row mt-4">
                                @if(session("success"))
                                    <div class="col-12">
                                        <div class="alert alert-success" role="alert">
                                            {{session("success")}}
                                        </div>
                                    </div>
                                @endif

                                @unless(empty($errors->all()))
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->all() as $error)
                                                <p>{{$error}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                @endunless

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">New Password<span class="text-danger">*</span> :</label>
                                        <input id="first-name" type="text" name="password"
                                               value="{{old("password")}}"
                                               class="form-control resume"
                                               placeholder="New Password :">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Confirm Password<span class="text-danger">*</span> :</label>
                                        <input id="last-name" type="text" class="form-control resume" name="password_confirmation"
                                               value=""
                                               placeholder="Confirm Password :">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">

                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit" id="">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <x-footer.start/>
    <x-footer.end/>
</x-guest>
