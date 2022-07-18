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
                                    <h3 class="fw-bold"> Tambah Struktur</h3>
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
                                        <form action="{{route('jabatan.store')}}" method="POST" enctype="multipart/form-data" class="user" >
                                            
                                            @csrf
                                        
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="nama" class="form-control form-control-user" placeholder="nama">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="keterangan"  class="form-control form-control-user"  placeholder="Keterangan">
                                                    </div>
                                                </div>
                                              
                                            
                                                <div class="d-grid gap-2 mt-4 mb-3">
                                                        <button type="submit" name="proses" class="btn btn-primary btn-user btn-block">simpan</button>
                                                </div>
                                            </div>
                                    <div class="pull-right">
                                    <a class="text-primary" href="{{route('jabatan.index')}}">Kemabali ke halaman</a>
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