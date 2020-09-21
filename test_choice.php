<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){
      $session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );

      $ID_lesson     = (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] : '');
      $ID_course     = (isset($_GET['ID_course']) ? $_GET['ID_course'] : '');
      $no            = (isset($_GET['no']) ? $_GET['no'] : '');
      
      $round = (isset($_POST['round']) ? $_POST['round'] : '0');
     
      $next  = "off";



      $sql = "SELECT * FROM test_detail 
                       join lesson on test_detail.ID_lesson = lesson.ID_lesson
                       join course on test_detail.ID_course = course.ID_course
      WHERE test_detail.No = $no AND test_detail.ID_lesson =  $ID_lesson AND test_detail.ID_course =  $ID_course ";
     
      $result = $conn->query($sql);
    
      $row = $result->fetch_array(MYSQLI_BOTH) ;
              $id_test    =$row['ID_test'];
              $no         =$row['No'];
              $question   =$row['Question'];
              $choice1    =$row['Choice1'];
              $choice2    =$row['Choice2'];
              $choice3    =$row['Choice3'];
              $choice4    =$row['Choice4'];
              $answer     =$row['Answer'];

                  
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
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$row['Lessonname']?></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
               
                    <?php
                        
                        $sql_test_detail = "SELECT COUNT(ID_test) AS full_score FROM test_detail  WHERE  ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                        $result_test_detail      = $conn->query( $sql_test_detail  );
                        $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);
                      ?>
                      <p><?=$no?>/<?=$row_test_detail['full_score']?> ข้อ </p><br> 
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button --> 
                <div class="btn-group">
                </div>
                <!-- /.btn-group -->
                <div class="pull-right">
                  <div class="btn-group">
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <form name="form0" action="choice_score.php" method="POST">
              <div class="col-md-12">
                
                                                        <table width="100%" border="0">
                                                            <tr>
                                                            <td width="18%"> 
                                                                <div align="left">
                                                                            <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
                                                                <input type="hidden" name="ID_lesson" value="<?=$ID_lesson?>"> 
                                                                <input type="hidden" name="no"        value="<?=$no?>">
                                                                <input type="hidden" name="ID_course" value="<?=$ID_course?>">     
                                                                   <table >
                                                                   <tr> <td><h3><?=$row['No']?>.&nbsp;<?=$row['Question']?></h3></td></tr>
                                                                         <tr><td><h3>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="choice" id="choice1" class="choice" value="1">&nbsp;&nbsp;<?=$row['Choice1']?></h3></td></tr>
                                                                         <tr><td><h3>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="choice" id="choice2" class="choice" value="2">&nbsp;&nbsp;<?=$row['Choice2']?></h3></td></tr>
                                                                         <tr><td><h3>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="choice" id="choice3" class="choice" value="3">&nbsp;&nbsp;<?=$row['Choice3']?></h3></td></tr>
                                                                         <tr><td><h3>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="choice" id="choice4" class="choice" value="4">&nbsp;&nbsp;<?=$row['Choice4']?></h3></td></tr>
                                                                
                                                                 </table>
                                                              
                                                                </div> 
                                                            </td>
                                                            </tr>
                                                        </table>

                                                        <div align="center">
                                                        <div class="col-md-12">
                      						                    
                                      
                                    </div>

              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->

            <div class="col-md-3">
          <div class="box box-solid">
            

          </div>
          <!-- /.box -->
        </div>

        <!-- /.col -->
        <div class="col-md-12">
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
               
                </div>
                <!-- /.btn-group -->
                <div class="box-header with-border">
                
                <div class="pull-right">
                  <div class="btn-group">
                  <button name="next" type="button" onclick="Javascript : check_submit();" class ="btn bg-maroon">
                      ข้อถัดไป&nbsp;&nbsp;<i class="fa fa-share"></i>&nbsp;&nbsp;<br>
						      </button>
                  </div>

                </div>
                  <!-- /.btn-group -->
                  <!-- <div class="btn-group">
                  <a href="test_choice.php?ID_lesson=<?=$ID_lesson?>&no=<?=$no+1?>">
                  <button  type="submit" name="next" class ="btn bg-maroon">
                                                    ข้อถัดไป&nbsp;&nbsp;<i class="fa fa-share"></i>&nbsp;&nbsp;<br>
						                        </button></a>
                  </div> -->
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              </form>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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

<script>
  function check_submit(){

 if(document.getElementById("choice1").checked != false || document.getElementById("choice2").checked != false || document.getElementById("choice3").checked != false || document.getElementById("choice4").checked != false){
      form0.submit();
    }else{
      alert("กรุณาเลือกคำตอบ");
    }

  }
   $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  
  </script>
</body>
</html>

<?php
}else{
        header("Location:login.php");
    }
?>