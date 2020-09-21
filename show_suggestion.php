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
   

     <!-- Main content -->
     <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
      <?php
        $sql_lesson         =  "SELECT *  FROM  lesson 
                                WHERE ID_lesson =  $ID_lesson ";
        $result_lesson      =  $conn->query( $sql_lesson );
        $row_lesson         =  $result_lesson->fetch_array(MYSQLI_BOTH);
        $Lessonname         =  $row_lesson['Lessonname'];

      ?>
      <?php
            $sql_score          = "SELECT SUM(Score) AS Total_score1,COUNT(ID_exam) AS full_score FROM exam 
                                   WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course AND ID_member = '$session_id' ";
            $result_score       =  $conn->query( $sql_score );
            $Multiple_choice_test             = 0;
            $row_score            = $result_score->fetch_array(MYSQLI_BOTH);   
            $Multiple_choice_test = $row_score['Total_score1'];
            $Multiple_choice_full = $row_score['full_score'];
                        if($row_score['Total_score1']==''){
                            $Multiple_choice_test    = 0;
                        }
                        if($Multiple_choice_full!=0){
                            $Multiple_choice_per = (($Multiple_choice_test*100)/($Multiple_choice_full));
                        }else{
                            $Multiple_choice_per = 0;
                        }    


            $sql_score2        = "SELECT SUM(Score) AS Total_score2, COUNT(ID_exam) AS full_score  FROM exam_codeing 
                                  WHERE ID_lesson    =  $ID_lesson AND  ID_course  = $ID_course AND ID_member = '$session_id' ";
                                  
            $result_score2     =  $conn->query( $sql_score2 );
            $Subjective_test   = 0;
            $row_score2        = $result_score2->fetch_array(MYSQLI_BOTH);
                    
            $Subjective_test   = $row_score2['Total_score2'];
                        if($row_score2['Total_score2']==''){
                            $Subjective_test         = 0;
                        }
            $Subjective_full   = $row_score2['full_score']*10;
            if($Subjective_full!=0){
                $Subjective_per = (($Subjective_test*100)/($Subjective_full));
            }else{
                $Subjective_per = 0;
            }  
            //หัวข้อที่ไม่ได้คะแนน
            $sql_keyword          = "SELECT *, COUNT(ID_exam) AS COUNT_NUM,
                                    (SELECT keyword FROM test_detail WHERE test_detail.no = exam.No AND ID_lesson =  $ID_lesson AND  ID_course  = $ID_course) AS keyword 
                                    FROM exam 
                                    WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course AND ID_member = '$session_id' AND Score = 0 
                                    GROUP BY  keyword 
                                    ORDER BY COUNT_NUM DESC limit 4";
            $result_keyword        =  $conn->query( $sql_keyword );
            $keyword                = "";
            
           
            while(  $row_keyword    = $result_keyword->fetch_array(MYSQLI_BOTH) ){
                if($keyword!=''){$keyword.=', ';}
                $keyword .= $row_keyword['keyword'];

            }

                       
                    
                
            ?>
        <div class="row">
            <div class="box box-primary">
                <div class="box-header">
                    <div class="box box-solid box-primary">
                        <div class="box-header with-border">
                            <h1>คำแนะนำในการเรียน </h1>
                        <p>จากแบบทดสอบ : <?=$Lessonname?> </p> 
                        </div>
                    </div> 
                </div> 
            </div> 
            <div class="box-body">
                <table id="example1" class="table table-bordered table-hover" style = "width:85%" align="center">
                    <tr>
                        <td width="40%"><b><i class='fa fa-check-circle-o'></i> คะแนนแบบทดสอบปรนัย</b></td>
                        <td align="left"><?=$Multiple_choice_test?> คะแนน จาก <?=$Multiple_choice_full?> คะแนน (<?=number_format($Multiple_choice_per,2)?> %)</td>
                    </tr>
                    <tr>
                        <td><b> <i class='fa fa-pencil-square'></i> คะแนนแบบทดสอบอัตนัย</b></td>
                        <td align="left"><?=$Subjective_test?> คะแนน จาก <?=$Subjective_full?> คะแนน (<?=number_format($Subjective_per,2)?> %)</td>
                    </tr>
                    <tr>
                        <td><b><i class="fa fa-arrow-circle-up"></i> หัวข้อที่ควรพัฒนา</b></td>
                        <td align="left"><?=$keyword?></td>
                    </tr>
                    <tr>
                        <td><b><i class='fa fa-book'></i></i> บทเรียนที่ควรศึกษาหรือทบทวนเพิ่มเติม</b></td>
                        <td align="left">
                            <?php
                                $sql_keyword          = "SELECT *, COUNT(ID_exam) AS COUNT_NUM,
                                    (SELECT keyword FROM test_detail WHERE test_detail.no = exam.No AND ID_lesson =  $ID_lesson AND  ID_course  = $ID_course) AS keyword 
                                    FROM exam 
                                    WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course AND ID_member = '$session_id' AND Score = 0 
                                    GROUP BY  keyword 
                                    ORDER BY COUNT_NUM DESC limit 4";
                                $result_keyword        =  $conn->query( $sql_keyword );
                               
                            
                        
                            while(  $row_keyword    = $result_keyword->fetch_array(MYSQLI_BOTH) ){
                               
                                  echo"<b><i class='fa  fa-info-circle'></i> ".$row_keyword['keyword']."</b><br>";
                                  $sql_rec = "SELECT * FROM lesson WHERE keyword = '".$row_keyword['keyword']."'" ;
                                  $result_rec        =  $conn->query( $sql_rec ); 
                                  while( $row_rec    = $result_rec->fetch_array(MYSQLI_BOTH) ){
                                      echo "<a href='show_lesson_std.php?ID_lesson=".$row_rec['ID_lesson']."&id_course=".$ID_course."'><i class='fa fa-book'></i> ".$row_rec['Lessonname']." (เข้าสู่บทเรียน <i class='fa fa-mouse-pointer'></i> )</a><br>";
                                  }

                            }
                            
                            
                            ?>

                        </td>
                    </tr>
                </table>
                <center><br><br><br>
                <a href="show_teststd.php?id=<?=$ID_course?>"> 
                      <button  type="submit" name="next" class ="btn btn-info">
                        กลับไปหน้าแบบทดสอบ
                      </button>
                </a>
                </center>
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



