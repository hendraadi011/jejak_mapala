@extends('admin.index')
@section('content')
 <div class="container mb-5">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-9 col-md-12">

                <div class="card o-hidden border-1 shadow-lg ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="container-xxl">
                                    <div
                                    class="text-center mx-auto mb-5 wow fadeInUp"
                                    data-wow-delay="0.1s"
                                    style="max-width: 600px"
                                    >
                                    <h3 class="fw-bold mt-5">EDIT ANGGOTA</h3>
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
                                    @foreach($data as $ag)
                                    <div class="container">
                                        <form action="{{route('anggota.update',$ag->id)}}" method="POST" enctype="multipart/form-data" class="user">
                                            
                                            @csrf
                                            @method('PUT');
                                        
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="nama" class="form-control form-control-user" placeholder="nama" value="{{$ag->nama}}" >
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="email" class="form-control form-control-user" placeholder="Email" value="{{$ag->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="kampus" value="{{$ag->kampus}}" class="form-control form-control-user" placeholder="Kampus">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="prodi" value="{{$ag->prodi}}" class="form-control form-control-user" placeholder="Prodi">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="hp" class="form-control form-control-user" placeholder="No Hp" value="{{$ag->hp}}">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group form-control-user">
                                                        <strong></strong>
                                                        <input type="file" name="foto" class="form-control" placeholder="foto">
                                                    </div>
                                                </div>
                                            
                                                <div class="d-grid gap-2 mt-4 mb-5">
                                                        <button type="submit" name="proses" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        
                                        </form>
                                    @endforeach
                                      <div class="pull-right">
                                    <a class="text-primary" href="{{route('anggota.index')}}">Kemabali ke halaman anggota</a>
                                    </div>
                                    </div>
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