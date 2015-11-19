<?php
	$commentToDelete = "DELETE FROM comments WHERE id='".$_POST['id']."'";
	$commentDeleted = mysqli_query($db, $commentToDelete);
	if ($commentDeleted) {
	header ("Location: ?page=article&id=".intval($_GET['id']));
	exit;
	}
?>