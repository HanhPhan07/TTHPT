<header class="main-header" >
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <div class="box box-widget widget-user-2 box-blue ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header ">
              <div class="widget-user-image">
                <img class="img-circle" src="{{ asset ('client/img/logo.png')}}" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Sở GD&ĐT tỉnh Bình Định - Trường ĐH Quy Nhơn</h3>
              <h5 class="widget-user-desc">Hệ thống thi trắc nghiệm trực tuyến</h5>
            </div>
          </div>
        </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <button type="button" class="btn btn-block btn-danger btn-lg" onclick="location.href='{{ url('logout') }}'">Đăng xuất</button>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>