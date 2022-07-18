@extends('admin.index')
@section('content')
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                    <div class="col-12">
                    <a class="btn btn-primary" href="{{route('anggota.create')}}">Tambah</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           
                                            <th>Nama</th>
                                            <th>Nama Panggilan</th>
                                            <th>Email</th>
                                            <th>Kampus</th>
                                            <th>Fakultas</th>
                                            <th>Prodi</th>
                                            <th>No Hp</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($anggotas as $ag)
                                         <tr>
                                             <td>{{$g->nama}}</td>
                                             <td>{{$g->nama_panggilan}}</td>
                                             <td>{{$ag->email}}</td>
                                             <td>{{$ag->kampus}}</td>
                                              <td>{{$ag->Fakultas}}</td>
                                            </td>{{$ag->prodi}}</td>
                                            </td>{{$ag->hp}}</td>
                                            </td>
                                            <img class="img-fluid" src="{{asset('images')}}/{{$ag->foto}}" alt="" width="20%" />
            
                                            @empty($ag->foto)
                                            <img class="img-fluid" src="{{asset('images')}}/nopoto.jpg" alt="" />
                                            @endempty 
                                        
                                             </td>
                                             

                                         @endforeach
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
@endsection