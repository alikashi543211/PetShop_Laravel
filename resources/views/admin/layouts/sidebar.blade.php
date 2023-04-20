         <aside class="main-sidebar">
            <!-- sidebar -->
            <div class="sidebar">
               <!-- sidebar menu -->
               <ul class="sidebar-menu">
                  <li class="active">
                     <a href="{{route('admin.dashboard')}}"><i class="fa fa-tachometer"></i><span>Dashboard</span>
                     <span class="pull-right-container">
                     </span>
                     </a>
                  </li>
                    <li class="treeview">
                     <a href="#">
                     <i class="fa fa-image"></i><span>Banners</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('banner.create')}}">Add Banner</a></li>
                        <li><a href="{{route('banner.index')}}">View Banners</a></li>
                     </ul>
                  </li>
                   <li class="treeview">
                     <a href="#">
                     <i class="fa fa-list"></i><span>Categories</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('category.create')}}">Add Category</a></li>
                        <li><a href="{{route('category.index')}}">View Categories</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-product-hunt"></i><span>Products</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        @can('product.create')
                        <li><a href="{{route('product.create')}}">Add Product</a></li>
                        @endcan
                        <li><a href="{{route('product.index')}}">View Products</a></li>
                     </ul>
                  </li>
                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-gift"></i><span>Coupons</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('coupon.create')}}">Add Coupon</a></li>
                        <li><a href="{{route('coupon.index')}}">View Coupons</a></li>
                     </ul>
                  </li>

                  <li class="treeview">
                     <a href="#">
                     <i class="fa fa-first-order"></i><span>Orders</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('admin.order.index',['show'=>'all'])}}">View Orders</a></li>
                        <li><a href="{{route('admin.order.index',['show'=>'pending'])}}">Pending Orders</a></li>
                        <li><a href="{{route('admin.order.index',['show'=>'cancelled'])}}">Cancelled Orders</a></li>
                        <li><a href="{{route('admin.order.index',['show'=>'processing'])}}">Processing Orders</a></li>
                        <li><a href="{{route('admin.order.index',['show'=>'completed'])}}">Completed Orders</a></li>
                     </ul>
                  </li>

                      <li class="treeview">
                     <a href="#">
                     <i class="fa fa-book"></i><span>Reports</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('thepetshop_fyp_view_sale_report_front')}}">View Report</a></li>
                     </ul>
                  </li> 

                    </li>
                    {{-- <li class="treeview">
                     <a href="#">
                     <i class="fa fa-lock"></i><span>Permissions</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('permission.create')}}">Add Permission</a></li>
                        <li><a href="{{route('permission.index')}}">View Permissions</a></li>
                     </ul>
                  </li> 
                  

                  </li>
                     <li class="treeview">
                     <a href="#">
                     <i class="fa fa-tasks"></i><span>Roles</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('role.create')}}">Add Role</a></li>
                        <li><a href="{{route('role.index')}}">View Roles</a></li>
                     </ul>
                  </li>  --}}


                       </li>
                     <li class="treeview">
                     <a href="#">
                     <i class="fa fa-user-circle"></i><span>Account</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('lms_logged_in_user_change_password_front')}}">Change Password</a></li>
                        <li><a href="{{route('every_user_profile_front')}}">View Profile</a></li>
                     </ul>
                  </li>  



                     <li class="treeview">
                     <a href="#">
                     <i class="fa fa-users"></i><span>Users</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu">
                        <li><a href="{{route('user.create')}}">Add User</a></li>
                        <li><a href="{{route('user.index')}}">View Users</a></li>
                     </ul>
                  </li> 

                  <li><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i> Sign Out</a></li>                
               
                 
               </ul>
            </div>
            <!-- /.sidebar -->
         </aside>