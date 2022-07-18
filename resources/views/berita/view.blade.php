@extends('landingpage.index')
@section('content')
@php
$rs1=App\Models\Kategoriberita::all();
$rs2 =App\Models\Komentar::all();
@endphp
<div class="contaier-xxl py-5">
@foreach($beritas as $berita)
  <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                @if(!empty($berita->foto))
            
                <img class="d-block w-100"
                src="{{asset('images')}}/{{$berita->foto}}" alt="" width="100%" />
                @else
                <img class="d-block w-100"
                src="{{asset('images')}}/nopoto.jpg" alt="" />
                @endif
            
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    
    <div class="row">
      <div class="mt-3">
          <h6 class="section-title   text-primary fst-italic">
        
          <p>{{$berita->kategoriberitas->nama}}</p>
         
          </h6>
          <h1 class="fw-bold ">{{$berita->judul}}</h1>
          <div class="col-md-6">
            <div class="grid d-flex text-black-50" id="txt">
                <div class="text-black-50">
                <i class="bi bi-calendar-check"></i><span>{{$berita->created_at->isoFormat('dddd, D MMMM Y')}}</span>
                </div>
                <div class="ms-3 ">
                <i class="bi bi-person"></i><span>{{$berita->penulis}}</span>
                </div>
                <div class="ms-3">
                <i class="bi bi-chat-square-text"></i><span> Comment({{$jumlah}})</span>
                </div>
                
                
            </div>
          </div>
        
        </div>
     </div>
     {{-- <div class="row">
             <div class="position-relative d-flex" >
                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                  <p>Share :</p>
                  <a class="btn btn-square btn-primary mx-1" href=""
                    >
                    <i class="fab fa-facebook-f"></i>
                </a>
                  <a class="btn btn-square btn-primary mx-1" href=""
                    ><i class="bi bi-telephone-fill"></i></i
                  ></a>
                  <a class="btn btn-square btn-primary mx-1" href=""
                    ><i class="fab fa-instagram"></i
                  ></a>
                </div>
              </div>
     </div> --}}
     <div class="row">
         <div class="container mt-3">
           <div class="col-md-12">
         <p>{!!$berita->konten!!}</p>
         </div>
         </div>
     </div>
    <hr>
     <!-- awal comment-->
    <div class="row">
      <div class="col-3">
       <a class="btn btn-primary" id="view-donatur" title="lihat komentar" >Comment({{$jumlah}})</a>
         {{-- <h6>({{$jumlah}}) Comment</h6> --}}
        </div>
        <div id="donatur" style="display: none;">             
          @foreach($berita->komentar as $kom)
           <div class="container mt-3" >
           
             <div class="mt-1 well">
                
                 <h6 class="fw-bold">{{$kom->nama}}</h6>
                 <div class="d-flex justify-content-between bg-white" style="">
                  <div class="p-2 opacity-25">
                    <p class="fs-6">{{$kom->komentar}}</p>
                    <p class="ml-3" style="font-size:12px;">{{$kom->created_at->diffForHumans()}}</p>
                  </div>
                  @if(empty(Auth::user()->name))
                           
                    @else
                        <a  href="/komentar-delete/{{$kom->id}}" class="ms-5 mt-4 opacity-25 delete-confirm delete" title="hapus komentar" data-id="{{$kom->id}}" data-nama="{{$kom->nama}}" role="button"><i class="fa-solid fa-trash-can" ></i></a>
                     @endif<
                     {{-- <a  href="/komentar-delete/{{$kom->id}}" class="mt-4 mr-3 opacity-25 delete-confirm delete" title="hapus komentar" data-id="{{$kom->id}}" data-nama="{{$kom->nama}}" role="button"><i class="fa-solid fa-trash-can" ></i></a> --}}
                 </div>
             </div>
           
         </div>
              
        @endforeach
        </div>
      
        
         
     </div>

     <!-- awal comment-->
     <hr>

     <!-- awal leave a comment-->
     <div class="row">
         <div class="container mt-4" >
             <h5 class="fw-bold">Leave a comment</h5>
         </div>
        
         <div class="container mt-3 text-black-50">
          <form action="{{route('komentar',$berita->id)}}" method="POST">
              @csrf
             
             <div class="mb-3">
             <input type="hidden" name="berita_id" value="{{$berita->id}}">
            <label for="exampleFormControlInput1" class="form-label">Nama Lengakap</label>
            <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="">
            </div>
          
            <div class="mb-3 mt-3">
            <label for="exampleFormControlTextarea1" class="form-label">Strat in the discusi</label>
            <textarea class="form-control" name="komentar" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
            <input type="submit" value="kirim" name="proses" style="width: 150px;" class="btn btn-primary mt-4 mb-4 btn-sm" />
             </form>
        </div>
        
     </div>
     <!-- akhir leave a comment-->
   
     
     
    
    </div>
    @endforeach
</div>
@endsection
