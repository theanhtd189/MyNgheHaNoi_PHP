<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item">
      <a class="nav-link" href="./admin/category">
        <span class="icon-bg"><i class="mdi mdi-contacts menu-icon"></i></span>
        <span class="menu-title">QL Loại Sản Phẩm</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="icon-bg"><i class="mdi mdi-crosshairs-gps menu-icon"></i></span>
        <span class="menu-title">Quản Lý Sản Phẩm</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="./admin/product">Danh Sách Sản Phẩm</a></li>
          <li class="nav-item"> <a class="nav-link" href="./admin/product/add">Thêm Sản Phẩm</a></li>
          <li class="nav-item"> <a class="nav-link" href="./admin/comment">Quản Lý Comment</a></li>
        </ul>
      </div>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="./admin/posts">
        <span class="icon-bg"><i class="mdi mdi-format-list-bulleted menu-icon"></i></span>
        <span class="menu-title">Quản Lý Bài Viết</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./admin/slide">
        <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
        <span class="menu-title">Quản Lý Slide</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./admin/customer">
        <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
        <span class="menu-title">Quản Lý Khách Hàng</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./admin/acount">
        <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
        <span class="menu-title">Quản Lý Tài Khoản</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./admin/bill">
        <span class="icon-bg"><i class="mdi mdi-chart-bar menu-icon"></i></span>
        <span class="menu-title">Quản Lý Hóa Đơn</span>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <span class="icon-bg"><i class="mdi mdi-lock menu-icon"></i></span>
        <span class="menu-title">Quản Lý Hóa Đơn</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="#"> Danh Sách Hóa Đơn </a></li>
          <li class="nav-item"> <a class="nav-link" href="#"> Thông Tin Hóa Đơn </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li> 
        </ul>
      </div>
    </li> -->
    
    <li class="nav-item sidebar-user-actions">
      <div class="user-details">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <div class="d-flex align-items-center">
              <div class="sidebar-profile-img">
                <img src="./public/admin/assets/images/admin-password-logo.png" alt="image" class="w-100 h-100 " style="border-radius: 100%;">
              </div>
              <div class="sidebar-profile-text">
                <p class="mb-1"><?=(isset($_SESSION["admin"])? $_SESSION["admin"]["HoTen"] :"")?></p>
              </div>
            </div>
          </div>
          <!-- <div class="badge badge-danger">3</div> -->
        </div>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="./admin/acount/get" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </div>
    </li>
    <li class="nav-item sidebar-user-actions">
      <div class="sidebar-user-menu">
        <a href="./admin/logout" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
          <span class="menu-title">Log Out</span></a>
      </div>
    </li>
  </ul>
</nav>