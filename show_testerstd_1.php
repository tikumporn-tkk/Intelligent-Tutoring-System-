<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){

      $ID_lesson          = (isset($_GET['id']) ? $_GET['id'] : '');
      $session_id =  $_SESSION['session_id'];
      $testcomplie     = (isset($_POST['testcomplie']) ? $_POST['testcomplie'] : '');
      $outputtest      = "";
      $result      = "";
      if($testcomplie!=''){
      
                            $my_file = 'code2.c';
                            file_put_contents($my_file, $testcomplie);
                            putenv("PATH=../MinGW64/bin");
                            exec("gcc $my_file -o .\c2.exe");                                                                                                               
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
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
      <div class="row" align="center">
            <div class="col-md-12" >
                <div class="box" >
                    <div class="box-header">
                        <h3 class="box-title">
                           
                                <!-- แสดงข้อมูลแบบทดสอบ -->
                                    <div class="container text-center">
                                        <div class="row" >
                                        <div class="col-lg-8 mx-auto" >
                                            <h2 class="text-secondary text-uppercase mb-0">บทที่ 1</h2>
                                            <hr class="star-dark mb-5">
                                            <img class="img-fluid mb-5" src="img/2.png" alt="" width="150" height="150">
                                            <p class="mb-8" align="left">
                                            <title>แบบทดสอบบ</title>
                                                        <table width="64%" border="0">
                                                            <tr>
                                                            <td width="18%"> 
                                                                <form name="quiz">
                                                                <div align="left">
                                                                            <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
                                                                        <?php
                                                                        $sql = "SELECT * FROM test_detail WHERE No=1 ";
                                                                        $result = $conn->query($sql);
                                                                            echo "<table>";
                                                                            $row = $result->fetch_array(MYSQLI_BOTH) ;
                                                                                $id=$row['ID'];
                                                                                $id_test=$row['ID_test'];
                                                                                $no=$row['No'];
                                                                                $question=$row['Question'];
                                                                                $hint1=$row['Hint1'];
                                                                                $hint1=$row['Hint2'];
                                                                                $hint1=$row['Hint3'];
                                                                                $answer=$row['Answer'];
                                                                                echo "<table>";
                                                                                echo "<tr ><td>1.&nbsp;".$question."</td></tr><br>";                                      
                                                                            echo "</table><br>";
                                                                        ?>                                       
                                      <!-- <div class="box-footer">
                                            <button class="btn btn-primary" type="button" onClick="getScore(this.form)"><i class="fas fa-paper-plane">
                                              </i>&nbsp;ส่งคำตอบ
                                            </button>
                                            <button class="btn btn-danger" role="button" type="reset" ><i class="fa fa-fw fa-close">
						                                  </i>ยกเลิก</button><br>
                                                              ผลคะแนน = <input type=text size=15 name="percentage"><br> -->
                                                                </div> 
                                                                </form>
                                                            </td>
                                                            </tr>
                                                        </table>
                                            </p>
                                        </div>
                                    </div>
                          <!-- แสดงข้อมูลแบบทดสอบ ภาษา C -->
                          <div class="container">
                                <div class="row" >
                                  <div class="col-lg-8 mx-auto">
                      			<div align="center">
                           			<div class="row">
                      				<!-- แสดงข้อมูล Data โค้ดภาษา C -->
						            	<form action="" method="post">
                            	<textarea class="input_box form-control w3-left-align w3-left bg-navy" style="font-size:16px;color:deeppink;"  
                                     name="testcomplie" id="" COLS=40 ROWS=10 ><?php echo $testcomplie;?></textarea>&nbsp;<br>
                                     <div class="box-footer">
                                            <div align="right"  >
                                            	<!-- ปุ่มแสดงข้อมูลผลลัพธ์  Data โค้ดภาษา C -->
                                                  <button  type="submit" value="RUN" class ="btn btn-primary">
                                                    <i class="fa fa-play">&nbsp;&nbsp;RUN</i>&nbsp;&nbsp;
						                        </button>
                                                    <button name="cancel" type="reset" class="btn btn-danger" role="button">
                                                        <i class="fa fa-fw fa-close">&nbsp;&nbsp;
                                                        </i>ยกเลิก
						                            </button>
                                            </div>
                                         </div> 

                                        <div align="left"  >
                                            <h4>แสดงผลลัพธ์ : </h4>&nbsp;<br>
                                        </div>
				                    <textarea class="input_box form-control w3-left-align w3-left" style="font-size:16px;color:deeppink;"  
                                     name="result" id="" COLS=40 ROWS=10><?php   if($testcomplie!=''){$result = system(".\c2.exe",$outputtest);} ?></textarea>					                    
                                      </form>
                                    </div>
			        </div>
	            </div>  
            </div>
        </div><br>
        <div class="container">
                                <div class="row">
                                  <div class="col-lg-6 mx-auto">
                      			<div align="left"> 
                                  <button  type="submit" name="backward" class ="btn bg-orange">
                                                    <i class="fa fa-reply">&nbsp;&nbsp;ย้อนกลับ</i>&nbsp;&nbsp;
						                        </button>
                                  </div>
                                  </div>
                                  <div class="col-lg-6 mx-auto">
                      			<div align="right"> 
                                  <button  type="submit" name="next" class ="btn bg-maroon">
                                                    ถัดไป&nbsp;&nbsp;<i class="fa fa-share"></i>&nbsp;&nbsp;
						                        </button>
                                  </div>
                                  </div>
	            </div>  
            </div>
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
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