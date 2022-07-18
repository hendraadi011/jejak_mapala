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
    <div class="row justify-content-center mx-auto" style="margin: 100px">
        <div class="col-md-6">
            <div class="card">
                <div class="mx-auto">
                    <img src="{{asset('img/logo/logo1-01.png')}}" alt="" style="max-width: 300px">
                </div>

                      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                         <div class="card-body">
                        <div class="row mb-3">
                            

                            <div class="col">
                                <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label for="username" class="col-form-label text-md-end">{{ __('username') }}</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" alue="{{ old('username') }}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                        </div> --}}
                        <div class="row mb-3">
                           
                            <div class="col">
                                 <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                           
                            <div class="col">
                                 <label for="kampus" class="col-form-label text-md-end">{{ __('kampus') }}</label>

                                <input id="kampus" type="text" class="form-control @error('email') is-invalid @enderror" name="kampus" value="{{ old('kampus') }}" required autocomplete="email">

                                @error('kampus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                           
                            <div class="col">
                                 <label for="prodi" class="col-form-label text-md-end">{{ __('prodi') }}</label>

                                <input id="prodi" type="text" class="form-control @error('email') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}" required autocomplete="prodi">

                                @error('prodi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                           
                            <div class="col">
                                 <label for="no_hp" class="col-form-label text-md-end">{{ __('no_hp') }}</label>

                                <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">

                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                           
                            <div class="col">
                                 <label for="foto" class="col-form-label text-md-end">{{ __('foto') }}</label>

                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required autocomplete="foto">

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
               

                        <div class="row mb-3">
                            

                            <div class="col">
                                <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col" style="width: 100%">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
 