<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_lesson      = (isset($_GET['ID_lesson'])      ?   $_GET['ID_lesson']   : '' );
$ID_test      = (isset($_GET['ID_test'])      ?   $_GET['ID_test']   : '' );
$ID_course      = (isset($_GET['id_course'])      ?   $_GET['id_course']   : '' );

if ( $ID_test != '') {
				

	$sql = "DELETE FROM test_detail WHERE ID_test = $ID_test ";
	$conn->query($sql);

}
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('ลบข้อมูลแบบทดสอบเรียบร้อย');";	
    echo "history.go(-1);";
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถลบข้อมูลแบบทดสอบ');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>
