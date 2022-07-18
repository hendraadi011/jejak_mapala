@extends('admin.index')
@section('content')
 <div class="container mb-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-9 col-md-12">

                <div class="card o-hidden border-1 shadow-lg ">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-lg-12">
                            
                                    <div
                                    class="text-center mx-auto mb-5 wow fadeInUp"
                                    data-wow-delay="0.1s"
                                    style="max-width: 600px"
                                    >
                                    <h3 class="fw-bold"> Tambah Anggota Baru</h3>
                                    <div class="container mx-auto">
                                        @if($errors->any())
                                        <div class="alert alert-denger mt-3">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                
                                     <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
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
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="foto" />
                                        </div>
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
                </div>
            </div>
        </div>
 </div>
@endsection