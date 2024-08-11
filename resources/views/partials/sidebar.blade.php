
<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
      <!-- Aplication Brand -->
      <div class="app-brand">
        <a href="{{ route('admin.consultants') }}">
          <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
            height="33" viewBox="0 0 30 33">
            <g fill="none" fill-rule="evenodd">
              <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
              <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
            </g>
          </svg>
          <span class="brand-name"> CRM </span>
        </a>
      </div>
      @auth
        <?php
            $user_type = Auth::user()->user_type;         
        ?>
       @endauth
      <!-- begin sidebar scrollbar -->
      <div class="sidebar-scrollbar">

        <!-- sidebar menu -->
        <ul class="nav sidebar-inner" id="sidebar-menu">
          {{-- <li class="has-sub active expand">
            <a class="sidenav-item-link" href="{{ route('admin.consultants') }}" >
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Dashboard</span> <b ></b>
            </a>
          </li> --}}


          <li class="has-sub expand" id="consultantId">
            <a class="sidenav-item-link" href="#" data-toggle="collapse" data-target="#Consultant_Module"
              aria-expanded="true" aria-controls="Consultant_Module">
              <i class="mdi mdi-stethoscope"></i>
              <span class="nav-text">Consultant</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="Consultant_Module" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li id="consultantAllId">
                  <a class="sidenav-item-link" href="{{ route('admin.consultants') }}">
                    <span class="nav-text">All Consultant</span>

                  </a>
                </li>
                @auth
                  @if($user_type === 'admin')
                  <li>
                    <a class="sidenav-item-link" href="{{ route('admin.consultant.create') }}">
                      <span class="nav-text">Create Consultant </span>

                    </a>
                  </li>
                  @endif
                @endauth

              </div>
            </ul>
          </li>


          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#patient"
              aria-expanded="false" aria-controls="patient">
              <i class="mdi mdi-bank"></i>
              {{-- <i class="mdi mdi-account-plus"></i> --}}
              <span class="nav-text">Patient Bank</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="patient" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a href="{{ route('patients') }}">Patient List</a>
                </li>

                @auth
                  @if($user_type === 'admin')
                    <li>
                      <a href="{{ route('patient.create') }}">New Patient</a>
                    </li>
                    @endif
                @endauth


              </div>
            </ul>
          </li>

          
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#booking"
              aria-expanded="false" aria-controls="booking">
              {{-- <i class="mdi mdi-account-multiple-outline"></i> --}}
              <i class="mdi mdi-book-open-page-variant"></i>

              <span class="nav-text">Pre Booking</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="booking" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a href="{{ route('bookings') }}">All Pre Booking</a>
                </li>

                @auth
                  @if($user_type === 'admin')
                    <li>
                      <a href="{{ route('booking.create') }}">New Booking</a>
                    </li>
                  @endif
                @endauth
              </div>
            </ul>
          </li>

          
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#query"
              aria-expanded="false" aria-controls="query">
              <i class="mdi mdi-comment-question-outline"></i>
              <span class="nav-text">Query</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="query" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a href="{{ route('querys') }}">All Query</a>
                </li>

                @auth
                  @if($user_type === 'admin')
                  <li>
                    <a href="{{ route('query.create') }}">New Query</a>
                  </li>
                  @endif
                @endauth

              </div>
            </ul>
          </li>
          
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#Packages_Module"
              aria-expanded="false" aria-controls="Packages_Module">
              <i class="mdi mdi-package-variant-closed"></i>
              {{-- <i class="mdi mdi-book-open-page-variant"></i> --}}
              <span class="nav-text">Packages</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="Packages_Module" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a class="sidenav-item-link" href="{{ route('packages') }}">
                    <span class="nav-text">All Package </span>

                  </a>
                </li>

                @auth
                  @if($user_type === 'admin')
                  <li>
                    <a class="sidenav-item-link" href="{{ route('package.create') }}">
                      <span class="nav-text">Create New Package </span>
                    </a>
                  </li>
                  @endif
                @endauth

              </div>
            </ul>
          </li>
          


          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#service"
              aria-expanded="false" aria-controls="service">
              <i class="mdi mdi-checkbox-multiple-marked"></i>
              {{-- <i class="mdi mdi-printer"></i> --}}
              <span class="nav-text">Services</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="service" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a class="sidenav-item-link" href="{{ route('services') }}">
                    <span class="nav-text">All Service</span>
                  </a>
                </li>

                @auth
                  @if($user_type === 'admin')
                  <li>
                    <a class="sidenav-item-link" href="{{ route('service.create') }}">
                      <span class="nav-text">Create Service</span>
                    </a>
                  </li>
                  @endif
                @endauth

              </div>
            </ul>
          </li>


          
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#jurisdiction"
              aria-expanded="false" aria-controls="jurisdiction">
              <i class="mdi mdi-phone-log"></i>
              {{-- <i class="mdi mdi-loupe"></i> --}}
              <span class="nav-text">Phone Directory</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="jurisdiction" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a class="sidenav-item-link" href="{{ route('phonedirectories') }}">
                    <span class="nav-text">All Phone Directory</span>

                  </a>
                </li>

                @auth
                  @if($user_type === 'admin')
                    <li>
                      <a class="sidenav-item-link" href="{{ route('phonedirectory.create') }}">
                        <span class="nav-text">Create Directory</span>

                      </a>
                    </li>
                  @endif
                @endauth


              </div>
            </ul>
          </li>

          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#note"
              aria-expanded="false" aria-controls="note">
              <i class="mdi mdi-menu"></i>
              <span class="nav-text">Note</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="note" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a href="{{ route('notes') }}">All Note</a>
                </li>

                @auth
                  @if($user_type === 'admin')
                    <li>
                      <a href="{{ route('note.create') }}">Create Note</a>
                    </li>
                  @endif
                @endauth
              </div>
            </ul>
          </li>

          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#promotional_activity"
              aria-expanded="false" aria-controls="promotional_activity">
              <i class="mdi mdi-auto-fix"></i>
              <span class="nav-text">Promotional Activity</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="promotional_activity" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a href="{{ route('promotions') }}">All Promotion</a>
                </li>

                @auth
                  @if($user_type === 'admin')
                    <li>
                      <a href="{{ route('promotion.create') }}">Create Promotion</a>
                    </li>
                  @endif
                @endauth
              </div>
            </ul>
          </li>
          
          <li class="has-sub">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#corporate"
              aria-expanded="false" aria-controls="corporate">
              <i class="mdi mdi-city"></i>
              <span class="nav-text">Corpotate</span> <b class="caret"></b>
            </a>
            <ul class="collapse" id="corporate" data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li>
                  <a href="{{ route('corporates') }}">All corporate</a>
                </li>

                @auth
                  @if($user_type === 'admin')
                    <li>
                      <a href="{{ route('corporate.create') }}">Create corporate</a>
                    </li>
                  @endif
                @endauth

              </div>
            </ul>
          </li>



          {{-- @auth
            @if($user_type === 'admin') --}}
              <li class="has-sub">
                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
                  aria-expanded="false" aria-controls="user">
                  {{-- <i class="mdi mdi-comment-question-outline"></i> --}}
                  <i class="mdi mdi-account-star"></i>
                  
                  <span class="nav-text">User</span> <b class="caret"></b>
                </a>
                <ul class="collapse" id="user" data-parent="#sidebar-menu">
                  <div class="sub-menu">

                    <li>
                      <a href="{{ route('users') }}">All user</a>
                    </li>
                    
                      <li>
                        <a href="{{ route('register') }}">New user</a>
                      </li>
                      

                  </div>
                </ul>
              </li>
            {{-- @endif
          @endauth --}}



        </ul>

      </div>
    </div>
  </aside>
  
{{-- <script>
  $(document).ready(function(){
  $("#consultantAllId").click(function(){
    $("li.has-sub").addClass("active expand");
    $("li a:first-child").removeClass('collapsed');

    console.log('******************************************');
  });
});
</script> --}}


{{-- <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
    <div class="sidebar">
        <div class="list-group">
            <h3>Categories</h3>
            <p></p>
            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
            <a href="#main-{{ $parent->id }}" class="list-group-item list-group-item-action" data-toggle="collapse">
                <img src="{!! asset('images/categories/'.$parent->image) !!}" width="50">
                {{ $parent->name }}
            </a>
            <div class="collapse
                @if (Route::is('categories.show'))
                @if (App\Models\Category::ParentOrNotCategory($parent->id, $category->id))
                    show
                @endif
                @endif
            " id="main-{{ $parent->id }}">
                <div class="child-rows">
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                    <a href="{!! route('categories.show', $child->id) !!}" class="list-group-item list-group-item-action
                    @if (Route::is('categories.show'))
                        @if ($child->id == $category->id)
                        active
                        @endif
                    @endif
                    ">
                    - {{ $child->name }}
                    </a>
                @endforeach
                </div>


            </div>
            @endforeach
        </div>
    </div>
</div> --}}
