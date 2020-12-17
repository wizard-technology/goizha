<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>UOG | Login</title>
    <meta content="University Of Goizha" name="description" />
    <meta content="Mhamad Kamaran" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/plugins/animate/animate.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/icons.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/style.css")}}" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset("apple-icon-57x57.png")}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset("apple-icon-60x60.png")}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("apple-icon-72x72.png")}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("apple-icon-76x76.png")}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("apple-icon-114x114.png")}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("apple-icon-120x120.png")}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("apple-icon-144x144.png")}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("apple-icon-152x152.png")}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("apple-icon-180x180.png")}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset("android-icon-192x192.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("favicon-96x96.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("favicon-16x16.")}}">
    <link rel="manifest" href="{{asset("manifest.json")}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset("ms-icon-144x144.png")}}">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div id="stars"></div>
    <div id="stars2"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center mt-0">
                    <a href="#!" class="logo logo-admin"></a>
                </h3>

                <h6 class="text-center">{{ __('Login') }}</h6>

                <div class="p-3">

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <input name="email" class="form-control  @error('email') is-invalid @enderror"
                                    type="email" required="" placeholder="{{ __('E-Mail Address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input name="password" class="form-control  @error('password') is-invalid @enderror"
                                    type="password" required="" placeholder="{{ __('Password') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember"
                                        id="customCheck1" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label"
                                        for="customCheck1">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-danger btn-block waves-effect waves-light"
                                    type="submit">{{ __('Login') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{asset("assets/js/popper.min.js")}}"></script>
    <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("assets/js/modernizr.min.js")}}"></script>
    <script src="{{asset("assets/js/detect.js")}}"></script>
    <script src="{{asset("assets/js/fastclick.js")}}"></script>
    <script src="{{asset("assets/js/jquery.slimscroll.js")}}"></script>
    <script src="{{asset("assets/js/jquery.blockUI.js")}}"></script>
    <script src="{{asset("assets/js/waves.js")}}"></script>
    <script src="{{asset("assets/js/jquery.nicescroll.js")}}"></script>
    <script src="{{asset("assets/js/jquery.scrollTo.min.js")}}"></script>
    <script src="{{asset("assets/js/app.js")}}"></script>
</body>

</html>