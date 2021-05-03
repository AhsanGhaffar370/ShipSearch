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
    <link href="{{ asset('front_asset/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front_asset/css/my_style.css') }}" rel="stylesheet">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/7516c4b4cc.js" crossorigin="anonymous"></script>
</head>

<body class="login">
    @if($status=="email verified")
    <section class="container centre_sec21 pl-5 pr-5">

        <div class="col-12 col-lg-5 col-md-5 col-sm-6 p-0 rounded-0 border border bg-white text-center ">
            <div class=" bg-success pt-2 pb-2">
                <a href="{{route('home')}}"><i class="fa fa-check-circle fa-5x text-white "></i></a>
            </div>

            <div class="pt-2 pl-4 pr-4 pb-2">
                <p class="size24 text-dark">Your email address has been verified</p>
                <input type="button" name="submitbtn" class="btn btn-primary rounded-0 b6 pr-4 pl-4 pt-2 pb-2" onclick="window.location.href='{{route('login')}}'" value="Continue to Login">
            </div>
            <p class="size11 text-center pb-2" style="color: black;">Powered by <a href="{{route('home')}}" class="b6 size13 text-primary">ShipSearch.com</a></p>
        </div>
    </section>
    
    @elseif($status=="already verified")

    <section class="container centre_sec21 pl-5 pr-5">
        <div class="col-12 col-lg-5 col-md-5 col-sm-6 p-0 rounded-0 border border bg-white text-center ">
            <div class=" bg-info pt-2 pb-2">
                <a href="{{route('home')}}"><i class="fa fa-info-circle fa-5x text-white "></i></a>
            </div>

            <div class="pt-2 pl-4 pr-4 pb-2">
                <p class="size24 text-dark">Email already verified </p>
                
                <input type="button" name="submitbtn" class="btn btn-primary rounded-0 b6 pr-4 pl-4 pt-2 pb-2" onclick="window.location.href='{{route('login')}}'" value="Continue to Login">
            </div>
            <p class="size11 text-center pb-2" style="color: black;">Powered by <a href="{{route('home')}}" class="b6 size13 text-primary">ShipSearch.com</a></p>
        </div>
    </section>

    @elseif($status=="invalid code")

    <section class="container centre_sec21 pl-5 pr-5">
        <div class="col-12 col-lg-5 col-md-5 col-sm-6 p-0 rounded-0 border border bg-white text-center ">
            <div class=" bg-danger pt-2 pb-2">
                <a href="{{route('home')}}"><i class="fas fa-times-circle fa-5x text-white "></i></a>
            </div>

            <div class="pt-2 pl-4 pr-4 pb-2">
                <p class="size24 text-dark">Invalid Activation Code </p>
                <p class="size18 text-dark">Sign up to get the activation code </p>
                <input type="button" name="submitbtn" class="btn btn-primary rounded-0 b6 pr-4 pl-4 pt-2 pb-2" onclick="window.location.href='{{route('login')}}'" value="Sign up">
                
            </div>
            <p class="size11 text-center pb-2" style="color: black;">Powered by <a href="{{route('home')}}" class="b6 size13 text-primary">ShipSearch.com</a></p>
        </div>
    </section>
    @endif

</body>

</html>