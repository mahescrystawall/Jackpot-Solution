<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  CSS -->
    <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Jackpot</title>
</head>

<body>
    
    <div class="login">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="loginInner1">
                            <div class="log-logo m-b-20 text-center">
                                <h3>Jackpot</h3>
                                <!-- <img class="logo-login" src="assets/img/99hub/logo.png"> -->
                            </div>
                            <div class="featured-box-login featured-box-secundary default">
                                <h4 class="text-center">LOGIN <i class="fas fa-hand-point-down"></i></h4>
                                <form autocomplete="off" class="ng-dirty ng-touched ng-valid" method="POST"
                                    action="{{ route('postlogin') }}">
                                    @csrf
                                    <div class="form-group m-b-20">
                                        <input name="username" formcontrolname="username" type="text"
                                            aria-required="true" aria-invalid="false"
                                            class="form-control ng-dirty ng-valid ng-touched" placeholder="User Name"
                                            fdprocessedid="mgkcio">
                                        <i class="fa fa-user"></i>
                                        <!---->
                                    </div>
                                    <div class="form-group m-b-20">
                                        <input name="password" formcontrolname="password" placeholder="Password"
                                            type="password" aria-required="true" aria-invalid="false"
                                            class="form-control ng-dirty ng-valid ng-touched" fdprocessedid="lexla6">
                                        <i class="fa fa-key"></i><!---->
                                    </div>

                                    <div class="form-group text-center mb-1"><button type="submit"
                                            class="btn btn-submit btn-login"> Login <i
                                                class="ml-2 fa fa-sign-in-alt"></i><!----><!----></button></div>
                                    <div class="form-group text-center mb-0"><button type="button"
                                            class="btn btn-submit btn-login" > Login with Demo ID
                                            <i class="ml-2 fa fa-sign-in-alt"></i><!----><!----></button></div>
                                    <!----><!----><!----><small class="recaptchaTerms">This site is protected by
                                        reCAPTCHA and the Google <a href="javascript:void(0)">Privacy Policy</a> and <a
                                            href="javascript:void(0)">Terms of Service</a>
                                        apply. </small>
                                    <p class="mt-1 align-center" style="line-height: 2;"><a class="mail-link"
                                            href="mailto:99hub.live@gmail.com">99hub.live@gmail.com</a></p>
                                    <!----><!---->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>