<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user_icon.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['session_firstname']." ".$_SESSION['session_lastname']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> ออนไลน์</a>
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
        <li class="header">เมนูหลัก</li>
        
        <li >
           <a href="manage_member.php">
            <i class="fa fa-users"></i>
            <span>จัดการข้อมูลสมาชิก</span>
                               
          </a>
         </li>
        
         <li >
           <a href="manage_lesson_code.php">
            <i class="fa fa-book"></i>
            <span>จัดการข้อมูลบทเรียน</span>
                               
          </a>
         </li>


         <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>จัดการข้อมูลแบบทดสอบ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="manage_test.php"><i class="fa fa-circle-o"></i> ตารางข้อสอบแบบปรนัย</a></li>
            <li><a href="manage_test_code.php"><i class="fa fa-circle-o"></i>ตารางข้อสอบแบบอัตนัย</a></li>
          </ul>
        </li>

         <li >
           <a href="course_detail.php">
            <i class="fa fa-institution"></i>
            <span>ข้อมูลชั้นเรียน</span>
                               
          </a>
         </li>

         <li >
           <a href="admin_report.php">
            <i class="fa fa-file-pdf-o"></i>
            <span>รายงาน</span>
                               
          </a>
         </li>
       
        
  </section>
    <!-- /.sidebar -->