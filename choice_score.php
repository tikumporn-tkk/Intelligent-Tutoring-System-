<?php
session_start();
include 'function/connect.php';

header('Content-Type:text/html; charset=utf-8');


$id_exam    = (isset($_POST['ID_exam'])    ?   $_POST['ID_exam'] : '' );
$ID_lesson  = (isset($_POST['ID_lesson'])  ?   $_POST['ID_lesson']    : '' );
$no         = (isset($_POST['no'])         ?   $_POST['no']      : '' );
$choice     = (isset($_POST['choice'])     ?   $_POST['choice']      : '' );
$ID_course  = (isset($_POST['ID_course'])     ?   $_POST['ID_course']      : '' );

$data       = (isset($_POST['Data'])       ?   $_POST['Data']    : '' );
$time       = (isset($_POST['Time'])       ?   $_POST['Time']    : '' );
$total      = (isset($_POST['Total'])      ?   $_POST['Total']   : '' );

$session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );

//ตรวจคำตอบ
$score = 0;
$sql_score = "SELECT * FROM test_detail  WHERE 	ID_lesson = $ID_lesson AND  No  = $no AND  ID_course  = $ID_course";
$result_score     = $conn->query( $sql_score );
$row_score = $result_score->fetch_array(MYSQLI_BOTH);
if($choice==$row_score['Answer']){
    $score = 1;
}

//บันทึกเวลาและวันที่//
date_default_timezone_set('Asia/Bangkok');
$data=date("Y-m-d",strtotime("now"));
$time=date("H:i:s",strtotime("now"));

$sql_check = "SELECT COUNT(No) AS count_check FROM exam WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course AND ID_member =$session_id AND no =$no";
$result_check     = $conn->query( $sql_check );
$row_check = $result_check->fetch_array(MYSQLI_BOTH);
if ($row_check['count_check']==0){
    $sql = "INSERT INTO exam  VALUES 
			('', 
            '$no', 
            '$data', 
            '$time', 
            '$total', 
            '$score',
            '$session_id',
            '$ID_lesson',
            '$ID_course');";
$conn->query($sql);
}



///เช็คว่าเป็นข้อสุดท้ายหรือไม่
$sql_max = "SELECT max(No) AS no_max FROM test_detail WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course";
$result_max     = $conn->query( $sql_max );
$row_max = $result_max->fetch_array(MYSQLI_BOTH);


if($no==$row_max['no_max']){
    //เป็นข้อสุดท้าย
    echo "<script language=\"JavaScript\">";
    echo "alert('ทำข้อสอบช้อยเรียบร้อย!!! ');";
    echo "window.location='show_score_choice.php?ID_lesson=$ID_lesson&no=$no&ID_course=$ID_course';";	
    echo "</script>";
    $_SESSION['session_choice'] = 1;
}else{
//บันทึกข้อปัจจุบัน
$no = $no + 1;
$_SESSION['session_choice'] = $no;

}
    echo "<script language=\"JavaScript\">";
    echo "window.location='test_choice.php?ID_lesson=$ID_lesson&no=$no&ID_course=$ID_course';";	
    echo "</script>";

	

?>
