
<?php
	if (isset($_POST['comment']) && $_POST['comment'] != "") {
		$commentToPost = "INSERT INTO comments (id_user,id_article,content) VALUES ('".$_SESSION['id']."', '".$_GET['id']."', '".$_POST['comment']."')";
		$commentPosted = mysqli_query($db, $commentToPost);
		if ($commentPosted) {
			header ('Location: ?page=article&id='.intval($_GET['id'].''));
			exit;
		}
	}

