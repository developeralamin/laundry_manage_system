
@php

$prefix = Request::route()->getprefix();
$route  = Route::current()->getName();


@endphp



 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
    <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ url('/home') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="../images/logo-dark.png" alt="">
						  <h4><b>Laundry Management System</b></h4>
					 </div>
				</a>
			</div>
    </div>
     
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
	   	  <li>
          <a href="{{ url('/home') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
       <li class="treeview {{ ($prefix == '/user')?'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'user.view')?'active':'' }}"><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
            <li class="{{ ($route == 'user.add')?'active':'' }}"><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li> 

     <li class="treeview {{ ($prefix == '/profile')?'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li class="{{ ($route == 'profile.view')?'active':'' }}">
              <a href="{{ route('profile.view') }}"><i class="ti-more"></i>View Profile</a></li>

            <li class="{{ ($route == 'password.view')?'active':'' }}">
              <a href="{{ route('password.view') }}"><i class="ti-more"></i>Password Change</a></li>
          </ul>
        </li>
		  
        
				  
		 
        <li class="header nav-small-cap">User Interface</li>
		      <li class="treeview  {{ ($prefix == '/report')?'active' : '' }}">
          <a href="#">
            <i data-feather="package"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li  class="{{ ($route == 'report.view')?'active':'' }}"><a href="{{ route('report.view') }}"><i class="ti-more"></i>Report View</a></li>
          </ul>
        </li>

         <li class="treeview {{ ($prefix == '/laundry')?'active' : '' }}">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Laundry Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'laundry.view')?'active':'' }}"><a href="{{ route('laundry.view') }}"><i class="ti-more"></i>View</a></li>
            <li class="{{ ($route == 'laundry.add')?'active':'' }}"><a href="{{ route('laundry.add') }}"><i class="ti-more"></i>Add</a></li>
          </ul>
        </li> 

        <li class="treeview {{ ($prefix == '/laundry-list')?'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Laundry List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ ($route == 'laundryList.view')?'active':'' }}"><a href="{{ route('laundryList.view') }}"><i class="ti-more"></i>View</a></li>
            <li class="{{ ($route == 'laundryList.add')?'active':'' }}"><a href="{{ route('laundryList.add') }}"><i class="ti-more"></i>Add</a></li>

          </ul>
        </li>
		
		<li class="treeview {{ ($prefix == '/supply')?'active' : '' }}">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Supply List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li class="{{ ($route == 'supply.view')?'active':'' }}"><a href="{{ route('supply.view') }}"><i class="ti-more"></i>View</a></li>
			<li class="{{ ($route == 'supply.add')?'active':'' }}"><a href="{{ route('supply.add') }}"><i class="ti-more"></i>Add</a></li>

		  </ul>
    </li>  
		  
        <li class="treeview {{ ($prefix == '/inventory')?'active' : '' }}">
          <a href="#">
            <i data-feather="hard-drive"></i>
            <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li  class="{{ ($route == 'inventory.view')?'active':'' }}"><a href="{{ route('inventory.view') }}"><i class="ti-more"></i>View Stock Supply</a></li>
            <li  class="{{ ($route == 'inventory.add')?'active':'' }}"><a href="{{ route('inventory.add') }}"><i class="ti-more"></i>Manage Supply</a></li>

            <li  class="{{ ($route == 'InOutList.view')?'active':'' }}"><a href="{{ route('InOutList.view') }}"><i class="ti-more"></i>Supply In/Out</a></li>
           
          </ul>
        </li>
		  
    
		  
	
		  
       		  
		  
	  		  
		  
		
		  
	    	<li>
          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" >  <i data-feather="lock"></i> Logout</a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
   </form>
        
        </li> 
        
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>