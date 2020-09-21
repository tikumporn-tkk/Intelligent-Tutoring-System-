<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_member = (isset($_POST['ID_member'])    ?   $_POST['ID_member'] : '' );
$Firstname = (isset($_POST['Firstname'])    ?   $_POST['Firstname'] : '' );
$Lastname  = (isset($_POST['Lastname'])     ?   $_POST['Lastname']  : '' );
$Gender    = (isset($_POST['Gender'])       ?   $_POST['Gender']    : '' );
$School    = (isset($_POST['School'])       ?   $_POST['School']     : '' );
$Email     = (isset($_POST['Email'])        ?   $_POST['Email']     : '' );
$Password  = (isset($_POST['Password'])     ?   $_POST['Password']  : '' );
$ID_type   = (isset($_POST['ID_type'])      ?   $_POST['ID_type']   : '' );


$sql = "INSERT INTO member VALUES 
			('$ID_member', 
            '$Firstname', 
            '$Lastname', 
            '$Gender', 
            '$School',
            '$Email', 
            '$Password',
            '$ID_type');";
         
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('เพิ่มข้อมูลสมาชิกเรียบร้อย');";	
    echo "window.location='../manage_member.php';";	
    echo "</script>";

}else{ 
    
    echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถเพิ่มข้อมูลสมาชิกได้!');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>