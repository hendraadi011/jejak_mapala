@extends('admin.index')
@section('content')

 <div class="container-fluid">

                    <!-- Page Heading -->
                   
                    <div class="col-12 mb-3">
                         <div class="col-12 mb-3">
                             
                                
                         
                            <a class="btn btn-primary" href="{{route('progamdonasi.create')}}">Tambah</a>
                    
                          </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow-sm">
                        <div class="card-header py-3 d-flex mz-5">
                            <h6 class="m-0 font-weight-bold text-primary">Data Progamdonasi</h6>
                            <div style="margin-left: 70%">  
                                <form action="{{route('cari')}}" method="GET"> 
                    <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 250px;">
                    
                        <input type="text" class="form-control border-0" placeholder="Search.."  name="cari">
                        <div class="input-group-append">
                            <button class="input-group-text text-dark border-0 px-3 btn" value="CARI"><i
                            class="fa fa-search text-white"></i></button>
                        </div>
                        
                    </div>
                 </form>
                            {{-- <form action="{{route('cari')}}" method="GET"
                            class="">
                            <div class="input-group">
                                
                                <input type="text" name="cari" class="form-control border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" value="CARI">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            </form> --}}
                            </div>
                            

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                  @if ($message = Session::get('success'))
                            
                                        <div class="alert alert-success mt-3">
                                            <p>{{ $message }}</p>
                                        </div>

                                    @endif
                                
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama donasi</th>
                                            <th>No Rekening</th>
                                            <th>Tanggal Donasi Berakhir</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                           
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no= 1;
                                        @endphp
                                         @foreach ($progamdonasi as $ag)
                                         <tr>
                                             <td>{{$no++}}</td>
                                             <td>{{$ag->nama}}</td>
                                             <td>{{$ag->no_rekening}}</td>
                                             <td>{{$ag->tgl_berakhir}}</td>
                                             <td width="60px"> @if(!empty($ag->foto))
                                                
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/{{$ag->foto}}" alt="" style="max-height:300px; background-size: cover;" />
                                                    @else
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/nopoto.jpg" alt="" />
                                                    @endif
                                                                  </td>
                                            
                                            
                                            {{-- <td width="50px">
                                             @if(!empty($ag->foto))
                                                
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/{{$ag->foto}}" alt="" style="max-height:300px; background-size: cover;" />
                                                    @else
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/nopoto.jpg" alt="" />
                                                    @endif
                                             </td> --}}
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a class="btn btn-info btn-sm btn-icon-text mr-2"
                                                        href="{{ route('progamdonasi.show',$ag->id) }}" title="Detail Data Ruangan"><i class="fa-solid fa-eye"></i>
                                                    
                                                    </a>
                                                    <a href="{{ route('progamdonasi.edit', $ag->id )}}"
                                                        class="btn btn-success btn-sm btn-icon-text mr-2" title="Ubah Data
                                                        Rua">
                                                       <i class="fa fa-pen-to-square"></i>
                                                    </a>
                                                    
                                                    <a href="/progamdonasi-delete/{{$ag->id}}"
                                                        class="btn btn-danger btn-sm delete-confirm delete1" role="button"><i class="fa-solid fa-trash-can delete" data-id="{{$ag->id}}"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr> 

                                         @endforeach
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
<script type="text/javascript">
 
  
        $('.delete1').click(function(){
            var beritaid = $(this).attr('data-id');
             var judul = $(this).attr('data-nama');
        swal({
        title: "Yakin ?",
        text: "Kamu akan menghapus data berita dengan judul "+judul+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location = "/user-delete/"+beritaid+""
            swal("Data berhasil di hapus", {
            icon: "success",
            });
        } else {
            swal("Data tidak jadi dihapus");
        }
        });
        });
        
    
  
</script>
            
@endsection

 