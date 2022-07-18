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
                                    <h3 class="fw-bold"> Edit Progam Donasi</h3>
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
                                
                                
                                <form method="POST" action="{{ route('progamdonasi.update', $progamdonasi->id) }}" enctype="multipart/form-data">
                            
                                @csrf
                                @method('PUT')
                                    <div class="card-body">
                                 <div class="row">
                                      <div class="col-md-6">
                                        <label for="nama" class="col-form-label text-md-end">{{ __('nama') }}</label>
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="nama" value="{{$progamdonasi->nama}}" required autocomplete="nama" autofocus>

                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                         <div class="col-md-6">
                                            <label for="tanggal akhir donasi" class="col-form-label text-md-end">{{ __('tanggal akhir donasi') }}</label>
                                            <input id="tanggal akhir donasi" type="date" class="form-control @error('tanggal akhir donasi') is-invalid @enderror" name="tgl_berakhir" value="{{$progamdonasi->tgl_akhir}}" required autocomplete="tanggal akhir donasi" autofocus>

                                            @error('tanggal akhir donasi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                         </div>
                                
                                    
                                 </div>
                                
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Bank" class="col-form-label text-md-end">{{ __('Bank') }}</label>
                                        <select class="form-select form-select-sm mb-3 " aria-label=".form-select-lg example" id="bank" name="bank">
                                        <option selected class="fw-bold"> Bank</option>
                        
                                            <option value="bri">BRI</option>
                                            <option value="bni">BNI</option>
                                             <option value="bca">BCA</option>
                                              <option value="mandiri">MANDIRI</option>
                            
                                        </select>
                                         @error('bank')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                    <div class="col-md-6">
                                            <label for="nomer rekening" class="col-form-label text-md-end">{{ __('Nomer Rekening') }}</label>

                                        <input id="nomer rekening" type="text" class="form-control @error('nomer rekening') is-invalid @enderror" name="no_rekening" value="{{ $progamdonasi->no_va}}" required autocomplete="nomer rekening">

                                        @error('nomer rekening')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                               </div>
                               
                                
                               
                                  
                                <div class="row">
                                
                                     
                                    <div class="col-md-6">
                                        <label for="foto" class="col-form-label text-md-end">{{ __('foto') }}</label>
                                        
                                            <input type="file" id="foto" class="form-control @error('foto') is-invalid @enderror"  name="foto" />
                                            @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                </div>
                                <div class="row">
                                
                                    <div class="col-md-12 mt-5">
                                       
                                                   <div class="form">
                                                      <div class="form-floating">
                                                        <textarea class="form-control"  id="editor" name="deskripsi" lass="form-control @error('deskripsi') is-invalid @enderror">{{$progamdonasi->deskripsi}}</textarea>
                                                        
                                                        </div>
                                                    </div>
                                        
                                           
                                            @error('deskripsi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        
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
@section('ck-editor')
 <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
 
          <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
@endsection