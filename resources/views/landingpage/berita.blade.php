@php
$beritas=App\Models\Berita::all();
@endphp
<div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
                            </div>
                        </div>
                     
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>
                        @foreach($beritas as $brt)
                        <div class="col-lg-5" >
                            <div class="position-relative mb-3">
                                @if(!empty($brt->foto))
                                <img class="img-fluid w-100" src="{{asset('images')}}/{{$brt->foto}}" tyle="max-height:180px; background-size: cover;">
                                 @else
                                 <img class="img-fluid w-100" src="{{asset('images')}}/nopoto.jpg" style="max-height:180px; background-size: cover;">
                                @endif
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href="">{{$brt->nmk}}</a>
                                        <a class="text-body" href=""><small>{{$brt->tgl_liris}}</small></a>
                                    </div>
                                    <a class="h4 d-block mb-0 text-secondary text-uppercase font-weight-bold" href="">{{$brt->judul}}</a>
                                </div>
                                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                    <div class="d-flex align-items-center">
                            
                                        <small>{{$brt->penulis}}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                        <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @endforeach
                  
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <!-- Social Follow Start -->
                   
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                   
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                   
                   
                   
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                  
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>