<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');
			if (isset($_GET['ID_test'])) {
		$ID_test = (isset($_GET['ID_test']) ? $_GET['ID_test'] : NULL);
			if(!empty($ID_test)){
			$sql = "DELETE FROM test_detail WHERE ID_test = $ID_test ";
			$conn->query($sql);
		}
		$conn->close();
		echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\manage_test.php\">";
	}
?>
