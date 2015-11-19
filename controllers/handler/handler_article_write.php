<?php
$category=$title=$content="";

/*
/* Check if everything is set
*/
if (isset($_POST['category'], $_POST['title'], $_POST['thumbnail'], $_POST['content'])) {
	
	/*
	/* Check if category is filled
	*/
	if ($_POST['category'] == 0) {
		$errors[]="category";
	}
	else {
		$category = mysqli_real_escape_string($db, $_POST['category']);
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
			if ($thumbnail[0] > 2400 || $thumbnail[0] < 600 || $thumbnail[1] > 600 || $thumbnail[1] < 150 )
			{
				$errors[] = "thumbnail_dimensions";
			}
			else if (filesize($_POST['thumbnail']) > 26000)
			{
				$errors[] = "thumbnail_size";
			}
			else
			{
				$thumbnail = mysqli_real_escape_string($db, $_POST['thumbnail']);
				$change=true;
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
		if (mysqli_query($db, "	INSERT INTO article
								(title, id_user, content, id_category, thumbnail)
								VALUES ('".$title."', '".$_SESSION['id']."', '".$content."', '".$category."', '".$thumbnail."')"))
		{
			header('Location: ?page=article_write&success=true');
			exit;
		}
		else { 
			$errors[] = mysqli_error($db); 
		}
	}
}