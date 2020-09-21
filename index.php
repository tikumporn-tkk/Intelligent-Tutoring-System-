<?php
    session_start();

    echo    $_SESSION['session_id']."<br>";
    echo    $_SESSION['session_username']."<br>";
    echo    $_SESSION['session_type']."<br>";
    echo    $_SESSION['session_firstname']."<br>";
    echo    $_SESSION['session_lastname']."<br>";
    echo    $_SESSION['session_gender']."<br>";
    
    if($_SESSION['session_id']!=''){

       echo "เข้าระบบสำเร็จ";



    }else{
        header("Location:login.php");
    }


?>