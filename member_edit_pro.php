<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_member = (isset($_POST['ID_member'])    ?   $_POST['ID_member'] : '' );
$Firstname = (isset($_POST['Firstname'])    ?   $_POST['Firstname'] : '' );
$Lastname  = (isset($_POST['Lastname'])     ?   $_POST['Lastname']  : '' );
$Gender    = (isset($_POST['Gender'])       ?   $_POST['Gender']    : '' );
$Email     = (isset($_POST['Email'])        ?   $_POST['Email']     : '' );



$sql = "UPDATE member SET 
			Firstname = '$Firstname' ,
			Lastname  = '$Lastname' ,
			Gender    = '$Gender' ,
			Email     = '$Email' 
            WHERE ID_member  = '$ID_member' ";
         
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('แก้ไขข้อมูลประวัติส่วนตัวเรียบร้อย');";	
    echo "window.location='../professor_home.php';";	
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถแก้ไขข้อมูลประวัติส่วนตัวได้');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>