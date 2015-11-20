<?php


/*
/* Check if everything is set
*/
if (isset($_POST['id'], $_POST['category'], $_POST['title'], $_POST['thumbnail'], $_POST['content'])) {
	
	if (!is_nan($_POST['id'])) {
		$id_article = intval($_POST['id']);
	}

	/*
	/* Check if category is filled
	*/
	if ($_POST['category'] == 0) {
		$errors[]="category";
	}
	else {
		$id_category = mysqli_real_escape_string($db, $_POST['category']);
	}

	/*
	/* Check if Title is filled and length is ok
	*/
	if (strlen($_POST['title']) < 1  || strlen($_POST['title']) > 31) {
		$errors[] = "title";
	}
	else {
		$title = mysqli_real_escape_string($db, $_POST['title']);
	}

	/*
	/* Check if content is filled and length is ok
	*/
	if (strlen($_POST['content']) < 32 || strlen($_POST['content']) > 2045) {
		$errors[] = "content";
	}
	else {
		$content = mysqli_real_escape_string($db, $_POST['content']);
	}

	/*
	/* Check if thumbnail is filled and dimensions / size are ok
	*/
	if ($_POST['thumbnail'] != "")
	{
		if ( $thumbnail = @getimagesize($_POST['thumbnail']) )
		{
			if ($thumbnail[0] != 1200 || $thumbnail[1] != 300)
			{
				$errors[] = "thumbnail_dimensions";
			}
			else if (filesize($_POST['thumbnail']) > 2e6)
			{
				$errors[] = "thumbnail_size";
			}
			else
			{
				$thumbnail = mysqli_real_escape_string($db, $_POST['thumbnail']);
			}
		}
		else
		{
			$errors[] = "thumbnail_format";
		}
	}
	/*
	/* If no error, write article in database
	*/
	if (count($errors) == 0) {
		if (mysqli_query($db, "	UPDATE article
								SET title = '".$title."', content = '".$content."', id_category = ".$id_category.", thumbnail = '".$thumbnail."' 
								WHERE id='".$id_article."'"))
		{
			header('Location: ?page=article_edit&id='.$id_article.'&success=true');
			exit;
		}
		else { 
			$errors[] = mysqli_error($db);
		}
	}
}