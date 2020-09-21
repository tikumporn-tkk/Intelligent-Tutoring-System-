
<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');

            $ID_course      = (isset($_POST['ID_course'])      ?   $_POST['ID_course']   : '' );

			if (isset($_GET['ID_course'])) {
		    $ID_course = (isset($_GET['ID_course']) ? $_GET['ID_course'] :NULL);
			if(!empty($ID_course)){

				$sql_1 = "DELETE FROM course        WHERE ID_course = $ID_course ";
				$conn->query($sql_1);
				$sql_2 = "DELETE FROM lesson        WHERE ID_course = $ID_course ";
				$conn->query($sql_2);
				$sql_3 = "DELETE FROM test_command  WHERE ID_course = $ID_course ";
				$conn->query($sql_3);
				$sql_4 = "DELETE FROM test_detail   WHERE ID_course = $ID_course ";
				$conn->query($sql_4);
				$sql_5 = "DELETE FROM exam          WHERE ID_course = $ID_course ";
				$conn->query($sql_5);
				$sql_6 = "DELETE FROM exam_codeing  WHERE ID_course = $ID_course ";
				$conn->query($sql_6);
				$sql_7 = "DELETE FROM submit_course WHERE ID_course = $ID_course ";
				$conn->query($sql_7);
				$sql_8 = "DELETE FROM regis_course  WHERE ID_course = $ID_course ";
				$result = $conn->query($sql_8);
				if($result){

				}else{

				}
	
			
		}
		
		$conn->close();
		echo "<meta http-equiv=\"Refresh\" content=\"0; url=..\professor_course.php\">";
		
	}
?>
