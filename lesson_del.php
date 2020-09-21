
<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');


			if (isset($_GET['ID_lesson'])) {
		$ID_lesson = (isset($_GET['ID_lesson']) ? $_GET['ID_lesson'] :NULL);
			if(!empty($ID_lesson)){
			$sql = "DELETE FROM lesson WHERE ID_lesson = $ID_lesson ";
			$conn->query($sql);
		}
		
		$conn->close();
		echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\manage_lesson_code.php\">";
	}
?>
