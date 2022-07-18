@extends('landingpage.index')
@section('content')
@php
$rs1=App\Models\Kategoriberita::all();
@endphp
<div class="contaier-xxl py-5">
@foreach($beritas as $b)
  <div class="container">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                @if(!empty($b->foto))
            
                <img class="d-block w-100"
                src="{{asset('images/berita')}}/{{$b->foto}}" alt="" width="100%" />
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
          @foreach($rs1 as $bk)
          <p>{{$bk->nama}}</p>
          @endforeach
          </h6>
          <h1 class="fw-bold ">{{$b->judul}}</h1>
          <div class="col-md-6">
            <div class="grid d-flex text-black-50" id="txt">
                <div class="text-black-50">
                <i class="bi bi-calendar-check"></i><span>{{$b->created_at}}</span>
                </div>
                <div class="ms-3 ">
                <i class="bi bi-person"></i><span>{{$b->penulis}}</span>
                </div>
                <div class="ms-3">
                <i class="bi bi-chat-square-text"></i><span> Comment</span>
                </div>
                
                
            </div>
          </div>
        
        </div>
     </div>
     <div class="row">
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
     </div>
     <div class="row">
         <div class="container mt-3">
           <div class="col-md-12">
         <p>{!!$b->konten!!}</p>
         </div>
         </div>
     </div>
    <hr>
     <!-- awal comment-->
     <div class="row">
         <h6>(0) Comment</h6>
         <div class="container mt-3">
             
             <div class="container mt-2 ">
                 <p class="text-black-50">20 Januari 2022</p>
                 <h6 class="fw-bold text-primary">Boby</h6>
                 <div class="bg-light mt-1 p-3">
                 <p class="text-black-30">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident quos nihil molestiae quas et consequuntur quae. Voluptas at unde adipisci molestiae, sequi consectetur deleniti doloremque sunt doloribus enim. Ea quam hic cumque doloribus sequi laudantium voluptatibus debitis ab consequatur neque.</p>
                 </div>
             </div>
         </div>
          <div class="container mt-3">
             <div class="container mt-2 ">
                 <p class="text-black-50">20 Januari 2022</p>
                 <h6 class="fw-bold text-primary">Santoso</h6>
                 <div class="bg-light mt-1 p-3">
                 <p class="text-black-30">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident quos nihil molestiae quas et consequuntur quae. Voluptas at unde adipisci molestiae, sequi consectetur deleniti doloremque sunt doloribus enim. Ea quam hic cumque doloribus sequi laudantium voluptatibus debitis ab consequatur neque.</p>
                 </div>
             </div>
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
            <form action="" method="POST">
              @csrf
             <div class="mb-3">
               <input type="hidden" name="berita_id" value="{{$b->id}}">
            <label for="exampleFormControlInput1" class="form-label">Nama Lengakap</label>
            <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="">
            </div>
          
            <div class="mb-3 mt-3">
            <label for="exampleFormControlTextarea1" class="form-label">Strat in the discusi</label>
            <textarea class="form-control" name="komentar" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
            <input type="submit" value="kirim" style="width: 150px;" class="btn btn-primary mt-4 mb-4 btn-sm" />
             </form>
         </div>
        
     </div>
     <!-- akhir leave a comment-->
   @endforeach
    
    </div>
</div>
@endsection