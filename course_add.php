<?php
session_start();
include 'connect.php';
$id_teacher = $_SESSION['session_id'];

header('Content-Type:text/html; charset=utf-8');

$ID_course = (isset($_POST['ID_course'])    ?   $_POST['ID_course'] : '' );
$Coursename = (isset($_POST['Coursename'])    ?   $_POST['Coursename'] : '' );
$Detail     = (isset($_POST['Detail'])        ?   $_POST['Detail']     : '' );

$sql_check = "SELECT COUNT(ID_course) AS no_course FROM course WHERE Coursename = '$Coursename' ";
$result     = $conn->query($sql_check);
$row_check = $result->fetch_array(MYSQLI_BOTH) ;
if($row_check['no_course'] > 0){
    echo "<script language=\"JavaScript\">";
    echo "alert('มีชื่อห้องเรียนอยู่แล้ว !!');";
    echo "history.go(-1);";
    echo "</script>";
}else{ 
    $sql = "INSERT INTO course  VALUES 
			('$ID_course', 
            '$Coursename', 
            '$Detail',
            '$id_teacher')";
        //  echo $sql;
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('สร้างห้องเรียนเรียบร้อย');";	
    echo "window.location='../professor_course.php';";	
    echo "</script>";

}else{ 
    echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถสร้างห้องเรียนได้!');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			
 }
?>