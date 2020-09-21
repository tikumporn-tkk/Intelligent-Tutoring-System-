<?php
session_start();
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');


$ID_regis   = (isset($_POST['ID_regis'])    ?   $_POST['ID_regis'] : '' );
$session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );
$ID_course  = (isset($_POST['ID_course'])     ?   $_POST['ID_course']  : '' );
$status  = (isset($_POST['status'])     ?   $_POST['status']  : '' );
$data       = (isset($_POST['data'])     ?   $_POST['data']  : '' );
$time       = (isset($_POST['time'])     ?   $_POST['time']  : '' );


//บันทึกเวลาและวันที่//
date_default_timezone_set('Asia/Bangkok');
$data=date("Y-m-d",strtotime("now"));
$time=date("H:i:s",strtotime("now"));

$sql_s = "SELECT count(ID_regis) AS count_regis FROM regis_course WHERE ID_member = '$session_id' AND ID_course = '$ID_course' ";
$result = $conn->query($sql_s);
$row_select = $result->fetch_array(MYSQLI_BOTH);
if($row_select['count_regis'] > 0){
    echo "<script language=\"JavaScript\">";
        echo "alert('ผู้ใช้มีการลงทะเบียนเรียนอยู่แล้ว ไม่สามารถลงทะเบียนเรียนซ้ำได้');";
        echo "history.go(-1);";
        echo "</script>";
        echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\std_index.php\">";

}else {
    $sql = "INSERT INTO regis_course VALUES 
                ('', 
                '$session_id', 
                '$ID_course',
                '$status', 
                '$data' , 
                '$time');";
   // $conn->query($sql);
            
        //  echo $sql ;
    if ($conn->query($sql) === TRUE) {
        echo "<script language=\"JavaScript\">";
        echo "alert('ลงทะเบียนเรียนเรียบร้อย');";	
        echo "window.location='../std_index.php';";	
        echo "</script>";

    }else{ echo "<script language=\"JavaScript\">";
        echo "alert('ไม่สามารถลงทะเบียนเรียนได้');";
        echo "history.go(-1);";
        echo "</script>";
        }echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\std_index.php\">";
    $conn->close();	
 }
	

?>