@php
$progamdonasi=App\Models\Progamdonasi::all();
@endphp
<div class="container-fluid1" style="margin-bottom: 250px;">
           
             
   <div class="bg-white border-1 shadow-md" style="border-radius: 20px;">
            <div class="ml-5">
                <br>
                <h2 class="font-weight-bold mt-2">Mapala Peduli</h2>
            </div>
            
            <div class="owl-carousel news-carousel  carousel-item-5 position-relative" style="">
              
           
              @foreach($progamdonasi as $br)
               <div class="p-4 mb-4"> 
               
                  <div class="card shadow-sm p-3" style="border-radius: 2%">
                    <div style="max-height:320px; overflow:hidden;">
                        @if(!empty($br->foto))                 
                            <img class="img-fluid w-100"
                            src="{{asset('images')}}/{{$br->foto}}" style="max-height:180px; border-radius: 10px 10px 0px 0px;" alt=""/>
                            @else
                            <img class="img-fluid w-100"
                            src="{{asset('images')}}/nopoto.jpg" style="object-fit: cover;" alt="" />
                            @endif
                    
                        
                    
                        <div class="mt-2 d-flex justify-content-between">
                        <p class="font-weight-bold">{{$br->nama}}</p>

                        </div>
                        <div class="p-2">
                    
                            <a class="btn btn-primary btn-md btn-block rounded" href="{{url('/detailprogam',$br->id) }}"><i class="fa-solid fa-hand-holding-dollar"></i> &nbsp; Mulai Donasi</a>
                            
                        </div>
        
                    
                  </div>
                  </div>
              </div>
              @endforeach
            </div>
                
            
            </div>
        </div>

    </div> 
  </div>