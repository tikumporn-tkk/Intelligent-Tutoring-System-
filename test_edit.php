<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID_test            = (isset($_POST['ID_test'])      ?   $_POST['ID_test'] : '' );
$No                 = (isset($_POST['No'])           ?   $_POST['No']  : '' );
$Question           = (isset($_POST['Question'])     ?   $_POST['Question']    : '' );
$Choice1            = (isset($_POST['Choice1'])      ?   $_POST['Choice1']     : '' );
$Choice2            = (isset($_POST['Choice2'])      ?   $_POST['Choice2']   : '' );
$Choice3            = (isset($_POST['Choice3'])      ?   $_POST['Choice3']   : '' );
$Choice4            = (isset($_POST['Choice4'])      ?   $_POST['Choice4']   : '' );
$Answer             = (isset($_POST['Answer'])       ?   $_POST['Answer']   : '' );
$ID_lesson          = (isset($_POST['ID_lesson'])    ?   $_POST['ID_lesson']  : '' );
$ID_course          = (isset($_POST['ID_course'])    ?   $_POST['ID_course']  : '' );
$ID_teacher         = (isset($_POST['ID_teacher'])   ?   $_POST['ID_teacher']  : '' );
$keyword        = (isset($_POST['keyword'])        ?   $_POST['keyword']   : '' );

$sql = "UPDATE test_detail SET 
			ID_test           = '$ID_test' ,
			No                = '$No' ,
			Question          = '$Question' ,
			Choice1           = '$Choice1' ,
            Choice2           = '$Choice2' ,
            Choice3           = '$Choice3' ,
            Choice4           = '$Choice4' ,
            Answer            = '$Answer' ,
            ID_lesson         = '$ID_lesson' ,
            ID_course         = '$ID_course' ,
			ID_teacher        = '$ID_teacher',
            keyword           = '$keyword'
            WHERE ID_test     = '$ID_test' ";
         
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('แก้ไขข้อมูลแบบทดสอบเรียบร้อย');";	
    echo "window.location='../manage_test.php';";	
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถแก้ไขข้อมูลแบบทดสอบ');";
    echo "history.go(-1);";
    echo "</script>";
     }echo "<meta http-equiv=\"Refresh\" content=\"1; url=Edit_test.php\">";
$conn->close();			

?>