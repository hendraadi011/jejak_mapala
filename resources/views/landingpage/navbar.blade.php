 @php
 $user=App\Models\User::all();
 @endphp
 <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-1 shadow"
    >
    <div class="container-fluid" style="width: 90%;">
      <a href=""
        class="navbar-brand d-flex align-items-center px-4 px-lg-5"
      >
      <div class="container mx-auto p-1">
        <img src="{{ asset('img/logo/logo1-01.png') }}" style="width: 150px;">
      </div>
      </a>
      <button
        type="button"
        class="navbar-toggler me-4"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="{{url('/home')}}" class="nav-item nav-link">Home</a>
          <a href="{{url('/beritalist')}}" class="nav-item nav-link">Berita</a>
          <a href="{{'penguruslist'}}" class="nav-item nav-link">Pengurus</a>
          <a href="{{url('anggotalist')}}" class="nav-item nav-link">Anggota</a>
         
          
         
         @guest
        
        <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block"
          >LOGIN<i class="fa fa-arrow-right ms-3"></i
        ></a>
      
        @else
   
     
          <li class="nav-item dropdown no-arrow">
                            <a class="nav-link d-flex ms-auto " href="#" id="userDropdown" role="button"
                               aria-haspopup="true" >
                                <span class="">@if(empty(Auth::user()->name))
                                  {{''}}
                                  @else
                                  {{auth::user()->name}}
                                  @endif</span>

                                  <div class="position-relative avatar " style="margin-top: -10px; margin-left:5px;">
                                    @if(!empty(Auth::user()->foto))
                                                
                                    <img class="img-fluid rounded-circle"
                                    src="{{asset('images')}}/{{auth::user()->foto}}" alt=""  />
                                    @else
                                    <img class="img-fluid rounded-circle"
                                    src="{{asset('images')}}/nopoto.jpg" alt="" style="50px;"/>
                                    <span
                                      class="position-absolute bottom-0 start-100 translate-middle p-1 bg-success border border-light rounded-circle"
                                    >
                                    @endif
                                  </div>         
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Password
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                              
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                             
                        </li>
        </div>
      </div>
        
    
       
      
      @endguest
      </div>
    </nav>