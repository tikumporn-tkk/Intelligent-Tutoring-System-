<?php
   session_start();
   include 'function/connect.php';
   if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){

        $id             =  (isset($_GET['id']) ? $_GET['id'] : '');
        $session_id     =  $_SESSION['session_id'];
        $ID_course     = (isset($_GET['ID_course'])     ?   $_GET['ID_course']      : '' );
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'component/head.php';
    ?>
    <?php

      $sql_course = "SELECT * FROM course WHERE ID_course = '$ID_course'";
      $result_course     = $conn->query( $sql_course );
      $i=1;
      while( $row_course = $result_course->fetch_array(MYSQLI_BOTH) ){
        $ID_teacher = $row_course['ID_teacher'];
        $ID_course = $row_course['ID_course'];
        $sql_lesson = "SELECT * FROM lesson WHERE ID_teacher = '$ID_teacher' AND ID_course = '$ID_course' ";
        $result_lesson      = $conn->query( $sql_lesson  );
        $ii=1;
        $arr_h  = [];
        while( $row_lesson  = $result_lesson ->fetch_array(MYSQLI_BOTH) ){
          $arr_s = [];
          $arr_s[] = "'บทที่".$ii++. "'";
          for($iii = 1;$iii <= 2 ; $iii++){
            if($iii==1){
                $ID_lesson = $row_lesson['ID_lesson'];
                $sql_test_detail = "SELECT COUNT(ID_test) AS full_score FROM test_detail  WHERE ID_teacher = '$ID_teacher' AND ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                $result_test_detail      = $conn->query( $sql_test_detail  );
                $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);

                $sql_exam = "SELECT SUM(Score) AS total_score FROM exam  WHERE ID_course = '$ID_course' AND ID_lesson = '$ID_lesson' AND ID_member = '$session_id'";
                $result_exam      = $conn->query( $sql_exam  );
                $row_exam  = $result_exam ->fetch_array(MYSQLI_BOTH);
                $title =  " (ปรนัย)";
                if($row_test_detail['full_score']!=0){
                    $score = (($row_exam['total_score']*100)/$row_test_detail['full_score']);
                }else{
                    $score = 0;
                }
                $arr_s[] = $score;
            }else {
                $ID_lesson = $row_lesson['ID_lesson'];
                $sql_test_detail = "SELECT COUNT(ID) AS full_score FROM test_command  WHERE  ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                $result_test_detail      = $conn->query( $sql_test_detail  );
                $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);

                $sql_exam = "SELECT SUM(Score) AS total_score FROM exam_codeing  WHERE ID_course = '$ID_course' AND ID_lesson = '$ID_lesson' AND ID_member = '$session_id'";
                $result_exam      = $conn->query( $sql_exam  );
                $row_exam  = $result_exam ->fetch_array(MYSQLI_BOTH);
                $title =   " (อัตนัย)";
                if($row_test_detail['full_score']!=0){
                    $score = (($row_exam['total_score']*100)/($row_test_detail['full_score']*10));
                }else{
                    $score = 0;
                }     
                $arr_s[] = $score;            
            }

          }
          $arr_h[] = "[".implode(",",$arr_s)."]";
        }

        $arr_result = implode(",",$arr_h);
      }

    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['บทเรียน', 'แบบทดสอบปรนัย', 'แบบทดสอบอัตนัย'],
          <?php echo $arr_result ?>
        ]);

        var options = {
          chart: {
            title: 'คิดเป็นเปอร์เซ็น',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

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

    <div class="row">
    <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                    <i class="fa fa-bar-chart-o"></i>
                            <h3 class="box-title">กราฟแสดงผลการทดสอบ</h3> <hr> 
                        
                           
                            <?php
                        
                        $sql_course = "SELECT * FROM course JOIN member ON  course.ID_teacher = member.ID_member";
                        $result_course     = $conn->query( $sql_course );
                        $row_course = $result_course->fetch_array(MYSQLI_BOTH);
                   ?>
                            <!-- BAR CHART -->
        <div align="center">
          <div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$row_course['Coursename']?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
            
                <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
             
            </div>
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