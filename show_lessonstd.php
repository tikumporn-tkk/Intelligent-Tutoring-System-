<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){

        $id_course         = (isset($_GET['id']) ? $_GET['id'] : '');
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
    include 'component/menu_std.php';
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
 <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
 
 <?php
                     
                        $sql_course = "SELECT * FROM course JOIN member ON  course.ID_teacher = member.ID_member
                        WHERE 	 course.ID_course = $id_course";
                        $result_course     = $conn->query( $sql_course );
                        $row_course = $result_course->fetch_array(MYSQLI_BOTH);
                   ?>
                   <div class="callout callout-info" style="background-image: url(../dist/img/yyyr.png);" >
                       <h1><?=$row_course['Coursename']?></h1><br>
                       <h3>อาจารย์ <?=$row_course['Firstname']." ".$row_course['Lastname']?></h3>
                       &nbsp;<br>
                       &nbsp;<br>
                       &nbsp;<br>
                   </div>

                   
    <div class="row">
    
    <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                    <i class="fa fa-book"></i>
                            <h3 class="box-title">บทเรียน</h3> <hr>      
                                <?php
                                        $sql_lesson="SELECT * FROM course JOIN lesson ON   course.ID_course = lesson.ID_course
                                        JOIN regis_course ON course.ID_course = regis_course.ID_course 
                                        WHERE regis_course.ID_member = $session_id AND status='approve' AND  lesson.ID_course   = $id_course";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){                
                                ?>
                               <div class="box box-solid   <?php if($i%2==0){echo "box-info";}else{echo "box-info";}?>">
                                  <div class="box-header with-border">
                                 <a class="small-box-footer">
                                             <h4 class="box-title">ชื่อบทเรียน : <?=$row_lesson['Lessonname']?></h4></a>
                                            
                                             </div><br>
                                             <div class="box-body" >
                                                <div class="nav-tabs-custom">  
                                            <a href="show_lesson_std.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&id_course=<?=$id_course?>" type="button"  class="btn bg-info pull-right" ><h5>คลิก!! เข้าสู่บทเรียน</h5></a>                
                                                <p>รายละเอียดบทเรียน : <?=$row_lesson['Detail']?></p>     
                                            </div> 
                                          </div> 
                                    </div>
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                                
                                                
             </div>
      <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
        <!-- /.col -->
</section>
<!-- /.content -->
</div>

        
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
    

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