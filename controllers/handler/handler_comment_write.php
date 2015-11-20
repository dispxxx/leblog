<?php
	if (isset($_POST['comment']) && $_POST['comment'] != "") {
		$get_id_article = "SELECT id FROM article WHERE id='".intval($_GET['id'])."'";
		$id_article = mysqli_query($db, $get_id_article);
		if ($id_article) {
			if (strlen($_POST['comment']) <= 510) {
				$id_article = mysqli_fetch_array($id_article);
				$comment = mysqli_real_escape_string($db, $_POST['comment']);
				$commentToPost = "INSERT INTO comments (id_user,id_article,content) VALUES (".$_SESSION['id'].", ".$id_article[0].", '".$comment."')";
				$commentPosted = mysqli_query($db, $commentToPost);
				if ($commentPosted) {
					$comment="";
					header ('Location: ?page=article&id='.$id_article[0].'&success=true');
					exit;
				}
				else {
					$errors[] = mysqli_error($db);
				}
			}
			else {
				$errors[] = "comment_too_long";
			}
		}
		else {
			$errors[] = "article_not_exists";
		}
	}
?>