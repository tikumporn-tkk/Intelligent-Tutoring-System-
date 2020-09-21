<?php
session_start();

include 'connect.php';

header('Content-Type:text/html; charset=utf-8');
$ID_Teacher     = (isset($_POST['ID_Teacher'])     ?   $_POST['ID_Teacher']   : '' );
$ID_course      = (isset($_POST['ID_course'])      ?   $_POST['ID_course']   : '' );
$Lessonname     = (isset($_POST['Lessonname'])     ?   $_POST['Lessonname']   : '' );
$keyword        = (isset($_POST['keyword'])        ?   $_POST['keyword']   : '' );
$Detail         = (isset($_POST['Detail'])         ?   $_POST['Detail']       : '' );
$banner			= $_FILES['banner']['name']; 

$bannerpath		="../filelesson/".$banner;
move_uploaded_file($_FILES["banner"]["tmp_name"],$bannerpath);
             

    $sql = "INSERT INTO lesson (ID_lesson,Lessonname,keyword,ID_course,ID_Teacher,Detail,Lessonfile1,Lessonfile2) VALUES 
            ('', 
            '$Lessonname', 
            '$keyword', 
            '$ID_course',
            '$ID_Teacher', 
            '$Detail', 
            '$banner', 
            '');";

if ($conn->query($sql) === TRUE) {
                echo "<script language=\"JavaScript\">";
                echo "alert('เพิ่มข้อมูลบทเรียนเรียบร้อย');";
                echo "window.location='../manage_lesson_code.php';";		
                echo "</script>";
            
        }
            else{ 
                echo "<script language=\"JavaScript\">";
                echo "alert('ไม่สามารถเพิ่มข้อมูลบทเรียน');";
                echo "history.go(-1);";
                echo "</script>";
                }
            $conn->close();			
    
?>
