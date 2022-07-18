@extends('landingpage.index')
@section('content')
<div class="container-fluid p-0">
  <div class="container mt-5">
    <div class="row justify-content-between">
      <div class="col-lg-7">
               
        <div class="container mt-3 text-black-50">
            <form action="{{route('donasi.store')}}" method="POST"  enctype="multipart/form-data" class="user">
              @csrf
             
             <div class="mb-3">
             <input type="hidden" name="progamdonasi_id"  value="">
            <label for="exampleFormControlInput1" class="form-label">Nama Lengakap</label>
            <input type="text" class="form-control" id="donatur" onkeyup="sum()" name="nama_donatur" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nomer Hp</label>
            <input type="text" class="form-control" name="no_hp" id="exampleFormControlInput1" placeholder="">
            </div>
              <div class="mb-3">
            <label for="exampleFormControlInput1"  onkeyup="sum()" class="form-label">Nominal</label>
            <input type="number" class="form-control" id="nom" name="nominal" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Bukti Pembayaran</label>
            <input type="file" class="form-control" name="foto" id="exampleFormControlInput1" placeholder="">
            </div>
          
            <div class="mb-3 mt-3">
            <label for="exampleFormControlTextarea1" class="form-label">Doa</label>
            <textarea class="form-control" name="doa" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <input type="text" class="form-control" onkeyup="sum()" id="hasil" id="exampleFormControlInput1" />
            
            <input type="submit" value="kirim" name="proses" style="width: 150px;" class="btn btn-primary mt-4 mb-4 btn-sm" />
             </form>
         </div>
    
                
               
         </div>
     </div>   
  </div>
</div>

@endsection