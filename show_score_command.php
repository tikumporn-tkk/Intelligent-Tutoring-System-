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
                    <?php
                                        $sql_score = "SELECT SUM(Score) AS Total_score1 FROM exam_codeing WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course AND ID_member = $session_id ";
                                        $result_score     = $conn->query( $sql_score );
                                        $i=0;
                                            while( $row_score= $result_score->fetch_array(MYSQLI_BOTH) ){
                                ?>
                     <div align="center">
                    <img src="../dist/img/codi.PNG" width="300" height="300" ><br>
  
                    <h1>คุณทำได้ <?=$row_score['Total_score1']?> คะแนน</h1><br>
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
                         <h1>หรือ&nbsp;<?=number_format($score,2)?>%</h1><br> 
                    <div align="center">
                  </div>
                  <div class="box-header with-border">
                  <div class="btn-group" >
                  <a href="show_teststd.php?id=<?=$ID_course?>"> <button  type="submit" name="next" class ="btn bg-maroon">
                     <h2> กลับไปหน้าแบบทดสอบ&nbsp;&nbsp;</h2>&nbsp;&nbsp;<br>
						      </button>
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



