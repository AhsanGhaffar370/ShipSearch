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
    <link href="{{ asset('admin_asset/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form bg-white p-4 shadow-sm mt-5 rounded-lg">
                <section class="login_content">
                    <form method="post" action="login_req" class="text-center">
                        @csrf
                        <h1>Login Form</h1>
                        @if(session('err')!="")
                        <div class="alert alert-danger">
                            {{session('err')}}
                        </div>
                        @endif
                        <div>
                            <input type="email" class="form-control" name="email" placeholder="Email" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="pass" placeholder="Password" required />
                        </div>
                        <div class="text-center d-flex justify-content-center">
                            <input type="submit" class="btn btn-primary submit m-0" name="submit">
                        </div>

                        <div class="clearfix"></div>


                    </form>
                </section>
            </div>

        </div>
    </div>
</body>

</html>