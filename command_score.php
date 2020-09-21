<?php

include 'function/connect.php';

header('Content-Type:text/html; charset=utf-8');

// $ID_course     = (isset($_POST['ID_course'])     ?   $_POST['ID_course']      : '' );
// $id_exam        = (isset($_POST['ID_exam'])     ?   $_POST['ID_exam'] : '' );
// $id_test        = (isset($_POST['ID_test'])     ?   $_POST['ID_test'] : '' );
// $data           = (isset($_POST['Data'])        ?   $_POST['Data']  : '' );
// $time           = (isset($_POST['Time'])        ?   $_POST['Time']    : '' );
// $total          = (isset($_POST['Total'])       ?   $_POST['Total']     : '' );
// $score          = (isset($_POST['Score'])       ?   $_POST['Score']  : '' );
// $ID_lesson      = (isset($_POST['ID_lesson'])   ?   $_POST['ID_lesson']   : '' );

$session_id     = (isset($_SESSION['session_id'])   ?   $_SESSION['session_id']   : '' );


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


///เช็คว่าเป็นข้อสุดท้ายหรือไม่
$sql_max = "SELECT max(No) AS no_max FROM test_command WHERE ID_lesson =  $ID_lesson AND  ID_course  = $ID_course";
$result_max     = $conn->query( $sql_max );
$row_max = $result_max->fetch_array(MYSQLI_BOTH);

if($no==$row_max['no_max']){
    //เป็นข้อสุดท้าย
    // echo "<script language=\"JavaScript\">";
    // echo "alert('ทำถูกเเล้ว !!! ได้คะแนนข้อนี้ $score_this คะแนน');";
    // echo "</script>";
    echo "<script language=\"JavaScript\">";
    echo "alert('ทำถูกเเล้ว !!! ได้คะแนนข้อนี้ $score_this คะแนน ทำข้อสอบปฏิบัติเรียบร้อย!!! ');";
    echo "window.location='test_testing.php?ID_lesson=$ID_lesson&no=$no&ID_course=$ID_course&testcomplie=$testcomplie';";	
    echo "</script>";
    $_SESSION['session_choice'] = 1;
    $no = $no +1;
}else{
    //บันทึกข้อปัจจุบัน
    $no = $no +1;
    $_SESSION['session_choice'] = $no;
    
    }
        echo "<script language=\"JavaScript\">";
        echo "alert('ทำถูกเเล้ว !!! ได้คะแนนข้อนี้ $score_this คะแนน');";
        echo "</script>";
    

// // $no = $no + 1;
//     echo "<script language=\"JavaScript\">";
//     echo "alert('ทำถูกเเล้ว !!! ได้คะแนนข้อนี้ $score_this คะแนน');";
//     // echo "window.location='test_testing.php?ID_lesson=$ID_lesson&no=$no&ID_course=$ID_course";	
//     echo "</script>";
		

?>