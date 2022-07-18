@extends('admin.index')
@section('content')
@php
$rs1=App\Models\Kategoriberita::all();
@endphp
 <div class="container mb-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

          

                <div class="border-1 shadow-lg ">
            
                 
                           
                
                        <div
                        class="text-center mx-auto mb-5 wow fadeInUp mt-4"
                        data-wow-delay="0.1s"
                        style="max-width: 100%"
                        >
                        <h3 class="fw-bold"> Tambah Berita</h3>
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
                                
                                    <div class="container">
                                        <form action="{{route('berita.store')}}" method="POST" enctype="multipart/form-data" class="user" >
                                            
                                            @csrf
                                        
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="judul" class="form-control" placeholder="judul berita">
                                                    </div>
                                                </div>
                                                 
                                                 <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="penulis" class="form-control" placeholder="penulis berita">
                                                    </div>
                                                </div>
                                            
                                               
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong>Tanggal Berakhir Kegiatan</strong>
                                                        <input type="date" name="tgl_akhir" class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                               
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    
                                                        <strong></strong>
                                                        <select class="form-select form-select-lg mb-3 " aria-label=".form-select-lg example" name="kategori_berita_id">
                                                        <option selected class="fw-bold">Kategori berita</option>
                                                        @foreach($rs1 as $a)
                                                        <option value="{{$a->id}}">{{$a->nama}}</option>
                                                        @endforeach
                                                    
                                                        </select>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="file"  name="foto" class="form-control" placeholder="foto">
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form">
                                                      <div class="form-floating">
                                                        <textarea class="form-control" placeholder="konten" id="editor" name="konten"></textarea>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid gap-2 mt-4 mb-3">
                                                        <button type="submit" name="proses" class="btn btn-primary btn-user btn-block">simpan</button>
                                                </div>
                                            </div>
                                    <div class="pull-right">
                                    <a class="text-primary" href="{{route('berita.index')}}">Kemabali ke halaman berita</a>
                                    </div>
                                        </form>

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