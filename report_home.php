<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==1){
    $session_id =  $_SESSION['session_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'component/head.php';
    ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
   <?php
    include 'component/header.php';
    ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"><!-- Menu -->
    <?php
    include 'component/menu_tch.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">ข้อมูลรายงานผล</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- <table id="example1" class="table table-bordered table-hover">
                            <?php
                                $sql = "SELECT * FROM course ORDER BY ID_course ASC";
                                 $result = $conn->query($sql);
                            ?>
                                <div class="box-footer">
                                <a href="#" 
                                                data-toggle         ="modal" 
                                                data-target         ="#Modaladd" 
                                                data-id_course      ="<?php echo  $row["ID_course"]?>"
                                                data-coursename     ="<?php echo  $row["Coursename"];?>"
                                                data-detail         ="<?php echo $row["Detail"];?>"
                                                type                ="button" class="btn btn-success pull-right open-AddBookDialog3" >
                                            <i class="fa fa-fw fa-plus">
                                            </i>สร้างห้องเรียนใหม่
                                            </a>
                                </div>     
                        </table> -->
                    
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                       
                  <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-file-pdf-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><h4>ตารางรายงานผล</h4></span>
              <span class="info-box-number"></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                  <a href="report_table.php" class="btn btn-danger btn-xs ">ดูข้อมูลรายงาน</a>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

                
           
                </div>
            </div>
        </div>

      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <?php
     include 'component/footer.php';
    ?>
  </footer>

  <!-- Control Sidebar -->
    <?php
     include 'component/Control_Sidebar.php';
    ?>
  <!-- /.control-sidebar -->


  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
   
<?php
    include 'component/class.php';
?>




<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

 
</script>


</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>