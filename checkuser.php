<?php
session_start();
include 'connect.php';


header('Content-Type: text/html; charset=utf-8');		
$username   = (isset($_POST['username']) ? $_POST['username'] : '');
$pass_user  = (isset($_POST['password']) ? $_POST['password'] : '');
$pass_user   = md5($pass_user);

$id      = '';
$pass_db = '';
$sql        = "SELECT * FROM member WHERE 	Email = '$username' AND Password = '$pass_user' ";
// echo $sql;
$result     = $conn->query( $sql );
while( $row = $result->fetch_array(MYSQLI_BOTH) ){
    $id      = $row['ID_member'];
    $pass_db = $row['Password'];
    $pass_firstname = $row['Firstname'];
    $pass_lastname  = $row['Lastname'];
    $pass_gender    = $row['Gender'];
    $pass_school    = $row['School'];
    $pass_id_type   = $row['ID_type'];
    
}


if($pass_db!=''){
    //หาชื่อผู้ใช้เจอ
    if($pass_db==$pass_user){
        $_SESSION['session_id']                 = (isset($id)                   ? $id               : '');
        $_SESSION['session_username']           = (isset($username)             ? $username         : '');
        $_SESSION['session_type']               = (isset($pass_id_type)         ? $pass_id_type     : '');
        $_SESSION['session_firstname']          = (isset($pass_firstname)       ? $pass_firstname   : '');
        $_SESSION['session_lastname']           = (isset($pass_lastname)        ? $pass_lastname    : '');
        $_SESSION['session_gender']             = (isset($pass_gender)          ? $pass_gender      : '');
        $_SESSION['session_school']             = (isset($pass_school)          ? $pass_school      : '');
        $_SESSION['session_choice']             = 1;
        if( $_SESSION['session_type']=="1"){
            header("Location:../professor_home.php");
        }else if( $_SESSION['session_type']=="2"){
            header("Location:../std_index.php");
        }else if( $_SESSION['session_type']=="3"){
            header("Location:../manage_member.php");
        }

    }else{
        //รหัสผ่านไม่ถูกต้อง
        echo "<script language=\"JavaScript\">";
        echo "alert('รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง');";
        echo "history.go(-1);";
        echo "</script>";
    }

    
}else{
    //หาชื่อผู้ใช้ไม่เจอ
    echo "<script language=\"JavaScript\">";
    echo "alert('ชื่อผู้ใช้ไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง');";
    echo "history.go(-1);";
    echo "</script>";
}

?>