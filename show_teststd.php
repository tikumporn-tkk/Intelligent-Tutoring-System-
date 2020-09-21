<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){

        $id             =  (isset($_GET['id']) ? $_GET['id'] : '');
        $session_id     =  $_SESSION['session_id'];
        $session_choice =  $_SESSION['session_choice'] ;
        $ID_lesson     = (isset($_GET['ID_lesson'])     ?   $_GET['ID_lesson']      : '' );
        $ID_course     = (isset($_GET['ID_course'])     ?   $_GET['ID_course']      : '' );
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
                        WHERE 	 ID_course = $id";
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
                    <i class="fa fa-laptop"></i>
                            <h3 class="box-title">แบบทดสอบ</h3>
                            <div class="row no-print">
                              <div class="col-xs-12">
                              <?php
                        
                                $sql_lesson = "SELECT * FROM course JOIN lesson ON  course.ID_course = lesson.ID_course";
                                $result_lesson     = $conn->query( $sql_lesson );
                                $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH);
                             ?>
                            <a href="report_std.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&ID_course=<?=$row_lesson['ID_course']?>" 
                                              class="btn bg-navy pull-right"><i class =" fa fa-bar-chart-o" ></i>&nbsp;กราฟแสดงผลการทดสอบ<br></a>
                            </div>
                          </div>
                            <hr> 
              
                                <?php
                                        $sql_lesson="SELECT * FROM course JOIN lesson ON   course.ID_course = lesson.ID_course
                                        JOIN regis_course ON course.ID_course = regis_course.ID_course 
                                        WHERE regis_course.ID_member = $session_id AND status='approve' AND  lesson.ID_course   = $id";
                                        $result_lesson      = $conn->query( $sql_lesson );
                                        $i=0;
                                            while( $row_lesson = $result_lesson->fetch_array(MYSQLI_BOTH) ){
                                ?>

                                    <div class="box box-solid  <?php if($i%2==0){echo "box-primary";}else{echo "box-primary";}?>">
                                    <div class="box-header with-border">
                                 <a class="small-box-footer">
                                            <h4>ชื่อบทเรียน : <?=$row_lesson['Lessonname']?></h4></a>
                                            <p>รายละเอียดบทเรียน : <?=$row_lesson['Detail']?></p> 
                                            
                                            <?php
                                              $ID_lesson = $row_lesson['ID_lesson'];

                                              $sql_check_do ="SELECT MAX(no) AS MAX_DO   FROM exam
                                              WHERE ID_lesson = $ID_lesson AND ID_member = $session_id";
                                              $result_check_do      = $conn->query( $sql_check_do );
                                              $row_check_do = $result_check_do->fetch_array(MYSQLI_BOTH);
                                              $MAX_DO = (isset($row_check_do['MAX_DO']) ? $row_check_do['MAX_DO'] : 0);


                                              $sql_check_no ="SELECT MAX(No) AS MAX_NO FROM test_detail 
                                              WHERE ID_lesson = $ID_lesson ";
                                              $result_check_no      = $conn->query( $sql_check_no );
                                              $row_check_no = $result_check_no->fetch_array(MYSQLI_BOTH);
                                              $MAX_NO = (isset($row_check_no['MAX_NO']) ? $row_check_no['MAX_NO'] : 0);


                                              $result_check_do      = $conn->query( $sql_check_do );
                                              $row_check_do = $result_check_do->fetch_array(MYSQLI_BOTH);

                                              $show = 0;

                                              if($MAX_DO== 0 && $MAX_NO == 0){
                                                 echo '<input type="button"  class="btn bg-navy disabled" value="ยังไม่มีแบบทดสอบแบบปรนัย"> '; 
                                              }else if ($MAX_DO!=$MAX_NO){
                                            ?>
                                              <a href="test_choice.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&no=<?=($MAX_DO+1)?>&ID_course=<?=$row_lesson['ID_course']?>" 
                                              class="btn bg-navy">คลิก!! เข้าสู่แบบทดสอบแบบปรนัย<br></a>   
                                            <?php
                                              }
                                              else{
                                                $show++;
                                                // echo '<input type="button"  class="btn bg-olive disabled" value="ทำแบบทดสอบแบบปรนัยเรียบร้อยแล้ว">';
                                                ?>
                                                 <a href="show_score_choice.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&ID_course=<?=$row_lesson['ID_course']?>" 
                                              type="button" class="btn bg-olive">ทำแบบทดสอบแบบปรนัยเรียบร้อยแล้ว<br></a> 
                                                <?php
                                              }
                                            ?>             
                                            <?php
                                              $ID_lesson = $row_lesson['ID_lesson'];

                                              $sql_check_do1 ="SELECT MAX(no) AS MAX_DO1   FROM exam_codeing
                                              WHERE ID_lesson = $ID_lesson AND ID_member = $session_id";
                                              $result_check_do1      = $conn->query( $sql_check_do1 );
                                              $row_check_do1 = $result_check_do1->fetch_array(MYSQLI_BOTH);
                                              $MAX_DO1 = (isset($row_check_do1['MAX_DO1']) ? $row_check_do1['MAX_DO1'] : 0);


                                              $sql_check_no1 ="SELECT MAX(No) AS MAX_NO1 FROM test_command
                                              WHERE ID_lesson = $ID_lesson ";
                                              $result_check_no1      = $conn->query( $sql_check_no1 );
                                              $row_check_no1 = $result_check_no1->fetch_array(MYSQLI_BOTH);
                                              $MAX_NO1 = (isset($row_check_no1['MAX_NO1']) ? $row_check_no1['MAX_NO1'] : 0);


                                              $result_check_do1      = $conn->query( $sql_check_do1 );
                                              $row_check_do1 = $result_check_do1->fetch_array(MYSQLI_BOTH);
                                              if($MAX_DO1== 0 && $MAX_NO1 == 0){
                                                 echo '<input type="button"  class="btn bg-purple disabled" value=" ยังไม่มีแบบทดสอบแบบอัตนัย">'; 
                                              }else if ($MAX_DO1!=$MAX_NO1){
                                            ?>
                                              <a href="test_testing.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&no=<?=($MAX_DO1+1)?>&ID_course=<?=$row_lesson['ID_course']?>" 
                                              type="button" class="btn bg-purple">คลิก!! เข้าสู่แบบทดสอบแบบอัตนัย<br></a>   
                                            <?php
                                              }
                                              else{
                                                $show++;
                                                // echo '<input type="button"  class="btn bg-olive disabled" value="ทำแบบทดสอบแบบอัตนัยเรียบร้อยแล้ว">';
                                                ?>

                                                 <a href="show_score_command.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&ID_course=<?=$row_lesson['ID_course']?>" 
                                              type="button" class="btn bg-olive">ทำแบบทดสอบแบบอัตนัยเรียบร้อยแล้ว<br></a> 
                                                <?php
                                                
                                              }
                                            ?>  
                                            
                                              <?php
                                            if($show==2){

                                              ?>
                                              

                                              <a href="result_score.php?ID_lesson=<?=$row_lesson['ID_lesson']?>&ID_course=<?=$row_lesson['ID_course']?>" 
                                              type="button" class="btn bg-navy">ผลการทำแบบทดสอบ<br></a>   
                                              <?php
                                            }

                                            ?>
                                            </div> 
                                    </div>
                                        <?php
                                            $i++;
                                            }
                                        ?>
  
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