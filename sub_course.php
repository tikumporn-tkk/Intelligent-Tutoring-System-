<?php
session_start();
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');


$ID_regis   = (isset($_POST['ID_regis'])    ?   $_POST['ID_regis'] : '' );
$session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );
$ID_course  = (isset($_POST['ID_course'])     ?   $_POST['ID_course']  : '' );
$id = (isset($_GET['id']) ? $_GET['id'] : '');
$ID_member  = (isset($_POST['ID_member'])     ?   $_POST['ID_member']  : '' );
$status  = (isset($_POST['status'])     ?   $_POST['status']  : '' );

//บันทึกเวลาและวันที่//

$sql_c = "INSERT INTO submit_course VALUES 
			('', 
            '$ID_course',
            '$session_id', 
            '$ID_member');";
            $conn->query($sql_c);
            
            //  echo $sql ;
         
 $sql_r = "UPDATE  regis_course  SET
        status      ='$status'
        WHERE ID_member     ='$ID_member' AND ID_course =  '$ID_course'  ";

        $conn->query($sql_r);
            
  //       echo $sql ;




if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('อนุมัติคำร้องขอลงทะเบียนเรียนเรียบร้อย');";	
    // echo "window.location='../professor_course_add.php?id=".$ID_course."';";	
    echo "history.go(-1);";
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถอนุมัติคำร้องขอลงทะเบียนเรียนได้');";
    echo "history.go(-1);";
    echo "</script>";
     }echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\professor_course_add.php\">";
$conn->close();			

?>