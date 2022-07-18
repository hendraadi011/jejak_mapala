@extends('landingpage.index')
@section('content')

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="{{url('beritalist')}}" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Inpo<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="category.html" class="nav-item nav-link">Kebencanaan</a>
                    <a href="single.html" class="nav-item nav-link">Lingkungan</a>
                    <a href="contact.html" class="nav-item nav-link">kegiatan</a>
                    <a href="contact.html" class="nav-item nav-link">Inpo dan edukasi</a>
                </div>
                  <form action="{{route('cari')}}" method="GET"> 
                    <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 250px;">
                    
                        <input type="text" class="form-control border-0" placeholder="Search.."  name="cari">
                        <div class="input-group-append">
                            <button class="input-group-text text-dark border-0 px-3 btn" value="CARI"><i
                            class="fa fa-search text-white"></i></button>
                        </div>
                        
                    </div>
                 </form>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


      <!-- Main News Slider Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 px-0">
                <div class="owl-carousel main-carousel position-relative">
                  @foreach($beritas as $b)
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        @if($b->foto)
                        <img class="img-fluid h-100" src="{{asset('images')}}/{{$b->foto}}" 
                        style="object-fit: cover; ">
                        @else
                        <img class="img-fluid h-100"  src="{{asset('images')}}/nopoto.jpg"
                        style="object-fit: cover; ">
                        @endif
                        <div class="overlay">
                            {{-- <div class="mb-2">
                                <a class="badge btn text-uppercase text-white font-weight-semi-bold p-2 mr-2 btn"
                                    href=""></a>
                                <a class="text-white" href="">{{$b->created_at}}</a>
                            </div> --}}
                            
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="{{ url('/beritaview',$b->id) }}">{{$b->judul}}</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
         
        </div>
    </div>
    <!-- Main News Slider End -->

    
    <!-- Breaking News Start -->
    <div class="container-fluid bg-dark py-3 mb-3">
        <div class="container">
            <div class="row align-items-center bg-dark">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <div class="text-whitetext-center font-weight-medium py-2 btn" style="width: 170px;">Breaking News</div>
                        <div class="owl-carousel tranding-carousel posit ion-relative d-inline-flex align-items-center ml-3"
                            style="width: calc(100% - 170px); padding-right: 90px;">
                            @foreach($beritas as $bn)
                            <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold" href="">{{$bn->judul}}</a></div>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->

      <!-- Featured News Slider Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Inpo Kegiatan</h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            
              @foreach($beritas as $br)
                @if($br->nmk == 'kegiatan')
                <div class="position-relative overflow-hidden" style="height: 300px;">
                    <img class="img-fluid h-100" src="{{asset('images')}}/{{$br->foto}}" style="object-fit: cover;">
                     @empty($b->foto)
                      <img class="img-fluid h-100" src="{{asset('images')}}/nopoto.jpg" style="object-fit: cover; max-height:300px;">
                      @endempty
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="">{{$br}}</a>
                            <a class="text-white" href=""><small>{{$br->created_at}}</small></a>
                        </div>
                        <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="">{{$br->judul}}</a>
                    </div>
                </div>
                @else
                    
                    
                 @endif  
                @endforeach
            
            </div>
        </div>
    </div>


    <div class="container-fluid pt-5 mb-3">
        <div class="container">
         @foreach($beritas as $br)
       
         @endforeach
        </div>
    </div>

@endsection
