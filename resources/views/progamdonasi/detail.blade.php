@extends('landingpage.index')

@section('content')
@php
$rs2 =App\Models\Donasi::all();
@endphp
@foreach($progamdonasi as $br)
<div class="container-fluid p-0">
<div class="container mt-5">
  
       <div class="row justify-content-between">
           <div class="col-lg-7">
               
                   
            <div class="card border-1 shadow-0 p-4">     
                <div class="thumnail rounded" style="overflow:hidden;">
                    @if(!empty($br->foto))                 
                        <img class="w-100"
                        src="{{asset('images')}}/{{$br->foto}}" alt=""/>
                        @else
                        <img class="w-100"
                        src="{{asset('images')}}/nopoto.jpg" alt="" />
                     @endif

                </div>
                <div class="mt-4 d-flex justify-content-between">
                     <h5 class="font-weight-bold">{{$br->nama}}</h5>
                     <p  style="font-size: 12px;">{{$br->donasi_latest->created_at->isoFormat('dddd, D MMMM Y')}}</p>
                </div>
                <div class="body mt-4">
                   
                    <p>{!!$br->deskripsi!!}</p>
                        
                </div>
               
           </div>
          </div>
           <div class="col-lg-5">
               
               <div class="card border-1 shadow-0 p-4">
                @if($jumlah < $br->goal)
                   <h2 class="font-wight-bold">@currency($jumlah)</h2>
                   
               
                     <h6>Terkumpul dari @currency($br->goal)</h6>
             
                      {{-- <p class="font-weight-bold">@currency($d->nominal)</p> --}}
                       <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:{{($jumlah / $br->goal * 100)}}%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-1">
                           
                           
                            <p>{{($jumlah / $br->goal * 100)}}% tercapai</p>
                            {{-- {{now()->parse($br->tgl_berakhir)->diffForHumans()}} --}}
                                <script>
                                CountDownTimer('{{$br->created_at}}', 'countdown');
                                function CountDownTimer(dt, id)
                                {
                                    var end = new Date('{{$br->tgl_berakhir}}');
                                    var _second = 1000;
                                    var _minute = _second * 60;
                                    var _hour = _minute * 60;
                                    var _day = _hour * 24;
                                    var timer;
                                    function showRemaining() {
                                        var now = new Date();
                                        var distance = end - now;
                                        if (distance < 0) {

                                            clearInterval(timer);
                                        
                                            return;
                                        }
                                        var days = Math.floor(distance / _day);
                                        var hours = Math.floor((distance % _day) / _hour);
                                        var minutes = Math.floor((distance % _hour) / _minute);
                                        var seconds = Math.floor((distance % _minute) / _second);

                                        document.getElementById(id).innerHTML = days + 'Hari ';
                                        document.getElementById(id).innerHTML += hours + 'jam ';
                                        document.getElementById(id).innerHTML += minutes + 'mins ';
                                        document.getElementById(id).innerHTML += seconds + 'secs ';
                                        
                                    }
                                    timer = setInterval(showRemaining, 1000);
                                }
                                </script>
                            <p style="font-size: 10px;" id="countdown"></p>
                        </div>
                        <div class="donasi mt-5 mb-2">
                            <a class="btn btn-primary btn-lg btn-block rounded" href="{{url('/viewprogam',$br->id) }}"><i class="fa-solid fa-hand-holding-dollar"></i> &nbsp;Donasi sekarang</a>
                            {{-- <form action="{{route('donatur.create')}}" method="get">
                                <input type="hidden" name="id" value="{{$br->id}}" />
                            <button class="btn btn-primary btn-lg btn-block" href="">Donasi sekarang</button>
                            </form> --}}
                         </div>
                    @else
                    <h2 class="font-wight-bold">Donasi Terkumpul</h2>
                     <p class="font-wight fs-6 mt-3 mb-1">@currency($jumlah)</p>
                     <p class="font-wight fs-6 mb-3">Terkumpul dari @currency($br->goal)</p>
                     <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:{{($jumlah / $br->goal * 100)}}%" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100"></div>
                        </div>
                    

                   @endif
                
                
                   
               </div>
               <h6 class="font-weight-bold mt-2"></h6>
               <ul class="nav nav-plis mb-3 daftar-donasi" id="plis-tab" role="tablist">
                   <li class="nav-item">
                       <a class="btn btn-primary" id="view-donatur" title="lihat para donatur" >Donatur ({{$jumlahdonatur}})</a>
                       
                   </li>
                   
                
               </ul>
              

               
              <div class="scroll" id="donatur" style="display: none;">
               <div class="tab-content bg-white">
                   <div class="tab-pane fade show active p-4" id="pills-waktu" role="tabpanel" aria-labelledby="pills-waktu-tab">
                         
                       @foreach ($br->donasi as $donasi)
                         
                      
                       <div>
    
                           <p class="font-weight-bold mb-0" style="font-size: 13px"><i class="fa-regular fa-face-smile"></i> {{$donasi->nama_donatur}}</p>
                           <div class="d-flex justify-content-between">
                           <p class="font-weight mb-2 ml-2" style="font-size: 12px">@currency($donasi->nominal)</p>
                           <p class="font-weight mb-0 ml-2" style="font-size: 10px">{{$donasi->created_at->diffForHumans()}}</p>
                           </div>
                       </div>
                      
                      @endforeach
                      

                   </div>
               </div>
               </div>
       </div>   
  
    
</div>
</div>
@endforeach


@endsection

  

