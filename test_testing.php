<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){
      $session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );

      $ID_lesson     = (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] : '');
      $ID_course     = (isset($_GET['ID_course']) ? $_GET['ID_course'] : '');
      $no            = (isset($_GET['no']) ? $_GET['no'] : '');

      $round = (isset($_POST['round']) ? $_POST['round'] : '0');
      $_SESSION['score_command'] = 0;
      $score_this = (isset($_GET['score_this'])       ?   $_GET['score_this']    : '' );
      $next  = "off";
      $hint  = "off";

      $testcomplie     = (isset($_POST['testcomplie']) ? $_POST['testcomplie'] : '');
      // $testcomplie     = (isset($_GET['testcomplie']) ? $_GET['testcomplie'] : '');
      $outputtest      = "";
      $result      = "";
      if($testcomplie!=''){
      
                            $my_file = 'code2.c';
                            file_put_contents($my_file, $testcomplie);
                            putenv("PATH=../MinGW64/bin");
                            exec("gcc $my_file -o .\c2.exe");                     
      }    
      $sql = "SELECT * FROM test_command 
                         join lesson on test_command.ID_lesson = lesson.ID_lesson
                          join course on test_command.ID_course = course.ID_course
      WHERE test_command.No = '$no' AND test_command.ID_lesson =  '$ID_lesson' AND test_command.ID_course =  '$ID_course'  ;";
     
      $result_answer = $conn->query($sql);

      $row = $result_answer->fetch_array(MYSQLI_BOTH) ;
              $id=$row['ID'];
              $no=$row['No'];
              $ID_lesson=$row['ID_lesson'];
              $question=$row['Question'];
              $ex_code=$row['Ex_code'];
              $answer=$row['Answer'];
              $hint1=$row['Hint1'];
              $hint2=$row['Hint2'];
              $hint3=$row['Hint3'];
              $ID_course=$row['ID_course'];
        
               //$result = strval(system("c2.exe",$outputtest));  // หาการวิการเอาคำตอบใส่ตัวเเปร
               //$result =  exec("c2.exe");
               $result = shell_exec(".\c2.exe" ) ;
              //  echo  '<textarea name="" id="" cols="40" rows="10">'.$answer.'</textarea>';
              //  echo "<br>";
              //  echo '<textarea name="" id="" cols="40" rows="10">'.$result.'</textarea>';
              //  echo "<br>";
        // if($result== $answer){
        //   echo "ตรงกัน";
        // }else{
        //   echo "ไม่ตรงกัน";
        // }
        // echo  $result;
        $sim = similar_text($answer,  $result, $perc);
        // echo "similarity: $sim ($perc %)\n";
              
  
        if($round==1){
          
          if($perc >=95){
            /// ทำถูก
            $_SESSION['score_command'] +=10;
            $score_this = 10;
            //โชว์คะแนน เพื่อไปหน้าถัดไป
            $next  = "on";
            include 'command_score.php';
 
          }else{
            //โชว์คำเเนะนำ
            // include 'command_incorrect.php';
           
          }
        }  else if($round==2){
          
          if($perc>=95){
            /// ทำถูก
            $_SESSION['score_command'] +=10;
            $score_this = 10;
            //โชว์คะแนน เพื่อไปหน้าถัดไป
            $next  = "on";
            include 'command_score.php';
          }else{
            /// ทำไม่ถูก
            //โชว์คำเเนะนำ
          }
        }else if($round==3){
          
          if($perc>=95){
            /// ทำถูก
            $_SESSION['score_command'] +=10;
            $score_this = 10;
            //โชว์คะแนน เพื่อไปหน้าถัดไป
            $next  = "on";
            include 'command_score.php';
 
          }else{
            /// ทำไม่ถูก
            //โชว์คำเเนะนำ
            include 'command_hint1.php';
          }
        }else if($round==4){
          
          if($perc>=95){
            /// ทำถูก
            $_SESSION['score_command'] +=7.5;
            $score_this = 7.5;
            //โชว์คะแนน เพื่อไปหน้าถัดไป
            $next  = "on";
            include 'command_score.php';
 
          }else{
            /// ทำไม่ถูก
            //โชว์คำเเนะนำ
          }
        }else if($round==5){
          
          if($perc>=95){
            /// ทำถูก
            $_SESSION['score_command'] +=7.5;
            $score_this = 7.5;
            //โชว์คะแนน เพื่อไปหน้าถัดไป
            $next  = "on";
            include 'command_score.php';
 
          }else{
            /// ทำไม่ถูก
            //โชว์คำเเนะนำ
            include 'command_hint2.php';
          }
          }else if($round==6){
          
            if($perc>=95){
              /// ทำถูก
              $_SESSION['score_command'] +=5;
              $score_this = 5;
              //โชว์คะแนน เพื่อไปหน้าถัดไป
              $next  = "on";
              include 'command_score.php';
   
            }else{
              /// ทำไม่ถูก
              //โชว์คำเเนะนำ
            }
            }else if($round==7){
           
            if($perc>=95){
            /// ทำถูก
            $_SESSION['score_command'] +=5;
            $score_this = 5;
            //โชว์คะแนน เพื่อไปหน้าถัดไป
            $next  = "on";
            include 'command_score.php';
 
          }else{
            /// ทำไม่ถูก
            //โชว์คำเเนะนำ
            include 'command_hint3.php';
          }
          }else if($round==8){
          
            if($perc>=95){
              /// ทำถูก
              $_SESSION['score_command'] +=2.5;
              $score_this = 2.5;
              //โชว์คะแนน เพื่อไปหน้าถัดไป
              $next  = "on";
              include 'command_score.php';
   
            }else{
              /// ทำไม่ถูก
              //โชว์คำเเนะนำ

            }
            }
            else if($round==9){
          
              if($perc>=95){
                /// ทำถูก
                $_SESSION['score_command'] +=2.5;
                $score_this = 2.5;
                //โชว์คะแนน เพื่อไปหน้าถัดไป
                $next  = "on";
                include 'command_score.php';
     
              }else{
                /// ทำไม่ถูก
                //โชว์คำเเนะนำ
                
              }
              }else if($round==10){
          
                if($perc>=95){
                  /// ทำถูก
                  $_SESSION['score_command'] +=2.5;
                  $score_this = 2.5;
                  //โชว์คะแนน เพื่อไปหน้าถัดไป
                  $next  = "on";
                  include 'command_score.php';
       
                }else{
                  /// ทำไม่ถูก
                  //โชว์คำเเนะนำ
                  $_SESSION['score_command'] +=0;
                  $score_this = 0;
                  //โชว์คะแนน เพื่อไปหน้าถัดไป
                  $next  = "on";

                   echo "<script language=\"JavaScript\">";
                   echo "alert('คุณได้คะแนนข้อนี้ $score_this คะแนน กรุณณากดข้อถัดไป!!!');";
                   echo "</script>";
                  // include 'command_score.php';
                  //บันทึกเวลาและวันที่//
                  date_default_timezone_set('Asia/Bangkok');
                  $data=date("Y-m-d",strtotime("now"));
                  $time=date("H:i:s",strtotime("now"));

                  $sql_check = "SELECT COUNT(No) AS count_check FROM exam_codeing WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course AND ID_member =$session_id AND no =$no";
                  $result_check     = $conn->query( $sql_check );
                  $row_check = $result_check->fetch_array(MYSQLI_BOTH);
                  if ($row_check['count_check']==0){
                              $sql = "INSERT INTO exam_codeing  VALUES 
                        ('', 
                              '$no', 
                              '$data', 
                              '$time', 
                              '',
                              '$score_this',
                              '$session_id',
                              '$ID_lesson',
                              '$ID_course');";
                              // echo $sql;

                  $conn->query($sql);
                  }
                  $sql_max = "SELECT max(No) AS no_max FROM test_command WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course";
                  $result_max     = $conn->query( $sql_max );
                  $row_max = $result_max->fetch_array(MYSQLI_BOTH);

                  if($no==$row_max['no_max']){
                      $_SESSION['session_choice'] = 1;
                      $no = $no +1;
                  }else{
                      //บันทึกข้อปัจจุบัน
                      $no = $no +1;
                      $_SESSION['session_choice'] = $no;
                      
                      }
                }
              }
              
                                                                                                               
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
              <h2 class="box-title"><?=$row['Lessonname']?></h2>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                    <?php
                        
                        $sql_test_detail = "SELECT COUNT(ID) AS full_score FROM test_command  WHERE  ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                                    $result_test_detail      = $conn->query( $sql_test_detail  );
                                    $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);
                        ?> 
                         <p><?=$no?>/<?=$row_test_detail['full_score']?> ข้อ</p><br> 
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

              <div class="col-md-9"> 
                                                        <table width="64%" border="0">
                                                            <tr>
                                                            <td width="18%"> 
                                                           
                                                                <div align="left">
                                                                            <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
                                                                        <input type="hidden" name="ID_lesson" value="<?=$ID_lesson?>"> 
                                                                        <input type="hidden" name="no"        value="<?=$no?>">
                                                                        <input type="hidden" name="ID_course" value="<?=$ID_course?>">

                                                                        <table>
                                                                          <tr >
                                                                            <td><h4><?=$row['No']?>.&nbsp;<?=$row['Question']?></h4></td>
                                                                          </tr>                                      
                                                                        </table><br>  
                                                            </td>
                                                            </tr>
                                                        </table>

                                                        <div align="center">
                                                        <div class="col-md-12">                        
                      				<!-- แสดงข้อมูล Data โค้ดภาษา C -->
						            	<form action="" method="post">
                          <div class="box-tools pull-right">
                          จำนวนครั้งการทดสอบโปรแกรม : <input type="text"  name="round" value="<?php if($round<10){echo$round+1;}else{echo'-';} ?>" readonly> <br>
                </div>
                            	<textarea class="input_box form-control w3-left-align w3-left bg-navy" style="font-size:16px;color:deeppink;"  
                                     name="testcomplie" id="" COLS=40 ROWS=10 ><?php echo $testcomplie;?></textarea>&nbsp;<br>
                                     <div class="box-footer">
                                            <div align="right"  >
                                              <!-- ปุ่มแสดงข้อมูลผลลัพธ์  Data โค้ดภาษา C -->
                                             
                                              <button  type="submit" value="RUN" class ="btn btn-primary"  <?php if($next=='on'){ echo "disabled";} ?> >
                                                    <i class="fa fa-play">&nbsp;&nbsp;RUN</i>&nbsp;&nbsp;
                                              </button> 
                                              <button name="cancel" type="reset" class="btn btn-danger" role="button" <?php if($next=='on'){ echo "disabled";} ?>>
                                                      <i class="fa fa-fw fa-close">&nbsp;&nbsp;</i>ยกเลิก 
                                              </button> 
                                                                                  
                                            </div>
                                         </div> 

                                        <div align="left"  >
                                            <h4>แสดงผลลัพธ์ : </h4>&nbsp;<br>
                                        </div>
				                    <textarea class="input_box form-control w3-left-align w3-left" style="font-size:16px;color:deeppink;"  
                                     name="result" id="" COLS=40 ROWS=10><?php if($testcomplie !=''){ $result = system(".\c2.exe",$outputtest);
                                    if($outputtest==1){
                                      echo "ไม่สามารถเเสดงผลลัพธ์ได้";
                                    }
                                    else {
                                      file_put_contents($my_file, '');
                                       unlink('.\c2.exe');
                                    } 
                                  }         
                                  // echo  $answer;
                                  // echo "<br>";
                                  // echo $result;                                                                                                                  
                                      ?></textarea>&nbsp;&nbsp;<br>					                    
                                      </form> 
                                    </div>

              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
          
              <!-- /.Hint -->
            
            <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">ตัวช่วยสำหรับการเขียนโปรแกรม</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" >
                        ตัวช่วยที่ 1 
                      </a>
                    </h4>
                  </div>
                  <?php
                            if($round==3||$round==4||$round==5||$round==6||$round==7||$round==8||$round==9||$round==10){
                              // $round ++;
                              ?>
                  <div id="collapseOne" class="panel-collapse collapse in " disabled>  <!--คำสั่ง เปิดไว้ in-->
                    <div class="box-body">
                    <?=$row['Hint1']?>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse">
                      ตัวช่วยที่ 2
                      </a>
                    </h4>
                  </div>
                  <?php
                            if($round==5||$round==6||$round==7||$round==8||$round==9||$round==10){?>
                  <div id="collapseTwo" class="panel-collapse collapse in" disabled>
                    <div class="box-body">
                    <?=$row['Hint2']?>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse"  >
                      ตัวช่วยที่ 3
                      </a>
                    </h4>
                  </div>
                  <?php
                            if($round==7||$round==8||$round==9||$round==10){?>
                  <div id="collapseThree" class="panel-collapse collapse in"  disabled>
                    <div class="box-body">
                    <?=$row['Hint3']?>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<?php
            $sql_max = "SELECT max(No) AS no_max FROM test_command WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course";
            $result_max     = $conn->query( $sql_max );
            $row_max = $result_max->fetch_array(MYSQLI_BOTH);

            ?>
        <div class="col-md-12">
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="btn-group">
                </div>
                <div class="box-header with-border">
                <div class="pull-right">
                <?php if($next=='on' && $no <= $row_max['no_max']){?>
                  <div class="btn-group">
                  <a href="test_testing.php?ID_lesson=<?=$ID_lesson?>&no=<?=$no?>&ID_course=<?=$ID_course?>">
                  <button  type="submit" name="next" class ="btn bg-maroon">
                                                    ข้อถัดไป&nbsp;&nbsp;<i class="fa fa-share"></i>&nbsp;&nbsp;<br>
						                        </button></a>
                  </div>
                  <!-- /.btn-group -->
             
                <?php 
                }
    
                if($no > $row_max['no_max']){
                  //เป็นข้อสุดท้าย
               
                ?>
               
               <a href="show_score_command.php?ID_lesson=<?=$ID_lesson?>&ID_course=<?=$ID_course?>">
                <button type="button" name="next" class ="btn bg-maroon">
                                                  สรุปผลคะแนน&nbsp;&nbsp;<i class='fa  fa-file-text-o'></i>&nbsp;&nbsp;</button>
						                        </a>
                 <?php
                }
                ?>
                 </div>
                </div>
                <!-- /.pull-right -->
              </div>
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

</body>
</html>

<?php
}else{
        header("Location:login.php");
    }
?>