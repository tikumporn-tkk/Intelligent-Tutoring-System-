<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){
    $session_id =  $_SESSION['session_id'];
    // $_SESSION['score_command'] = 0;
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
    include 'component/menu_std.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      แบบทดสอบ
      </h1>
    </section>

     <!-- Main content -->
     <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                    <i class="fa fa-university"></i> &nbsp;
                    <h3 class="box-title">   ชั้นเรียน   </h3>
                    </div>
                   
                     <!--  ไม่ชิดขอบ -->
                     <div class="box-header with-border"> 
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <?php
                         $sql_course = "SELECT * FROM course 
                         JOIN  member ON   course.ID_teacher	 = member.ID_member	
                         JOIN  regis_course ON   course.ID_course	 = regis_course.ID_course	
                         WHERE regis_course.ID_member = $session_id AND status='approve' ";
                         $result_course     = $conn->query( $sql_course );
                         $i=0;
                            while( $row_course = $result_course->fetch_array(MYSQLI_BOTH) ){

                        ?>
                            <div class="col-lg-6 col-xs-6">
                            <!-- small box -->
                                <div class="small-box <?php if($i%2==0){echo "bg-light-blue-gradient";}else{echo "bg-aqua";}?>">
                                    <div class="inner">
                                        <h1><?=$row_course['Coursename']?></h1>
                                        
                                            <p><?=$row_course['Firstname']." ".$row_course['Lastname']?></p>
                                    </div>
                                    <div class="icon">
                                    <i class="fa fa-file-code-o"></i>
                                    </div>
                                    <a href="show_teststd.php?id=<?=$row_course['ID_course']?>" class="small-box-footer">
                                    เข้าสู่แบบทดสอบ <i class="fa fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        <?php
                            $i++;
                            }
                        ?>
                    </div> 
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






</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>



