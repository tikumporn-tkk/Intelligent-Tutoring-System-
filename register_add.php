<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_member = (isset($_POST['ID_member'])    ?   $_POST['ID_member'] : '' );
$Firstname = (isset($_POST['Firstname'])    ?   $_POST['Firstname'] : '' );
$Lastname  = (isset($_POST['Lastname'])     ?   $_POST['Lastname']  : '' );
$Gender    = (isset($_POST['Gender'])       ?   $_POST['Gender']    : '' );
$School    = (isset($_POST['School'])       ?   $_POST['School']    : '' );
$Email     = (isset($_POST['Email'])        ?   $_POST['Email']     : '' );
$Password  = (isset($_POST['Password'])     ?   $_POST['Password']  : '' );
$ID_type   = (isset($_POST['ID_type'])      ?   $_POST['ID_type']   : '' );
$Password   = md5($Password);
$sql_check = "SELECT COUNT(ID_member) AS no_member FROM member WHERE Email = '$Email' OR (Firstname  = '$Firstname' AND Lastname= '$Lastname') ";
$result     = $conn->query($sql_check);
$row_check = $result->fetch_array(MYSQLI_BOTH) ;
if($row_check['no_member'] > 0){
    echo "<script language=\"JavaScript\">";
    echo "alert('E-Mail หรือ ชื่อผู้ใช้ มีการใช้งานแล้ว !!');";
    echo "history.go(-1);";
    echo "</script>";
}else{
    $sql = "INSERT INTO member VALUES 
    ('$ID_member', 
    '$Firstname', 
    '$Lastname', 
    '$Gender', 
    '$School ',
    '$Email', 
    '$Password',
    '$ID_type');";
 
    if ($conn->query($sql) === TRUE) {
        echo "<script language=\"JavaScript\">";
        echo "alert('สมัครสมาชิกเรียบร้อย');";	
        echo "window.location='../login.php';";		
        echo "</script>";

    }else{
        echo "<script language=\"JavaScript\">";
        echo "alert('ไม่สามารถสมัครสมาชิกได้');";
        echo "history.go(-1);";
        echo "</script>";
    }
    $conn->close();	   
}
		

?>