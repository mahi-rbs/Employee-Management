  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar cus-main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li @if(Request::is('/'))class="active" @endif><a href="{{url('/')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
        <li @if(Request::is('employee-management/*') || Request::is('employee-management')) class="active" @endif><a href="{{ url('employee-management') }}"><i class="fa fa-link"></i> <span>Employee Management</span></a></li>

       <!--  <li><a href="{{ url('employee-list') }}"><i class="fa fa-link"></i> <span>Employee Management</span></a></li> -->
        <li  class="treeview @if(Request::is('system-management/*')) active @endif" >
          <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <!-- <li><a href="{{ url('system-management/division') }}">Division</a></li> -->
             <li><a href="{{ url('system-management/designation') }}">Designation</a></li>
          
            <li><a href="{{ url('system-management/work_place') }}">Work Place</a></li>
            <li><a href="{{ url('system-management/subject') }}">Subject</a></li>
            <li><a href="{{ url('system-management/report') }}">Report</a></li>
          </ul>
        </li>
        <li  @if(Request::is('user-management') || Request::is('user-management/*')) class="active" @endif><a href="{{ route('user-management.index') }}"><i class="fa fa-link"></i> <span>User management</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>