@extends('admin.index');
@section('content');
<div class="row">
    <div class="col">
        <div class="container-xxl">
            <div
            class="text-center mx-auto mb-5 wow fadeInUp"
            data-wow-delay="0.1s"
            style="max-width: 600px"
            >
            <h3 class="fw-bold"> Edit Struktur Organisasi</h3>
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
                <form action="{{route('jabatan.update',$d->id)}}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @method('PUT');
                
           
                
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                            <div class="form-group">
                                <strong></strong>
                                <input type="text" name="nama" class="form-control" placeholder="nama" value="{{$d->nama}}">
                            </div>
                        </div>
                    
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                            <div class="form-group">
                                <strong></strong>
                                <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value="{{$d->keterangan}}">
                            </div>
                        </div>
                        
                       
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                                <button type="submit" name="proses" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                
                </form>
              @endforeach
            </div>
           
            </div>
             <div class="pull-right">
            <a class="btn btn-primary" href="{{route('jabatan.index')}}">Kemabali</a>
            </div>
        </div>
    </div>
</div>
@endsection