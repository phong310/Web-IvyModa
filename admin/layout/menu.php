  <!-- Page Wrapper -->
  <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../products/quanly.php">
              <div class="sidebar-brand-icon rotate-n-15">
                  <i class="fas fa-user-lock"></i>
              </div>
              <div class="sidebar-brand-text mx-3">ADIMIN</div>
          </a>
          <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
              <div class="sidebar-brand-icon ">
                  <img src="../../uploads/logo.webp" alt="">
              </div>
              
          </a> -->

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
              <a class="nav-link" href="../../../nguoidung/page/trangchu.php">
                  <i class="fas fa-home"></i>
                  <span>Trang chủ web</span></a>
              <a class="nav-link" href="../products/quanly.php">
                  <i class="fas fa-shopping-cart"></i>
                  <span>Quản lý sản phẩm</span></a>
              <a class="nav-link" href="../category/quanly.php">
                  <i class="far fa-list-alt"></i>
                  <span>Quản lý danh mục</span></a>
              <a class="nav-link" href="../user/quanly.php">
                  <i class="fas fa-user"></i>
                  <span>Quản lý người dùng</span></a>
              <a class="nav-link" href="../news/quanly.php">
                  <i class="fas fa-newspaper"></i>
                  <span>Quản lý tin tức</span></a>
              <a class="nav-link" href="../receipt/quanly.php">
                  <i class="fas fa-receipt"></i>
                  <span>Quản lý hóa đơn</span></a>
              <a class="nav-link" href="#">
                  <i class="fas fa-sort-amount-up-alt"></i>
                  <span>Thống kê & Báo cáo</span></a>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                  aria-expanded="true" aria-controls="collapsePages">
                  <i class="fas fa-fw fa-folder"></i>
                  <span>Trang</span>
              </a>
              <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                      <h6 class="collapse-header">Login Screens:</h6>
                      <a class="collapse-item" href="../account/login.php">Đăng nhập</a>
                      <a class="collapse-item" href="../account/register.php">Đăng ký</a>
                      <a class="collapse-item" href="../account/forgot-password.html">Quên mật khẩu</a>
                  </div>
              </div>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

              <!-- Topbar -->
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                  <!-- Sidebar Toggle (Topbar) -->
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                      <i class="fa fa-bars"></i>
                  </button>

                  <!-- Topbar Search -->
                  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                      <div class="input-group">
                          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                              aria-label="Search" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                                  <i class="fas fa-search fa-sm"></i>
                              </button>
                          </div>
                      </div>
                  </form>

                  <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">



                      <div class="topbar-divider d-none d-sm-block"></div>

                      <!-- Nav Item - User Information -->
                      <li class="nav-item dropdown no-arrow">
                          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="mr-2 d-none d-lg-inline text-gray-600 small">ĐÌNH PHONG</span>
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
                                  Settings
                              </a>
                              <a class="dropdown-item" href="#">
                                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Activity Log
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                  Đăng xuất
                              </a>
                          </div>
                      </li>

                  </ul>

              </nav>