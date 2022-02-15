 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ url('/admin/home') }}">
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
     <li class="nav-item">
         <a class="nav-link" href="{{ route('user') }}">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA USER</span>
         </a>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('bangunan') }}">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA BANGUNAN</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('daerah') }}">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA DAERAH</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('kecamatan') }}">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA KECAMATAN</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('kelurahan') }}">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA KELURAHAN</span>
         </a>
     </li>

     <li class="nav-item">
        <a class="nav-link" href="{{ route('kampus') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>DATA KAMPUS</span>
        </a>
    </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('tipeBangunan') }}">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA TIPE BANGUNAN</span>
         </a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('cities') }}">
             <i class="fas fa-fw fa-cog"></i>
             <span>DATA KOTA/KABUPATEN</span>
         </a>
     </li>


     <!-- Nav Item - Tables -->
     <li class="nav-item">
         @guest
         @if (Route::has('login'))
     <li class="nav-item">
         <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
     </li>
     @endif

     @if (Route::has('register'))
     <li class="nav-item">
         <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
     </li>
     @endif
     @else
     <li class="nav-item dropdown">
         <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false" v-pre>
             {{ Auth::user()->name }}
         </a>

         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </div>
     </li>
     @endguest
     </li>

 </ul>
 <!-- End of Sidebar -->
