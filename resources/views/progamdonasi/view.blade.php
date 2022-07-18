@extends('landingpage.index')



@section('content')
@foreach($progamdonasi as $br)
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <form action="{{route('donasi',$br->id)}}" method="post" id="model-form" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body d-flex">
                        <div class="thumbnail rounded w-25" style="overflow: hidden">
                           
                        @if(!empty($br->foto))                 
                        <img class="w-100"
                        src="{{asset('images')}}/{{$br->foto}}" alt=""/>
                        @else
                        <img class="w-100"
                        src="{{asset('images')}}/nopoto.jpg" alt="" />
                        @endif
                           
                        </div>

                        <div class="body ml-3">
                            <h5 class="">Anda akan berdonasi untuk:</h5>
                            <p>{{$br->nama}}</p>
                           
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="fs-6">Rekening bank tujuan :</h5>
                       
                       <hr>
                       <div class="d-flex">
                        <div class="p-2 flex-fill">
                                    <h6 class="font-weight-bold fs-6">Nama bank:</h6>
                                    <p class="font-weight-bold fs-6" style="text-transform: uppercase;">BANK {{$br->bank}}</p>
                                </div>
                        <div class="p-2 flex-fill">
                                    <h6 class="font-weight-bold fs-6">Nomer rekening:</h6>
                                    <p class="font-weight-bold fs-6"> {{$br->no_rekening}}</p>

                        </div>
                        <div class="p-2 flex-fill">
                             <h6 class="font-weight-bold fs-6">Nama pemilik rekening:</h6>
                                    <p class="font-weight-bold fs-6"> {{$br->nm_rekening}}</p>

                        </div>
                        </div>

                        {{-- <div class="d-flex justify-content-start">
                         
                                    <h6 class="font-weight-bold">Nama bank:</h6>
                                    <h6 class="font-weight-bold">Nomor rekening:</h6>
                                    <h6 class="font-weight-bold">Nama pemilik rekening:</h6>
                            
                        </div>
                        <div class="d-flex justify-content-start">
                         
                                    <h6 class="font-weight-bold">BANK {{$br->bank}}</h6>
                                    <h6 class="font-weight-bold">{{$br->no_rekening}}</h6>
                                    <h6 class="font-weight-bold">{{$br->nm_rekening}}</h6>
                            
                        </div> --}}
                    </div>
                </div>
                <input type="hidden" name="progamdonasi_id" value="{{$br->id}}" />

                {{-- @if ($campaign->goal == $campaign->donations->sum('nominal')) --}}
                    {{-- <div class="alert alert-light border-danger text-danger">
                        <i class="fas fa-info-circle"></i> 
                        Projek sudah mencapai goal, apakah yakin ingin tetap berdonasi pada untuk projek terpilih.

                        <button type="button" class="close text-danger" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div> --}}
                {{-- @endif --}}
                @if ($message = Session::get('success'))
                            
                                        <div class="alert alert-success mt-3">
                                            <p>{{ $message }}</p>
                                        </div>

                                    @endif

                <div class="card mt-3">
                    @csrf

                    <div class="card-body">
                        <div class="bg-light rounded d-flex align-items-center p-3">
                            <h1 class="font-weight-bold w-25">Rp.</h1>
                            <div class="form-group w-75">
                                <input type="number" style="height: 80px; border-radius:10px;" class="form-control @error('nominal') is-invalid @enderror" name="nominal" id="nominal" placeholder="Masukan nominal donasi" value="{{ old('nominal') }}" >
                                @error('nominal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="alert alert-primary mt-3">
                            Donasi mulai dari Rp berapapun dengan Dompet Kebaikan.
                        </div>

                        {{-- @if (auth()->user()->hasRole('admin')) --}}
                        <div class="form-group">
                            <label for="user_id">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_donatur" placeholder=""/>                           
                        </div>
                         <div class="form-group">
                            <label for="user_id">Email</label>
                            <input type="email" class="form-control" name="email" placeholder=""/>                           
                        </div>
                        <div class="form-group ">
                            <label>Nomer Hp</label>
                            <input type="text" class="form-control" name="no_hp" placeholder=""/>    
                        </div>
                         <div class="form-group">
                            <label>Bukti Pembayaran</label>
                            
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="file" id="images" class="form-control" name="foto"  onchange="previwImage()">    
                        </div>
                        <input type="hidden" name="user_id" value="">
                        <div class="form-group mb-0">
                            <label></label>
                        </div>
                        
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="anonim" name="anonim" value="1">
                                <label class="custom-control-label" for="anonim">Sembunyikan nama saya (Anonim)</label>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <textarea name="doa" id="support" rows="4" class="form-control" placeholder="Tulis dukungan atau doa untuk penggalangan dana ini. Contoh: Semoga cepet sembuh, ya!"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button class="btn btn-primary btn-block" name="proses" type="submit">Kirim</button>
                </div>
                <div class="form-group mt-3 text-center">
                    <a href="{{url('/detailprogam',$br->id)}}">Kemabali ke halaman detailprogam</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection

