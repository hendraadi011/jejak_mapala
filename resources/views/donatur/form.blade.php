@extends('landingpage.index')
@section('content')
@php
 $id = $_REQUEST['id'];
@endphp

<div class="container-fluid">
<div class="container py-5">
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
                                
                         <form method="POST" action="{{ route('donatur.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                             <input type="hidden" name="id" value="{{$br->id}}" />
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="nama_donatur" class="form-control form-control-user" placeholder="nama">
                                                    </div>
                                                </div>
                                            
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="email"  class="form-control form-control-user"  placeholder="Email">
                                                    </div>
                                                </div>
                                               
                                                
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="no_hp"  class="form-control form-control-user" placeholder="No Hp">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="text" name="deskripsi"  class="form-control form-control-user" placeholder="deskripsi">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                                    <div class="form-group">
                                                        <strong></strong>
                                                        <input type="file"  name="foto" class="form-control form-control-user" placeholder="foto">
                                                    </div>
                                                </div>
                                            
                                                <div class="d-grid gap-2 mt-4 mb-3">
                                                        <button type="submit" name="proses" class="btn btn-primary btn-user btn-block">simpan</button>
                                                </div>
                              
                                  
                                   <div class="pull-right">
                                    <a class="text-primary" href="{{ url('/detailprogam') }}" >Kembali</a>
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
</div>
</div>
@endsection