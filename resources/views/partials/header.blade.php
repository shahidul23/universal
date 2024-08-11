<!-- Nav bar -->
<nav class="navbar navbar-static-top navbar-expand-lg">
    <!-- Sidebar toggle button -->
    <button id="sidebar-toggler" class="sidebar-toggle">
      <span class="sr-only">Toggle navigation</span>
    </button>
    <div class="search-form d-none d-lg-inline-block">
      <!-- <div class="input-group">
        <button type="button" name="search" id="search-btn" class="btn btn-flat">
          <i class="mdi mdi-magnify"></i>
        </button>
        <input type="text" name="query" id="search-input" class="form-control" placeholder="'button', 'chart' etc." autofocus="" autocomplete="off">
      </div>
      <div id="search-results-container">
        <ul id="search-results"></ul>
      </div> -->
    </div>
    <div class="navbar-right">
      <ul class="nav navbar-nav">

        <!-- Notification -->
        <li class="dropdown notifications-menu" style="height: 50%">
          <?php 
               $count = App\Models\Note::count();
               ?>
          <button class="dropdown-toggle hoverClass" data-toggle="dropdown">
            {{ $count }}
            <i class="mdi mdi-bell-outline"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
           
               <li class="dropdown-header">You have {{ $count }} notifications</li>
               <li>
                <a href="#">
                   Notification
                  <span class=" font-size-12 d-inline-block float-right"> Expire Date</span>
                </a>
              </li>
              @foreach (App\Models\Note::orderBy('id', 'desc')->get() as $note)
                <li>
                  <a href="{{ route('note.show', $note->id) }}">
                     {{ $note->name }}
                    <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> {{ $note->validity }}</span>
                  </a>
                </li>
              @endforeach
            
            {{-- <li>
              <a href="#">
                <i class="mdi mdi-account-remove"></i> User deleted
                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 07
                  AM</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="mdi mdi-chart-areaspline"></i> Sales report is ready
                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 12
                  PM</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="mdi mdi-account-supervisor"></i> New client
                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 10
                  AM</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="mdi mdi-server-network-off"></i> Server overloaded
                <span class=" font-size-12 d-inline-block float-right"><i class="mdi mdi-clock-outline"></i> 05
                  AM</span>
              </a>
            </li> --}}
            <li class="dropdown-footer">
              <a class="text-center" href="{{ route('notes') }}"> View All </a>
            </li>
          </ul>
        </li>
        
        <!-- User Account -->
        <li class="dropdown user-menu">
          <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            {{-- <img src="{% static 'img/user/user.png' %}" class="user-image" alt="User Image" /> --}}
            @auth
              <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
            @endauth
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <!-- User image -->
            <li class="dropdown-header">
              {{-- <img src="{% static 'img/user/user.png' %}" class="img-circle" alt="User Image" /> --}}
              <div class="d-inline-block">
                {{ Auth::user()->name }} <small class="pt-1">{{ Auth::user()->name }}</small>
              </div>
            </li>

            <!-- <li>
              <a href="profile.html">
                <i class="mdi mdi-account"></i> My Profile
              </a>
            </li>
            <li>
              <a href="email-inbox.html">
                <i class="mdi mdi-email"></i> Message
              </a>
            </li>
            <li>
              <a href="#"> <i class="mdi mdi-diamond-stone"></i> Projects </a>
            </li>
            <li>
              <a href="#"> <i class="mdi mdi-settings"></i> Account Setting </a>
            </li> -->

            <li class="dropdown-footer">
              <a href="{{ route('logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
              {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form> --}}
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

{{-- <header class="header_wrap fixed-top header_with_topbar">
	<div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>01676787950</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="text-center text-md-right">
                       	<ul class="header_list">

                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown" >
                                        <a class="dropdown dropdown-item" data-target="dropdown" href="{{ route('user.dashboard') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('dashboard-form').submit();">
                                            {{ __('Dashboard') }}
                                        </a>

                                        <form id="dashboard-form" action="{{ route('user.dashboard') }}" method="GET" style="display: none;">
                                            @csrf
                                        </form>

                                        <a class="dropdown dropdown-item" data-target="dropdown" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>


                                    </div>


                                </li>
                            @endguest
						</ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
    	<div class="container">
            

            @include('partials.nav')

            
        </div>
    </div>
</header> --}}