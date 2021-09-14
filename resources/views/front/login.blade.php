@extends('front/layout/layout')

@section('page_title',"Login")


@section('container')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">

        <div class="col-12 col-lg-5 ">
            <div class="animate form login_form bg-white shadow-sm rounded-lg border mt-4">
                <p class="bg_gdd text-white size36 text-center b7 m-0 p-3">
                    Login
                </p>
                <form method="post" action={{route('login_req')}} class="text-center p-4">
                    @csrf

                    @if(session('err')!="")
                    <div class="alert alert-info size11">
                        <p class="size11 text-left m-0">Please verify your email by clicking the verification link send to your email at the time of registration</p> 
                    </div>
                    <div class="alert alert-info size11">
                        <p class="size11 text-left m-0"><i class="fa fa-info-circle fa-1x"></i>&nbsp;&nbsp;Register again for new verification code</p> 
                    </div>
                    @endif
                    @if(session('err1')!="")
                    <div class="size11 text-left alert alert-danger">
                        
                        <p class="size11 text-left m-0"><i class="fa fa-info-circle fa-1x"></i>&nbsp;&nbsp;Invalid email or password</p> 
                    </div>
                    @endif

                    @if(session('reg_msg')!="")
                    <div class="size11 alert alert-success">
                        <p class="size13 text-left m-0">We have just sent an email to <b>{{session('reg_msg')}}</b> Please verify your email to login.</p>
                        
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
                        <input type="submit" class="btn btn-info bg_gd submit m-0 pl-4 pr-4" value="Login" name="login">
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection