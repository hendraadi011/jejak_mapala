@extends('admin.index')
@section('content')

 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="col-12">
                    <a class="btn btn-danger" href="{{url('beritapdf')}}">Unduh File PDF</a>
                    <a class="btn btn-success" href="{{url('eksporberita')}}">Unduh File Excel</a>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header position-relative py-4">
                            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
                            <div class="position-absolute top-0 end-0 ">
                             <a class="btn btn-primary btn-sm" href="{{route('berita.create')}}">Tambah Postingan Berita</a>
                             
                            </div>
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
                                           
                                            <th>judul</th>
                                            <th>Tanggal Rilis</th>
                                            <th>Tanggal Berakhir</th>
                                            <th>Kategori Berita</th>
                                            <th>foto</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($beritas as $ag )
                                         <tr>
                                             <td>{{$ag->judul}}</td>
                                             <td>{{$ag->created_at}}</td>
                                             <td>{{$ag->tgl_akhir}}</td> 
                                            
                                           
                                            <td>{{$ag->kategoriberitas->nama}}</td>
                                          
                                            <td width="50px">
                                            @if(!empty($ag->foto))
                                        
                                            <img class="img-fluid"
                                            src="{{asset('images')}}/{{$ag->foto}}" alt="" width="100%" />
                                            @else
                                            <img class="img-fluid"
                                            src="{{asset('images')}}/nopoto.jpg" alt="" />
                                            @endif
                                           
                                             </td>
                                             <td>
                            <form action="{{ route('berita.destroy',$ag->id) }}" method="POST">
   
                                    <a class="btn btn-info btn-sm" href="{{ url('/beritaview',$ag->id) }}"><i class="fa-solid fa-eye"></i></a>
                    
                                    <a class="btn btn-primary btn-sm" href="{{route('berita.edit',$ag->id) }}" ><i class="fa fa-pen-to-square"></i></a>
                
                                    @csrf
                                    @method('DELETE')
                                  
                                     <!-- Flexbox container for aligning the toasts -->
                                  
                                     {{-- <a href="/berita-delete/{{$ag->id}}" class="btn btn-danger btn-sm delete-confirm delete" data-id="{{$ag->id}}" data-nama="{{$ag->judul}}" role="button"><i class="fa-solid fa-trash-can" ></i></a> --}}
                                    {{-- <button type="submit" onclick="return confirm('Anda yakin data mau dihapus')" class="btn btn-danger" title="Hapus Data Mahasiswa"><i class="fa-solid fa-trash-can"></i></button> --}}
                                     <a  class="btn btn-danger btn-sm delete-confirm delete" data-id="{{$ag->id}}" data-nama="{{$ag->judul}}" role="button"><i class="fa-solid fa-trash-can" ></i></a>
                                       
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
 