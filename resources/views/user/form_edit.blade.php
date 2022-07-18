@extends('admin.index')
@section('content')
 <div class="container mb-5">

        <!-- Outer Row -->
        <div class="row">

            <div class="col-xl-12 col-lg-9 col-md-12">

                <div class="card shadow-lg ">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-lg-12">
                            
                                    <div
                                    class="text-center mx-auto mb-5 wow fadeInUp"
                                    data-wow-delay="0.1s"
                                   
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
                                
                                
                                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                            
                                @csrf
                                @method('PUT')
                                    <div class="card-body">
                                 <div class="row">
                                    {{-- <div class="col-md-6">
                                        <label for="username" class="col-form-label text-md-end">{{ __('username') }}</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->name}}" required autocomplete="username" autofocus>

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                 --}}
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="name" class="col-form-label text-md-end">{{ __('Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                             
                                    
                                    <div class="col-md-6">
                                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                               </div>
                               
                                
                                <div class="row mt-4"> 
                                    <div class="col-md-6">
                                            <label for="kampus" class="col-form-label text-md-end">{{ __('kampus') }}</label>

                                        <input id="kampus" type="text" class="form-control @error('email') is-invalid @enderror" name="kampus" value="{{$user->kampus}}" required autocomplete="email">

                                        @error('kampus')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                           
                             
                                    
                                    <div class="col-md-6">
                                            <label for="prodi" class="col-form-label text-md-end">{{ __('prodi') }}</label>

                                        <input id="prodi" type="text" class="form-control @error('email') is-invalid @enderror" name="prodi" value="{{$user->prodi }}" required autocomplete="prodi">

                                        @error('prodi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> 
                                  
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="no_hp" class="col-form-label text-md-end text-bold">{{ __('Nomer Hp') }}</label>

                                        <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{$user->no_hp}}" required autocomplete="no_hp">

                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                     
                                    <div class="col-md-6">
                                        <label for="no_hp" class="col-form-label text-md-end">{{ __('foto') }}</label>
                                        
                                            <input type="file" id="foto" class="form-control @error('foto') is-invalid @enderror"  name="foto" />
                                            @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                </div>
                                <div class="row  mb-3 mt-5">
                                      <div class="col-md-6">
                                                    
                                        <strong></strong>
                                        <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" name="role">
                                        <option selected class="fw-bold"> Level</option>
                    
                                        <option value="admin">Admin</option>
                                        <option value="anggota">Anggota</option>
                                        <option value="pengurus">Pengurus</option>
                                       
                                       
                                    
                                        </select>
                                      </div>
                                         <div class="col-md-6">
                                                    
                                        <strong></strong>
                                        <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" name="isactive">
                                        <option selected class="fw-bold">Isactive</option>
                    
                                        <option value="yes">yes</option>
                                        <option value="no">no</option>
                                        
                                       
                                       
                                    
                                        </select>
                                         </div>

                                    
                                </div>
                                {{-- <div class="row mb-3">
                                    

                                    <div class="col-md-6">
                                        <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                                    <div class="col-md-6">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> --}}
                    
                                <div class="row mb-5 mt-3">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Simpan') }}
                                        </button>
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