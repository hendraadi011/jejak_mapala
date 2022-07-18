<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet')}}" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
     <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center mx-auto" style="margin-top: 5%;">
        <div class="col-md-6">
            <div class="card">
                <div class="mx-auto">
                    <img src="{{asset('img/logo/logo1-01.png')}}" alt="" style="max-width: 300px">
                </div>

              
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                      <div class="card-body">
                        <div class="row mb-3">
                            

                            <div class="col">
                                <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                           
                            <div class="col">
                                 <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-0">
                          
                            <div class="col">
                                  <div class="mx-auto">
                                <button type="submit" class="btn btn-primary" style="width: 100%">
                                    Login
                                </button>
                               
                                @if (Route::has('password.request'))
                                
                                    <a class="btn btn-link" style="margin-left: 30%" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                 </div>
                          
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                
                                    @if (Route::has('register'))
                                    
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                                    @endif
                            </div>
                        </div>
                        </div>
                        
                    </form>
                
            </div>
        
           
            </div>
        </div>
    </div>
</div>
 <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
</body>
</html>