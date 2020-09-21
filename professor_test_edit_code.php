<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

$ID         = (isset($_POST['ID'])         ? $_POST['ID']   : '' );
$No         = (isset($_POST['No'])         ? $_POST['No']   : '' );
$ID_lesson  = (isset($_POST['ID_lesson'])  ? $_POST['ID_lesson']  : '' );
$Question   = (isset($_POST['Question'])   ? $_POST['Question']   : '' );
$Ex_code    = (isset($_POST['Ex_code'])    ? $_POST['Ex_code']  : '' );
$Answer     = (isset($_POST['Answer'])     ? $_POST['Answer']  : '' );
$Hint1      = (isset($_POST['Hint1'])      ? $_POST['Hint1']  : '' );
$Hint2      = (isset($_POST['Hint2'])      ? $_POST['Hint2']  : '' );
$Hint3      = (isset($_POST['Hint3'])      ? $_POST['Hint3']  : '' );
$ID_course  = (isset($_POST['ID_course'])      ? $_POST['ID_course']  : '' );
$ID_teacher = (isset($_POST['ID_teacher'])      ? $_POST['ID_teacher']  : '' );
$keyword        = (isset($_POST['keyword'])        ?   $_POST['keyword']   : '' );


$sql = "UPDATE test_command SET 
			No           = '$No' ,
            ID_lesson    = '$ID_lesson' ,
			Question     = '$Question' ,
            Ex_code      = '$Ex_code' ,
            Answer       = '$Answer' ,
            Hint1        = '$Hint1' ,
            Hint2        = '$Hint2' ,
            Hint3        = '$Hint3',
            ID_course    ='$ID_course',
            ID_teacher   ='$ID_teacher',
            keyword      ='$keyword'  
            WHERE ID     = '$ID' ";

$sql_test = "SELECT * FROM test_command WHERE  ID_course = '$ID_course' ";
$result_test     = $conn->query( $sql_test );
$row_test= $result_test->fetch_array(MYSQLI_BOTH);

$ID  = $row_test['ID'];
         
if ($conn->query($sql) === TRUE) {
    echo "<script language=\"JavaScript\">";
    echo "alert('แก้ไขข้อมูลแบบทดสอบเรียบร้อย');";	
    // echo "window.location='../professor_course_add.php?id=$ID_course';";	
    echo "history.go(-1);";
    echo "</script>";

}else{ echo "<script language=\"JavaScript\">";
    echo "alert('ไม่สามารถแก้ไขข้อมูลแบบทดสอบ');";
    echo "history.go(-1);";
    echo "</script>";
     }
$conn->close();			

?>