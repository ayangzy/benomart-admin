
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
         @if(Auth::check())
         @if($profile !==NULL)
      <div class="pull-left image">
        <img src="{{ asset($profile->image) }}" class="img-circle"  alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        @else
        <div class="pull-left image">
            <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        @endif
        @endif
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview menu-open">
        <a href="/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>

        </a>

      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Categories</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('categories.create')}}"><i class="fa fa-circle-o"></i>Categories</a></li>
          <li><a href="{{ route('subcategories.create')}}"><i class="fa fa-circle-o"></i> Sub-categories</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i>Insert Product</a></li>
          <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Manage Products</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-cart"></i> <span>Manage Orders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> Today's Order</a></li>
          <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Pending Order</a></li>
          <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Delivered Order</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Manage Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Admins</a></li>
          <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Sellers</a></li>
          <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Users</a></li>
        </ul>
      </li>

      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Settings</span></a></li>
      <li><a href="{{ route('profile.show', Auth::user()->name) }}"><i class="fa fa-circle-o text-yellow"></i> <span>Update Profile</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Change Password</span></a></li>
    </ul>
  </section>
