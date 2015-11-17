<?php
	$category=$title=$content="";
	if (isset($_POST['category'], $_POST['title'], $_POST['content'])) {
		if ($_POST['category'] == 0) {
			$errors[]="category";
		}
		else {
			$category = mysqli_real_escape_string($db, $_POST['category']);
		}
		if (strlen($_POST['title']) < 1  || strlen($_POST['title']) > 31) {
			$errors[] = "title";
		}
		else {
			$title = mysqli_real_escape_string($db, $_POST['title']);
		}
		if (strlen($_POST['content']) < 32 || strlen($_POST['content']) > 2045) {
			$errors[] = "content";
		}
		else {
			$content = mysqli_real_escape_string($db, $_POST['content']);
		}
		if (count($errors) == 0) {
			$query = "INSERT INTO article (title, id_user, content, id_category) VALUES ('".$title."', '".$_SESSION['id']."', '".$content."', '".$category."')";
			$resultat = mysqli_query($db, $query);
			if ($resultat) {
				header('Location: ?page=article_write&success=true');
                exit;

			}
			else { 
				$errors[] = mysqli_error($db); 
			}
		}
	}
?>