<html>

<head>
    <style>
        .sec_bg {
            padding: 50px;
            background-color: white;
            width: 500px;
            margin: auto;
            border: 1px solid #e2e2e2;
            text-align: center;
        }

        .btn1 {
            padding: 15px;
            background-color: #0e7eff;
            color: #FFFFFF !important;
            border: none;
            text-decoration: none;
        }

        .btn1:hover {
            background-color: #0567d8;
        }

        .h1 {
            font-size: 24px;
            font-weight: 700;
        }

        .p1 {
            font-size: 17px;
            font-weight: 400;
            margin: 10px 10px 40px 10px;
        }

        .p2 {
            margin-top: 40px;
        }

        .img1 {
            margin: 30px;
        }

        .section {
            margin-top: 70px;
            margin-bottom: 70px;
            padding: 20px;
            text-align: center;
        }

    </style>
</head>

<body>
    <section class="section ">
        <div><a href="{{route('home')}}">
                <img src="http://businesscardsprinting.co.uk/includes/frontend_source/ss_v2/images/logo.png" class="img1" height="50px" width="220px"  alt="logo">
            </a></div>
        <div class="sec_bg">
            <p class="h1">Let's confirm your email address. </p>
            <p class="p1">By clicking on the following link, you are confirming your email address.</p>
            <a href="{{ route('email_verification.code', ['code' => $code]) }}" class="btn1">Confirm Email Address</a>
            <p class="p2">Powered by<a href="{{route('home')}}">Bloggers.com</a></p>
            
            {{-- <img src="{{$message->embed($pathToFile)}}" class="img1" height="50px" width="220px"  alt="logo"> --}}
        </div>
    </section>
</body>

</html>