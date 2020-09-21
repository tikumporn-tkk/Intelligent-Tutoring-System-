<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');
			if (isset($_GET['ID'])) {
		$ID = (isset($_GET['ID']) ? $_GET['ID'] : NULL);
			if(!empty($ID)){
			$sql = "DELETE FROM test_command WHERE ID = $ID ";
			$conn->query($sql);
		}
		$conn->close();
		echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\manage_test_code.php\">";
	}
?>
