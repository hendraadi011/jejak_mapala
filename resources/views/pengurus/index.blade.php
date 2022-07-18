@extends('admin.index')
@section('content')
 <div class="container-fluid">
                      
                    <!-- Page Heading -->
                   
                    <div class="col-12">
                         <div class="col-12">
                    <a class="btn btn-primary" href="{{route('pengurus.create')}}">Tambah</a>
                     <a class="btn btn-danger" href="{{url('penguruspdf')}}">Unduh File PDF</a>
                    <a class="btn btn-success" href="{{url('eksporpengurus')}}">Unduh File Excel</a>
                    </div>
                   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  @if ($message = Session::get('success'))
    
                <div class="alert alert-success mt-3">
                    <p>{{ $message }}</p>
                </div>

            @endif
            
                                    <thead>
                                        <tr>
                                           
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Foto</th>
                                            <th>Action</th>

                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($penguruss as $ag)
                                         <tr>
                                             <td>{{$ag->agt}}</td>
                                             <td>{{$ag->str}}</td>
                                             <td width="50px">
                                               @if(!empty($ag->foto))
                                                
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/{{$ag->foto}}" alt="" style="max-height:300px; background-size: cover;" />
                                                    @else
                                                    <img class="img-fluid"
                                                    src="{{asset('images')}}/nopoto.jpg" alt="" />
                                                    @endif 
                                        
                                             </td>

                                            

        
                                             <td>
                                    <form action="{{ route('pengurus.destroy',$ag->id) }}" method="POST">
                    
                                    <a class="btn btn-primary" title="Edit Data Mahasiswa" href="{{ route('pengurus.edit',$ag->id) }}"><i class="fa fa-pen-to-square"></i></a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" onclick="return confirm('Anda yakin data mau dihapus')" class="btn btn-danger" title="Hapus Data Mahasiswa"><i class="fa-solid fa-trash-can"></i></button>
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