@extends('admin.index')
@section('content')

 <div class="container-fluid">

                    <!-- Page Heading -->
                   
                    <div class="col-12 mb-3">
                    <a class="btn btn-primary" href="{{route('anggota.create')}}">Tambah</a>
                    <a class="btn btn-danger" href="{{url('anggotapdf')}}">Unduh File PDF</a>
                    <a class="btn btn-success" href="{{url('eksporanggota')}}">Unduh File Excel</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow-sm">
                        <div class="card-header py-3 d-flex mz-5">
                            <h6 class="m-0 font-weight-bold text-primary">Data Anggota</h6>
                            <div style="margin-left: 70%">  
                            <form
                            class="">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            </form>
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
                                            <th>Kampus</th>
                                         
                                            <th>Prodi</th>
                                            <th>No Hp</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($anggotas as $ag)
                                         <tr>
                                             <td>{{$ag->nama}}</td>
                                             
                                             <td>{{$ag->email}}</td>
                                             
                                            
                                            <td>{{$ag->prodi}}</td>
                                            <td>{{$ag->hp}}</td>
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
                            <form action="{{ route('anggota.destroy',$ag->id) }}" method="POST">
   
                                    <a class="btn btn-info" title="Lihat detil data mahasiswa" href="{{ route('anggota.show',$ag->id) }}"><i class="fa-solid fa-eye"></i></a>
                    
                                    <a class="btn btn-primary" title="Edit Data Mahasiswa" href="{{ route('anggota.edit',$ag->id) }}"><i class="fa fa-pen-to-square"></i></a>
                
                                    @csrf
                                    @method('DELETE')
                                     <!-- Flexbox container for aligning the toasts -->
                                    
                                    <button type="submit" class="btn btn-danger" title="Hapus Data Mahasiswa"><i class="fa-solid fa-trash-can delete" data-id="{{$ag->id}}"></i>
                                        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">

                                
                                    </button>
                               </form>

                                    </td>
                                    </tr> 

                                         @endforeach
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            
@endsection
 <script>
        $('.delete').click(function(){
            var anggotaid = $(this).attr('data-id');
            swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            });
        } else {
            swal("Your imaginary file is safe!");
        }
        });
        });
        
    </script>