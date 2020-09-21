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
          <input type="text" name="q" class="form-control" placeholder="ค้นหา...">
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
          <a href="professor_home.php">
            <i class="fa  fa-home"></i> <span>หน้าหลัก</span>
          </a>
        </li>

        
        <li >
           <a href="professor_course.php">
            <i class="fa fa-book"></i>
            <span>ข้อมูลชั้นเรียน</span>
                               
          </a>
         </li>
        
         <li >
           <a href="report_home.php">
            <i class="fa fa-file-pdf-o"></i>
            <span>รายงาน</span>
                               
          </a>
         </li>


         <!-- <li >
           <a href="manage_test.php">
            <i class="fa fa-circle-o"></i>
            <span>จัดการข้อมูลแบบทดสอบ</span>
                               
          </a>
         </li>

         <li >
           <a href="manage_test.php">
            <i class="fa fa-circle-o"></i>
            <span>ข้อมูลหลักสูตร</span>
                               
          </a>
         </li>

         <li >
           <a href="manage_test.php">
            <i class="fa fa-circle-o"></i>
            <span>รายงาน</span>
                               
          </a>
         </li> -->
       
        
  </section>
    <!-- /.sidebar -->