<x-guest>
    <x-slot name="pageTitle">My Application</x-slot>
    {{--    <x-preloader />--}}
    <x-navbar/>
    <x-job.hero-section/>
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-dark">Profile :</h5>
                </div>
                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form action="{{url("my-profile")}}" method="post" enctype="multipart/form-data">
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
                                        <label class="text-muted">First Name<span class="text-danger">*</span> :</label>
                                        <input id="first-name" type="text" name="first_name"
                                               value="{{old("first_name") ?? auth()->user()->first_name}}"
                                               class="form-control resume"
                                               placeholder="First Name :">
                                        <p></p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Last Name<span class="text-danger">*</span> :</label>
                                        <input id="last-name" type="text" class="form-control resume" name="last_name"
                                               value="{{old("last_name") ?? auth()->user()->last_name}}"
                                               placeholder="Last Name :">
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Email<span class="text-danger">*</span> :</label>
                                        <input id="surname-name" type="text" class="form-control resume" name="email"
                                               value="{{old("email") ?? auth()->user()->email}}"
                                               placeholder="Email :">
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-12">

                                    <div class="form-group app-label">
                                        <label class="text-muted">CV<span class="text-danger">*</span> :</label>
                                        <input id="surname-name" type="file" name="cv"
                                               class="form-control resume"
                                               placeholder="Add cv :">
                                       @if(auth()->user()->cv)
                                            <a href="{{asset("storage/".auth()->user()->cv)}}">
                                                view cv
                                            </a>
                                       @endif
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary" type="submit" id="">
                                        Save
                                    </button>

                                    <a href="{{url("change-password")}}">
                                        Change password
                                    </a>
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
