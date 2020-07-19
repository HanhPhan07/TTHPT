<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset ('admin/dist/img/user2-160x160.jpg ') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
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
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{ url ('admin/subject') }}"><i class="fa fa-book"></i> <span>Môn Học</span></a></li>
            <li><a href="{{ url ('admin/student') }}"><i class="fa fa-group"></i> <span>Học Sinh</span></a></li>
            <li><a href="{{ asset ('admin/question') }}"><i class="fa fa-question-circle"></i> Câu hỏi</a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Thi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ asset ('admin/exam') }}"><i class="fa fa-circle-o"></i> Danh sách đề thi</a></li>
                    <li><a href="{{ asset ('admin/schedule') }}"><i class="fa fa-circle-o"></i> Lịch thi</a></li>
                    <li><a href="{{ asset ('admin/examlist') }}"><i class="fa fa-circle-o"></i> Danh sách thi</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil-square-o"></i>
                    <span>Kết Quả</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ asset ('admin/result') }}"><i class="fa fa-circle-o"></i> Bài làm</a></li>
                    <li><a href="{{ asset ('admin/result/aftercalculate') }}"><i class="fa fa-circle-o"></i> Kết quả bài</a></li>
                </ul>
            </li>
    </section>
    <!-- /.sidebar -->
</aside>
