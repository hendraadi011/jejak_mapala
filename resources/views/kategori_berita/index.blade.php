@extends('admin.index')
@section('content')
 <div class="container-fluid">
                      
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                    <div class="col-12">
                         <div class="col-12">
                    <a class="btn btn-primary" href="{{route('kategori.create')}}">Tambah</a>
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
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($kategoris as $ag)
                                         <tr>
                                             <td>{{$ag->nama}}</td>
                                             
                                             <td>{{$ag->keterangan}}</td>
                                    <td>
                                    <form action="{{ route('kategori.destroy',$ag->id) }}" method="POST">
   
                    
                                    <a class="btn btn-primary" href="{{ route('kategori.edit',$ag->id) }}"><i class="fa fa-pen-to-square"></i></a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" onclick="return confirm('Anda yakin data mau dihapus')" class="btn btn-danger" title="Hapus kategori berita"><i class="fa-solid fa-trash-can"></i></button>
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