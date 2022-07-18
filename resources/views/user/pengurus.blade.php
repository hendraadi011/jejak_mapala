@extends('admin.index')
@section('content')

 <div class="container-fluid">

                    <!-- Page Heading -->
                   
                    <div class="col-12 mb-3">
                         <div class="col-12 mb-3">
                             
                                
                         
                            {{-- <a class="btn btn-primary" href="{{route('user.create')}}">Tambah</a> --}}
                            
                          </div>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow-sm">
                        <div class="card-header py-3 d-flex mz-5">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengurus</h6>
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
                                           
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Isactive</th>
                                            <th>Waktu Register</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                           
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($anggotas as $ag)
                                         @if($ag->role == 'pengurus')
                                         <tr>
                                             <td>{{$ag->name}}</td>
                                             <td>{{$ag->email}}</td>
                                             <td>{{$ag->role}}</td>
                                             <td>{{$ag->isactive}}</td>
                                             <td>{{$ag->created_at}}</td>  
                                            <td width="50px">
                                             @if(!empty($ag->foto))
                                                
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/{{$ag->foto}}" alt="" style="max-height:300px; background-size: cover;" />
                                                    @else
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/nopoto.jpg" alt="" />
                                                    @endif
                                             </td>
                                             <td width="14%">
                                                 
                                   <form action="{{ route('user.destroy',$ag->id) }}" method="POST">
                                    <!-- @csrf -->
                                    <!-- @method('DELETE') -->
                                    <div class="d-flex align-items-center">
                                        <a class="btn btn-info btn-sm btn-icon-text mr-3"
                                            href="{{ route('user.show',$ag->id) }}" title="Detail Data Ruangan">Detail
                                            <i class="typcn typcn-eye btn-icon-append"></i>
                                        </a>
                                        <a href="{{ route('user.edit', $ag->id )}}"
                                            class="btn btn-success btn-sm btn-icon-text mr-3" title="Ubah Data
                                            Ruangan">
                                            Ubah
                                            <i class="typcn typcn-edit btn-icon-append"></i>
                                        </a>
                                        <!--button type="submit" class="btn btn-danger btn-sm btn-icon-text"
                                            onclick="return confirm('Anda Yakin Data diHapus???')"
                                            title="Hapus Data Ruangan">
                                            Delete
                                            <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                        </button-->
                                        <!-- </form> -->
                                        <a href="/user-delete/{{$ag->id}}"
                                            class="btn btn-danger btn-sm delete-confirm delete1" role="button">Hapus <i
                                                class="typcn typcn-delete-outline btn-icon-append"></i> </a>
                                    </div>
                                    </td>
                          

                                    </td>
                                    </tr> 
                                    @else
                                    @endif

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

 