
<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');
			if (isset($_GET['ID_regis'])) {
        $ID_regis = (isset($_GET['ID_regis']) ? $_GET['ID_regis'] : NULL);
        $id = (isset($_GET['id']) ? $_GET['id'] : NULL);
			if(!empty($ID_regis)){
			$sql = "DELETE FROM regis_course WHERE ID_regis = $ID_regis ";
			$conn->query($sql);
		}
		$conn->close();
		echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\professor_course_add.php?id_course=$id\">";
	}
?>
