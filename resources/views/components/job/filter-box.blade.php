<div class="container">
    <div class="home-form-position">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="home-registration-form job-list-reg-form bg-light shadow p-4 mb-3">
                    <form class="registration-form" method="get" action="{{url('jobs')}}">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="registration-form-box">
                                    <i class="fa fa-briefcase"></i>
                                    <input type="text" id="exampleInputName1"
                                           class="form-control rounded registration-input-box" name="search"
                                           placeholder="Job keybords...">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="registration-form-box">
                                    <i class="fa fa-list-alt"></i>
                                    <select id="select-category" class="demo-default" name="category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"> {{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="registration-form-box">
                                    <input type="submit" id="submit" name="send"
                                           class="submitBnt btn btn-primary btn-block" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
