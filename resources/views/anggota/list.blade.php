@extends('landingpage.index')
@section('content')

<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
     
      <h1 class="mb-5">Daftar Anggota</h1>
    </div>
    <div class="row g-4">
    @foreach ($anggotas as $ag)
          
     
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="team-item bg-light">
          <div class="overflow-hidden">
            @if(!empty($ag->foto))
           
            <img class="img-fluid"
             src="{{asset('images')}}/{{$ag->foto}}" alt="" style="max-height:300px; background-size: cover;" />
            @else
             <img class="img-fluid"
             src="{{asset('images')}}/nopoto.jpg" alt="" />
             @endif

          
          </div>
          <div
            class="position-relative d-flex justify-content-center"
            style="margin-top: -23px"
          >
            <div class="bg-light d-flex justify-content-center pt-2 px-1">
              <button
                type="button"
                class="btn btn-primary mx-1"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                title="Kirim Pesan"
                data-bs-whatever="@mdo"
              >
                <i class="bi bi-chat-dots"></i>
              </button>
            </div>
          </div>
          <div class="text-center p-4">
            <h5 class="mb-0">{{$ag->nama}}</h5>
            <small>Anggota</small>
            <h6>{{$ag->kampus}}</h6>
          </div>
        </div>
        <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div
                  style="
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    border: 2px solid #e84118;
                  "
                >
                  <img class="img-fluid" src="{{asset('images')}}/{{$ag->foto}}" alt="" width="20%" />
            
                    @empty($ag->foto)
                    <img class="img-fluid" src="{{asset('images')}}/nopoto.jpg" alt="" />
                    @endempty 
                  <span
                    class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle"
                  >
                    <span class="visually-hidden">New alerts</span>
                  </span>
                </div>
                
                <h6 class="text-center ms-3"></h6>
                
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body p-3" style="height: 500px; overflow: auto">
                <div class="d-flex align-items-baseline mb-4">
                  <div class="position-relative avatar">
                      <img class="img-fluid" src="{{asset('images')}}/{{$ag->foto}}" alt="" width="20%" />
                      
                      @empty($ag->foto)
                      <img class="img-fluid" src="{{asset('images')}}/nopoto.jpg" alt="" />
                      @endempty 
                    <span
                      class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle"
                    >
                      <span class="visually-hidden">New alerts</span>
                    </span>
                  </div>
                  <div class="pe-2">
                    <div>
                      <div class="card card-text d-inline-block p-2 px-3 m-1">
                        Hi helh, are you available to chat?
                      </div>
                    </div>
                    <div>
                      <div class="small">01:10PM</div>
                    </div>
                  </div>
                </div>
                <!---user-->
                <div
                  class="d-flex align-items-baseline text-end justify-content-end mb-4"
                >
                  <div class="pe-2">
                    <div>
                      <div class="card card-text d-inline-block p-2 px-3 m-1">
                        Sure
                      </div>
                    </div>
                    <div>
                      <div class="card card-text d-inline-block p-2 px-3 m-1">
                        Let me know when you're available?
                      </div>
                    </div>
                    <div>
                      <div class="small">01:13PM</div>
                    </div>
                  </div>
                  <div class="position-relative avatar">
                    <img
                      src="https://nextbootstrap.netlify.app/assets/images/profiles/2.jpg"
                      class="img-fluid rounded-circle"
                      alt=""
                    />
                    <span
                      class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle"
                    >
                      <span class="visually-hidden">New alerts</span>
                    </span>
                  </div>
                </div>
                 
              </div>
              
              
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label"
                      >Message:</label
                    >
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-primary">
                  Send message
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
    
  </div>
</div>



 @endsection