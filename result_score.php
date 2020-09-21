<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){
    $session_id =  $_SESSION['session_id'];
       // // $score_command =  $_SESSION['score_command'];
        // echo "$score_command คะแนน";
        $ID_lesson     = (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] : '');
        $no            = (isset($_GET['no']) ? $_GET['no'] : '');
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
      ผลการทำแบบทดสอบ 
      </h1>
    </section>

     <!-- Main content -->
     <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <h3 class="box-title"></h3>
<!-- START ALERTS AND CALLOUTS -->
<?php
                        
                        $sql_course = "SELECT * FROM course JOIN member ON  course.ID_teacher = member.ID_member
                        WHERE 	 ID_course =  $ID_course ";
                        $result_course     = $conn->query( $sql_course );
                        $row_course = $result_course->fetch_array(MYSQLI_BOTH);
                   ?>
<h2 class="page-header"><?=$row_course['Coursename']?> </h2>

<div class="row">
  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <i class="fa fa-circle-o"></i>

        <h3 class="box-title">แบบทดสอบปรนัย</h3>
      </div>
      <div class="box-body">
      <?php
                                        $sql_score = "SELECT SUM(Score) AS Total_score FROM exam WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course   AND ID_member = $session_id";
                                        $result_score  = $conn->query( $sql_score );
                                        $i=0;

                                            while( $row_score= $result_score->fetch_array(MYSQLI_BOTH) ){
                                ?>
                     <div align="center">
                   
                    <?php if($row_score['Total_score']==''){
                                        $row_score['Total_score']=0;
                    }
                     ?> 
                     <img src="../dist/img/exam.PNG" width="40%" height="40%" ><br>
                    <h2>คุณทำได้ <?=$row_score['Total_score']?> คะแนน</h2>
                    <?php
                        
                        $sql_test_detail = "SELECT COUNT(ID_test) AS full_score FROM test_detail  WHERE  ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                        $result_test_detail      = $conn->query( $sql_test_detail  );
                        $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);

                        if($row_test_detail['full_score']!=0){
                            $score = (($row_score['Total_score']*100)/$row_test_detail['full_score']);
                        }else{
                            $score = 0;
                        }

                      }
                        ?> 
                         <h2>หรือ <?=number_format($score,2)?>% </h2><br>
                         <p>มีทั้งหมด <?=$row_test_detail['full_score']?> ข้อ </p><br> 

               </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->

  <div class="col-md-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <i class="fa fa-file-code-o"></i>

        <h3 class="box-title">แบบทดสอบอัตนัย</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

      <?php
                                        $sql_score = "SELECT SUM(Score) AS Total_score1 FROM exam_codeing WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course AND ID_member = '$session_id' ";
                                        $result_score     = $conn->query( $sql_score );
                                        $i=0;
                                            while( $row_score= $result_score->fetch_array(MYSQLI_BOTH) ){
                                ?>
                     <div align="center">
                     <?php if($row_score['Total_score1']==''){
                                        $row_score['Total_score1']=0;
                    }
                     ?> 
                    <img src="../dist/img/codi.PNG" width="40%" height="40%" ><br>
  
                    <h2>คุณทำได้ <?=$row_score['Total_score1']?> คะแนน </h2>
                    <?php
                        
                        $sql_test_detail = "SELECT COUNT(ID) AS full_score FROM test_command  WHERE  ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                                    $result_test_detail      = $conn->query( $sql_test_detail  );
                                    $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);
                                    if($row_test_detail['full_score']!=0){
                                      $score = (($row_score['Total_score1']*100)/($row_test_detail['full_score']*10));
                                  }else{
                                      $score = 0;
                                  }                 
                              

                        ?> 
                         <h2>หรือ <?=number_format($score,2)?>% </h2><br> 
                         <p>มีทั้งหมด <?=$row_test_detail['full_score']?> ข้อ</p><br> 

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

<div align="center">
  <a href="show_suggestion.php?ID_lesson=<?=$ID_lesson?>&no=<?=$no?>&ID_course=<?=$ID_course?>">
    <span class="pull-center badge badge-lg bg-green">
      <h4>คำแนะนำการเรียน</h4>
    </span>
  </a>
                
                </div><br><br>
                <div class="box-header with-border">
                
                <div class="pull-left">
                  <div class="btn-group">
                <a href="show_teststd.php?id=<?=$ID_course?>"> 
                      <button  type="submit" name="next" class ="btn btn-info">
                      กลับไปหน้าแบบทดสอบ 
                      </button>
                      </div>
                  </div>
                  </a>
                </div>
                  </div>
                </div>
                
                </div>
                <?php
                                            $i++;
                                            }
                                        ?>
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



