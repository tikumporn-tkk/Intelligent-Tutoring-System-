<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_member = (isset($_POST['ID_member'])    ?   $_POST['ID_member'] : '' );
$Firstname = (isset($_POST['Firstname'])    ?   $_POST['Firstname'] : '' );
$Lastname  = (isset($_POST['Lastname'])     ?   $_POST['Lastname']  : '' );
$Gender    = (isset($_POST['Gender'])       ?   $_POST['Gender']    : '' );
$School    = (isset($_POST['School'])       ?   $_POST['School']     : '' );
$Email     = (isset($_POST['Email'])        ?   $_POST['Email']     : '' );
$ID_type   = (isset($_POST['ID_type'])      ?   $_POST['ID_type']   : '' );


$sql = "UPDATE member SET 
			Firstname = '$Firstname' ,
			Lastname  = '$Lastname' ,
			Gender    = '$Gender' ,
            School    = '$School',
			Email     = '$Email' ,
			ID_type   = '$ID_type'
            WHERE ID_member  = '$ID_member' ";
         
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('แก้ไขข้อมูลสมาชิกเรียบร้อย');";	
    echo "window.location='../manage_member.php';";	
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถแก้ไขข้อมูลสมาชิกได้');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>