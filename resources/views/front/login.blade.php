@extends('front/layout/layout')

@section('page_title',"Cargo")


@section('container')

<div class="container mt-5 mb-5">
    <div class="row ">
        <div class="col-12 col-lg-6">
            <div class="animate form login_form bg-white shadow-sm rounded-lg border mt-4">
                <p class="bg_bd text-white size36 text-center b7 m-0 p-3">
                    Login
                </p>
                <form method="post" action="login_req" class="text-center p-4">
                    @csrf

                    @if(session('err')!="")
                    <div class="alert alert-danger">
                        {{session('err')}}
                    </div>
                    @endif
                    <div class="col-auto p-0">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend rounded-0">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="col-auto p-0">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                    <div class="text-center d-flex justify-content-center mt-4">
                        <input type="submit" class="btn btn-info bg_bd rounded-0 submit m-0" value="Sign In"
                            name="submit">
                    </div>

                    <div class="clearfix"></div>


                </form>
            </div>

        </div>

        <div class="col-12 col-lg-6">
            <div class="animate form login_form bg-white shadow-sm rounded-lg border mt-4">
                <p class="bg_bd text-white size36 text-center b7 m-0 p-3">
                    Sign Up
                </p>
                <form method="post" action="login_req" class="text-center p-4">
                    @csrf

                    @if(session('err')!="")
                    <div class="alert alert-danger">
                        {{session('err')}}
                    </div>
                    @endif
                    <div class="col-auto p-0">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend rounded-0">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input type="email" class="form-control" name="email" placeholder="Email" required />
                        </div>
                    </div>
                    <div class="col-auto p-0">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input type="password" class="form-control" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                    <div class="text-center d-flex justify-content-center mt-4">
                        <input type="submit" class="btn btn-info bg_bd rounded-0 submit m-0" value="Sign In"
                            name="submit">
                    </div>

                    <div class="clearfix"></div>


                </form>
            </div>

        </div>
    </div>
</div>
@endsection