<?php
    session_start();
    include 'function/connect.php';
    if($_SESSION['session_id']!=''&&$_SESSION['session_type']==2){

      $id_test         = (isset($_GET['id']) ? $_GET['id'] : '');
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
        จัดการข้อมูล
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
      <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">
                           
                                <!-- แสดงข้อมูลแบบทดสอบ -->
                                <div class="container text-center">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-secondary text-uppercase mb-0">บทที่ 2</h2>
            <hr class="star-dark mb-5">
            <img class="img-fluid mb-5" src="img/2.png" alt="" width="150" height="150">
            <p class="mb-8" align="left">
            <title>แบบทดสอบบ</title>
                             
                          <table width="64%" border="0" align="center">
                            <tr>
                              <td width="18%"> <div align="center">
                                <form name="quiz" align="left">
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
                                              $choice1=$row['Choice1'];
                                              $choice2=$row['Choice2'];
                                              $choice3=$row['Choice3'];
                                              $choice4=$row['Choice4'];
                                              $hint1=$row['Hint1'];
                                              $hint1=$row['Hint2'];
                                              $hint1=$row['Hint3'];
                                              $answer=$row['Answer'];
                                              echo "<table>";
                                              echo "<tr ><td>1.".$question."</td></tr>";
                                              echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name=ch[] value=1>&nbsp;&nbsp;".$choice1."</td></tr>";
                                              echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name=ch[] value=2>&nbsp;&nbsp;".$choice2."</td></tr>";
                                              echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name=ch[] value=3>&nbsp;&nbsp;".$choice3."</td></tr>";
                                              echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name=ch[] value=3>&nbsp;&nbsp;".$choice4."</td></tr>";
                                      
                                          echo "</table>";
                                      ?>
                                       



                                      <div class="box-footer">
                                            <button class="btn btn-primary" type="button" onClick="getScore(this.form)"><i class="fas fa-paper-plane">
                                              </i>&nbsp;ส่งคำตอบ
                                            </button>
                                            <button class="btn btn-danger" role="button" type="reset" ><i class="fa fa-fw fa-close">
						                                  </i>ยกเลิก</button><br>
						                                      ผลคะแนน = <input type=text size=15 name="percentage"><br>
                                            </form></p>
				                              </div>
                              </td>
                              </tr>
                          </table>
                          </div>
                          </div>
                          <!-- แสดงข้อมูลแบบทดสอบ ภาษา C -->
                          <div class="container">
                                <div class="row">
                                  <div class="col-lg-8 mx-auto">
                                        <?php
                                          ini_set('display_errors', 1);
                                          error_reporting(~0);
                                          $data = '#include<stdio.h>
                                                  void main() {
                                                  printf ("Hello World2!\n");
                                                  printf ("This is my GALAX C");
                                                  }';
                                          ?>
                      <div align="center">
                           <div class="row">
                      <!-- แสดงข้อมูล Data โค้ดภาษา C -->
                            <textarea class="input_box form-control w3-left-align w3-left" style="font-size:16px;color:deeppink;"  
                                      NAME="data" COLS=40 ROWS=10><?php echo htmlspecialchars($data); ?></textarea>
                                      <form action="" method="post">
                                        <textarea name="testcomplie" id="" cols="30" rows="10"><?php echo $testcomplie;?></textarea>
                                        <textarea name="result" id="" cols="30" rows="10"><?php   if($testcomplie!=''){$result = system(".\c2.exe",$outputtest);} ?></textarea>
                                        <input type="submit" value="RUN" >
                                      </form>
                                      
                            </div>
                      </div><br>
    <div class="box-footer">
           <div class="w3-right"  >
           <!-- ปุ่มแสดงข้อมูลผลลัพธ์  Data โค้ดภาษา C -->
                  <button  
                      data-toggle         ="modal" 
                      data-target         ="#Modalview1" 
                      data-output1        ="<?php $my_file = 'code1.c';
                                            file_put_contents($my_file, $data);
                                            putenv("PATH=..\MinGW64\bin");
                                            exec("gcc $my_file -o .\c1.exe");
                                            system(".\c1.exe",$output1); 
                                            ?>"
                      type                ="button" 
                      class               ="btn btn-primary open-AddBookDialog1">
                      <i class="fas fa-play"></i>&nbsp;&nbsp; RUN </button>
                      <button name="cancel" type="reset" class="btn btn-danger" role="button">
                <i class="fa fa-fw fa-close">
                </i>ยกเลิก
					</button>
            </div>
      </div>
<!-- คำสั่งเรียกดูข้อมูลในแว่นขยาย -->
 <div class="modal modal-default fade" id="Modalview1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h5><font color="#F30307" ></font></h5>
        </div>                        
       <form method="post" action="">
        <div class="modal-body">
              <div class="box-body"> 
                <div class="form-group col-md-6 w3-half w3-margin-bottom w3-left-align">
                  <label for="output">ผลลัพธ์ :</label>    
                </div>   
   <div align="center">
                 <!-- กล่องแสดงข้อมูลผลลัพธ์  Data โค้ดภาษา C -->
                  <textarea style="font-size:16px;color:lightpink;" class="input_box form-control w3-left-align -align w3-left" 
                  NAME="data" COLS=50 ROWS=10>
                  <?php $my_file = 'code1.c';
                        file_put_contents($my_file, $data);
                        putenv("PATH=..\MinGW64\bin");
                        exec("gcc $my_file -o .\c1.exe");
                        system(".\c1.exe",$output1); 
                        ?></textarea>
              </div><br>
       <div class="box-footer">
           <div class="w3-right">
                <button type="button" class="btn btn-primary "  
                        data-dismiss="modal" >ปิด</button><br>
          </div>
      </div>
    </div>
  <!-- คำสั่งเรียกดูข้อมูลในแว่นขยายแสดงผลลัพธ์ภาษา C  -->
                    <script>
                        $(document).on("click", ".open-AddBookDialog1", function () {
                        var output1           = $(this).data('output1');
                        $(".modal-body #output1").val( output1);
                        $('#Modalview1').modal('show');
                        });
                    </script>
        </form>
      </div>
    </div>
  </div><br><p>


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