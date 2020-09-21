<?php
    session_start();
  include 'function/connect.php';
    if($_SESSION['session_id']!=''){
    $session_id =  $_SESSION['session_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'component/head.php';
    ?>

<style>
/*     
@media print {
	body {-webkit-print-color-adjust: exact;} 
	.hideWhenPrint {
	  display: none;
	}
} */

</style>

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
    include 'component/menu_tch.php';
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
      </h1>
    </section>
    <?php $student =  (isset($_POST['example1_length'])? $_POST['example1_length']: 0); ?>
    <!-- Main content -->
    <section class="content">
      <!-- ส่วนของเนื้อหาเเต่ละหน้า -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">ข้อมูลรายงานผล</h3>
                    </div>
                    <!-- /.box-header -->
            
            <div class="box-header with-border">

            <div class="row no-print">
            <?php if($student!=0){
              
              ?>
        <div class="col-xs-12">
        <a href="../mPDF/report.php?student=<?php echo $student?>" onclick="basicPopup(this.href);return false" class="btn btn-danger pull-right"><i class="fa  fa-file-pdf-o"></i>&nbsp;PDF</a>
          <a href="../mPDF/excel.php?student=<?php echo $student?>" target="_blank" class="btn btn-success pull-right" style="margin-right: 5px;">
            <i class="fa  fa-file-excel-o"></i>&nbsp; Excel</a> 
        
        </div>
        <?php
            }
            ?>
      </div>
      
            </div>
            <div id="container">
            <!-- /.box-header -->
            <div class="box-body">
      
            <h5 for="inputEmail3"  class="col-sm-2 control-label">กรุณาเลือกชื่อผู้ใช้</h5>
            <div class="col-md-2">
            <form action="report_table.php" method="post" name="form0" >
            <select name="example1_length" class="form-control input-sm" aria-controls="example1" onchange="Javascript : submit();">
            <option value="0">---กรุณาเลือก---</option>
            <?php
              $sql_member = "SELECT * FROM  member WHERE ID_type = '2'";
              $result_member     = $conn->query( $sql_member );
              $i=0;
              
                 while( $row_member = $result_member->fetch_array(MYSQLI_BOTH) ){
                   $selected =  ($_POST['example1_length']==$row_member['ID_member'])?'selected' : '';
            ?>
                <option value="<?php echo $row_member['ID_member']; ?>" <?php echo $selected ; ?> ><?php echo $row_member['Firstname']." ".$row_member['Lastname']; ?></option>
                 <?php } ?>
                 </select>
                 </form>
                </div>

               


              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">ลำดับ</th>
                  <th>รายละเอียด</th>
                  <th align="center" style="width: 100px" >คะแนนที่ได้</th>
                  <th align="center" style="width: 100px" >คิดเป็นเป็นเปอร์เซ็น</th>
                  
                </tr>
               
                <?php

                $where_type = "WHERE ID_teacher = ".$_SESSION['session_id'];
                 $sql_course = "SELECT * FROM course $where_type ";
                 $result_course     = $conn->query( $sql_course );
                 $i=1;
                    while( $row_course = $result_course->fetch_array(MYSQLI_BOTH) ){
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row_course['Coursename'] ?></td>
                        <td>
                            <!-- <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div> -->
                        </td>
                        <td>
                            <!-- <span class="badge bg-red">55%</span> -->
                        </td>
                    </tr>

                        <?php 
                        $ID_teacher = $row_course['ID_teacher'];
                        $ID_course = $row_course['ID_course'];
                        $sql_lesson = "SELECT * FROM lesson WHERE ID_teacher = '$ID_teacher' AND ID_course = '$ID_course' ";
                        $result_lesson      = $conn->query( $sql_lesson  );
                        $ii=1;
                        while( $row_lesson  = $result_lesson ->fetch_array(MYSQLI_BOTH) ){
                            for($iii = 1;$iii <= 2 ; $iii++){
                                if($iii==1){
                                    $ID_lesson = $row_lesson['ID_lesson'];
                                    $sql_test_detail = "SELECT COUNT(ID_test) AS full_score FROM test_detail  WHERE ID_teacher = '$ID_teacher' AND ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                                    $result_test_detail      = $conn->query( $sql_test_detail  );
                                    $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);
    
                                    $sql_exam = "SELECT SUM(Score) AS total_score FROM exam  WHERE ID_course = '$ID_course' AND ID_lesson = '$ID_lesson' AND ID_member = '$student'";
                                    $result_exam      = $conn->query( $sql_exam  );
                                    $row_exam  = $result_exam ->fetch_array(MYSQLI_BOTH);
                                    $title =  " (ปรนัย)";
                                    if($row_test_detail['full_score']!=0){
                                        $score = (($row_exam['total_score']*100)/$row_test_detail['full_score']);
                                    }else{
                                        $score = 0;
                                    }
                            
                                }else {
                                    $ID_lesson = $row_lesson['ID_lesson'];
                                    $sql_test_detail = "SELECT COUNT(ID) AS full_score FROM test_command  WHERE  ID_course = '$ID_course' AND ID_lesson = '$ID_lesson'";
                                    $result_test_detail      = $conn->query( $sql_test_detail  );
                                    $row_test_detail  = $result_test_detail ->fetch_array(MYSQLI_BOTH);
    
                                    $sql_exam = "SELECT SUM(Score) AS total_score FROM exam_codeing  WHERE ID_course = '$ID_course' AND ID_lesson = '$ID_lesson' AND ID_member = '$student'";
                                    $result_exam      = $conn->query( $sql_exam  );
                                    $row_exam  = $result_exam ->fetch_array(MYSQLI_BOTH);
                                    $title =   " (อัตนัย)";
                                    if($row_test_detail['full_score']!=0){
                                        $score = (($row_exam['total_score']*100)/($row_test_detail['full_score']*10));
                                    }else{
                                        $score = 0;
                                    }                 
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $row_lesson['Lessonname'].$title ?></td>
                                    
                                    <td>
                                        <span class="badge bg-red pull-right" ><?php echo number_format($row_exam['total_score'],2) ?></span>
                                    </td>
                                    <td style="width: 150px" >
                                        <div class="progress progress-xs">
                                        <div class="progress-bar progress-bar-danger" title="<?php echo number_format($score,2) ?>%" style="width: <?php echo number_format($score,2) ?>%"></div>
                                        </div>
                                    </td>
                                </tr>

                        <?php
                            }
                        ?>
                        
                        <?php } ?>
                 <?php } ?>
               
              </table>
            </div>
          </div>
                </div>
            </div>
            <?php
             ?>
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




<script>

// function submit(){
//     form0.submit();
// }
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

//   function PrintDiv() {
//         var divToPrint = document.getElementById('container'); // เลือก div id ที่เราต้องการพิมพ์
// 	var html =  '<html>'+ // 
// 				'<head>'+
// 					'<link href="css/print.css" rel="stylesheet" type="text/css">'+
// 				'</head>'+
// 					'<body onload="window.print(); window.close();">' + divToPrint.innerHTML + '</body>'+
// 				'</html>';
				
// 	var popupWin = window.open();
// 	popupWin.document.open();
// 	popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
// 	popupWin.document.close();	
// }

// Popup window function
function basicPopup(url) {
popupWindow = window.open(url,'popUpWindow','height=500,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
	}


 
</script>


</body>
</html>
<?php
}else{
        header("Location:login.php");
    }
?>