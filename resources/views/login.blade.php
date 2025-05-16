<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Kasko</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('/')}}assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/')}}assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="auth-body-bg">
<div class="bg-overlay"></div>
<div class="wrapper-page">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">

                <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

                <div class="p-3">
                    <form id="loginForm" class="form-horizontal mt-3" action="{{route('login_submit')}}" method="post">
                        @csrf
                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="email" placeholder="Email" name="email">
                                @if($errors->first('email')) <small class="form-text text-danger">{{$errors->first('email')}}</small> @endif
                            </div>
                        </div>

                        <div class="form-group mb-3 row">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                @if($errors->first('password')) <small class="form-text text-danger">{{$errors->first('password')}}</small> @endif
                            </div>
                        </div>

                        <div class="form-group mb-3 text-center row mt-3 pt-1">
                            <div class="col-12">
                                <div class="g-recaptcha" data-sitekey="6LdhrpYqAAAAAPlC9H15nBtyyAmpqfxc7aqMvjMg"></div>
                            </div>
                            @if($errors->first('captcha'))
                                <small class="form-text text-danger">{{$errors->first('captcha')}}</small>
                            @endif
                            <small class="form-text text-danger" id="errorMessage" style="display: none">Please complete the reCAPTCHA challenge to submit the form</small>
                        </div>

                        <div class="form-group mb-3 text-center row mt-3 pt-1">
                            <div class="col-12">
                                <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- end -->
            </div>
            <!-- end cardbody -->
        </div>
        <!-- end card -->
    </div>
    <!-- end container -->
</div>
<!-- end -->
<script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        if (!grecaptcha.getResponse()) {
            event.preventDefault();
            document.getElementById('errorMessage').style.display = 'block';
            // alert('Please complete the reCAPTCHA challenge to submit the form.');
        }
    });
</script>
<!-- JAVASCRIPT -->
<script src="{{asset('/')}}assets/libs/jquery/jquery.min.js"></script>
<script src="{{asset('/')}}assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('/')}}assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('/')}}assets/libs/node-waves/waves.min.js"></script>

<script src="{{asset('/')}}assets/js/app.js"></script>

</body>
</html>
