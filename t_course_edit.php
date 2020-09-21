<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_course = (isset($_POST['ID_course'])    ?   $_POST['ID_course'] : '' );
$Coursename = (isset($_POST['Coursename'])    ?   $_POST['Coursename'] : '' );
$Detail     = (isset($_POST['Detail'])        ?   $_POST['Detail']     : '' );


$sql = "UPDATE course SET 
			Coursename       = '$Coursename' ,
			Detail           = '$Detail' 
            WHERE ID_course  = '$ID_course' ";

         
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('แก้ไขข้อมูลเกี่ยวกับชั้นเรียนเรียบร้อย');";	
    // echo "window.location='../professor_course_add.php?id=$ID_course';";
    echo "history.go(-1);";	
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถแก้ไขข้อมูลเกี่ยวกับชั้นเรียนได้');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>