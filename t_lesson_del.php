
<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

			 $ID_lesson      = (isset($_GET['ID_lesson'])      ?   $_GET['ID_lesson']   : '' );
			 $ID_course      = (isset($_GET['id_course'])      ?   $_GET['id_course']   : '' );

			if ( $ID_lesson != '') {
				

					$sql = "DELETE FROM lesson WHERE ID_lesson = $ID_lesson ";
					$conn->query($sql);
					$sql_3 = "DELETE FROM test_command  WHERE ID_lesson = $ID_lesson ";
					$conn->query($sql_3);
					$sql_4 = "DELETE FROM test_detail   WHERE ID_lesson = $ID_lesson ";
					$conn->query($sql_4);
					$sql_5 = "DELETE FROM exam          WHERE ID_lesson = $ID_lesson ";
					$conn->query($sql_5);
					$sql_6 = "DELETE FROM exam_codeing  WHERE ID_lesson = $ID_lesson ";
					$conn->query($sql_6);
					$result = $conn->query($sql_6);
				if($result){

				}else{

				}
	
			
		}
		
	$conn->close();
    echo "<meta http-equiv=\"Refresh\" content=\"0; url=..\professor_course_add.php?id_course=$ID_course\">";
		
?>
