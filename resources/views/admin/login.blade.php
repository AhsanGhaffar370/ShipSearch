<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{@config('constants.site_name')}}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/bd39c99e2f.js"></script>

    <!-- Custom Theme Style -->
    <link href="{{ asset('public/admin_asset/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/admin_asset/css/my_style.css') }}" rel="stylesheet">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/7516c4b4cc.js" crossorigin="anonymous"></script>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form bg-white shadow-sm rounded-lg">
                <p class="bg_bd size36 text-center b3 m-0 p-3"><a href={{route('home')}} class="text-white"><span
                            class="b7">Ship</span>Search</a></p>
                <form method="post" action="{{route('admin.login_req')}}" class="text-center p-4">
                    @csrf
                    <p class="size17 mb-2">Provide Administrator Credentials</p>
                    <p class="size13 ">Sign in to start your session</p>


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
                        <input type="submit" class="btn btn-info bg_bd rounded-0 submit m-0" value="Sign In" name="submit">
                    </div>

                    <div class="clearfix"></div>


                </form>
            </div>

        </div>
    </div>
</body>

</html>