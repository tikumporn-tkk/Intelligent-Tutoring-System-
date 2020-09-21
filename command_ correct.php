<?php
session_start();
include 'function/connect.php';

header('Content-Type:text/html; charset=utf-8');

$id_exam    = (isset($_POST['ID_exam'])    ?   $_POST['ID_exam'] : '' );
$ID_lesson  = (isset($_POST['ID_lesson'])  ?   $_POST['ID_lesson']    : '' );
$no         = (isset($_POST['no'])         ?   $_POST['no']      : '' );

$data       = (isset($_POST['Data'])       ?   $_POST['Data']    : '' );
$time       = (isset($_POST['Time'])       ?   $_POST['Time']    : '' );
$total      = (isset($_POST['Total'])      ?   $_POST['Total']   : '' );

$session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );

// //ตรวจคำตอบ
// $score_this ;
// $sql_score = "SELECT * FROM test_command  WHERE ID_lesson = $ID_lesson AND  No  = $no";
// $result_score     = $conn->query( $sql_score );
// $row_score = $result_score->fetch_array(MYSQLI_BOTH);
// if($choice==$row_score['Answer']){
//     $score_this;
// }

//บันทึกเวลาและวันที่//
date_default_timezone_set('Asia/Bangkok');
$data=date("Y-m-d",strtotime("now"));
$time=date("H:i:s",strtotime("now"));

$sql = "INSERT INTO exam_codeing  VALUES 
			('', 
            '$no', 
            '$data', 
            '$time', 
            '$total', 
            '$score_this',
            '$session_id',
            '$ID_lesson');";
$conn->query($sql);

///เช็คว่าเป็นข้อมสุดท้ายหรือไม่
$sql_max = "SELECT max(No) AS no_max FROM test_command WHERE ID_lesson =  $ID_lesson ";
$result_max     = $conn->query( $sql_max );
$row_max = $result_max->fetch_array(MYSQLI_BOTH);

if($no==$row_max['no_max']){
    //เป็นข้อสุดท้าย
    // echo "<script language=\"JavaScript\">";
    // echo "window.location='test_choice.php?ID_lesson=$ID_lesson&no=$no';";	
    // echo "</script>";
}


$no = $no + 1;
    echo "<script language=\"JavaScript\">";
    echo "alert('ทำถูกเเล้ว !!! ได้คะแนนข้อนี้ $score_this คะแนน');";	
    echo "window.location='test_testing.php?ID_lesson=$ID_lesson&no=$no';";
    echo "</script>";

	

//  echo "<script language=\"JavaScript\">";
//  echo "alert('ทำถูกเเล้ว !!! ได้คะแนนข้อนี้ $score_this คะแนน');";	
//  echo "</script>";



?>