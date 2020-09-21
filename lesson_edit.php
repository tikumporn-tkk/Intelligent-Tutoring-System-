<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');
$ID_course      = (isset($_POST['ID_course'])    ?   $_POST['ID_course']    : '');
$ID_lesson      = (isset($_POST['ID_lesson'])    ?   $_POST['ID_lesson']    : '' );
$Lessonname     = (isset($_POST['Lessonname'])   ?   $_POST['Lessonname']   : '' );
$keyword        = (isset($_POST['keyword'])      ?   $_POST['keyword']   : '' );
$ID_Teacher     = (isset($_POST['ID_Teacher'])   ?   $_POST['ID_Teacher']   : '' );
$Detail         = (isset($_POST['Detail'])       ?   $_POST['Detail']       : '' );
$banner			= $_FILES['banner']['name']; 

$bannerpath		="../filelesson/".$banner;
move_uploaded_file($_FILES["banner"]["tmp_name"],$bannerpath);


            $sql = "UPDATE lesson SET  
                        Lessonname      ='$Lessonname',
                        keyword         ='$keyword', 
                        ID_course       ='$ID_course ',  
                        ID_Teacher      ='$ID_Teacher ', 
                        Detail          ='$Detail', 
                        Lessonfile1     ='$banner', 
                        Lessonfile2     =''
                    WHERE ID_lesson     ='$ID_lesson' ";


if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('แก้ไขข้อมูลบทเรียนเรียบร้อย');";	
    echo "window.location='../manage_lesson_code.php';";	
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถแก้ไขข้อมูลบทเรียนได้');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>