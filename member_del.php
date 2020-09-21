
<?php
include 'connect.php';

header('Content-Type:text/html; charset=utf-8');
			if (isset($_GET['ID_member'])) {
		$ID_member = (isset($_GET['ID_member']) ? $_GET['ID_member'] : NULL);
			if(!empty($ID_member)){
			$sql = "DELETE FROM member WHERE ID_member = $ID_member ";
			$conn->query($sql);
		}
		$conn->close();
		echo "<meta http-equiv=\"Refresh\" content=\"1; url=..\manage_member.php\">";
	}
?>
