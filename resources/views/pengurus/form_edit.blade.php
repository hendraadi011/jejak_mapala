@extends('admin.index')
@section('content')
@php
$rs1=App\Models\Anggota::all();
$rs2=App\Models\Jabatan::all();
@endphp
<div class="container mb-5">
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
                                    <h3 class="fw-bold"> Edit Pengurus</h3>
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
                                    @foreach($data as $d)
                                    <div class="container">
                                        <form action="{{route('pengurus.update',$d->id)}}" method="POST" enctype="multipart/form-data">
                                            
                                            @csrf
                                            @method('PUT');
                                        
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    
                                                        <strong></strong>
                                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="anggota_id">
                                                        <option selected>Pilih Anggota</option>
                                                        @foreach($rs1 as $a)
                                                        <option value="{{$a->id}}">{{$a->nama}}</option>
                                                        @endforeach
                                                    
                                                        </select>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    
                                                        <strong></strong>
                                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="jabatan_id">
                                                        <option selected>Jabatan</option>
                                                        @foreach($rs2 as $a)
                                                        <option value="{{$a->id}}">{{$a->nama}}</option>
                                                        @endforeach
                                                    
                                                        </select>

                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
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
                                    <a class="text-primary" href="{{route('pengurus.index')}}">Kemabali halaman pengurus</a>
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