<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Danh Muc Sản Phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/categories/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Danh Mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/admin/categories/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Danh Mục</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- Menu -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/menu/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/admin/menu/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Menu</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- Sản Phẩm -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Sản Phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/product/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Sản Phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/admin/product/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Sản Phẩm</p>
                </a>
              </li>
              
            </ul>
          </li>
           <!-- Slider -->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/slider/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/admin/slider/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Slider</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- Thành viên -->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Thành viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/user/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thành viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/admin/user/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách thành viên</p>
                </a>
              </li> 
          </li>
        </ul>
         <!-- Setting -->
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa fa-cog"></i>
              <p>
                Setting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/setting/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/admin/setting/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh Sách Setting</p>
                </a>
              </li>
            </ul>
            <!-- Danh sach chuc nang -->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                 Chức năng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/role/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm chức năng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('/admin/role/list')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> danh sách chức năng</p>
                </a>
              </li> 
          </li>
        </ul>
           <!-- permission -->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
              permission
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{asset('/admin/permission/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm permission</p>
                </a>
              </li>
          </li>
        </ul>
      </nav>