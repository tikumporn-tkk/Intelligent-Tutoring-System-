<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_test    = (isset($_POST['ID_test'])   ?  $_POST['ID_test']   : '' );
$No         = (isset($_POST['No'])   ?       $_POST['No']   : '' );
$Question   = (isset($_POST['Question'])   ? $_POST['Question']       : '' );
$Choice1    = (isset($_POST['Choice1'])  ?   $_POST['Choice1']  : '' );
$Choice2    = (isset($_POST['Choice2'])  ?   $_POST['Choice2']  : '' );
$Choice3    = (isset($_POST['Choice3'])  ?   $_POST['Choice3']  : '' );
$Choice4    = (isset($_POST['Choice4'])  ?   $_POST['Choice4']  : '' );
$Answer     = (isset($_POST['Answer'])  ?     $_POST['Answer']  : '' );
$ID_lesson  = (isset($_POST['ID_lesson'])  ?     $_POST['ID_lesson']  : '' );
$ID_course  = (isset($_POST['ID_course'])  ?     $_POST['ID_course']  : '' );
$ID_teacher = (isset($_POST['ID_teacher'])  ?    $_POST['ID_teacher']  : '' );
$keyword        = (isset($_POST['keyword'])        ?   $_POST['keyword']   : '' );

$sql = "INSERT INTO test_detail VALUES 
        ('$ID_test', 
        '$No', 
        '$Question', 
        '$Choice1', 
        '$Choice2', 
        '$Choice3', 
        '$Choice4', 
        '$Answer', 
        '$ID_lesson', 
        '$ID_course', 
        '$ID_teacher',
        '$keyword');";
         
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('เพิ่มข้อมูลเรียบร้อย');";	
    //echo "window.location='../professor_course_add.php?ID_lesson=$ID_lesson&ID_course=$ID_course';";	
    echo "history.go(-1);";//ย้อนกลีบไปยังหน้าก่อนหน้า แบบค่าต่างๆเหมือนเดิม
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถเพิ่มข้อมูล');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>