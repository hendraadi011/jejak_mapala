<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<li class="nav-item active">
<!-- Sidebar - Brand -->
<a class="nav-link" href="index.html">

  <img src="{{asset('img/logo1.png')}}" style="width:90%;" alt="">
</a>
</li>
<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
{{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Master Data</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Master Data</h6>
            
            <a class="collapse-item" href="{{url('user')}}">Kelola User</a>
            <a class="collapse-item" href="{{url('berita')}}">Berita</a>
             <a class="collapse-item" href="{{url('kategori')}}">Kategori Berita</a>
             
        </div>
    </div>
</li> --}}
<li class="nav-item">
    <a class="nav-link" href="{{url('user')}}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Kelola User</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('anggota')}}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Data Anggota</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('pengurus')}}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Data Pengurus</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('berita')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Berita</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('kategori')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Kategori Berita</span></a>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
{{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="">Colors</a>
            <a class="collapse-item" href="">Borders</a>
            <a class="collapse-item" href="">Animations</a>
            <a class="collapse-item" href="">Other</a>
        </div>
    </div>
</li> --}}

<!-- Divider -->
<hr class="sidebar-divider">

<div class="sidebar-heading">
    Donasi
</div>
<li class="nav-item">
    <a class="nav-link" href="{{url('progamdonasi')}}">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        <span>Progamdonasi</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('berita')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Berita</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{url('donasimasuk')}}">
       <i class="bi bi-envelope-fill"></i>
        <span>Donasi Masuk</span></a>
</li>

<!-- Heading -->
{{-- <div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="">Login</a>
            <a class="collapse-item" href="">Register</a>
            <a class="collapse-item" href="">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> --}}

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>