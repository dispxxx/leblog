<?php
$id_user = intval($_SESSION['id']);

/*
/* Check rating
*/
if (isset($_POST['rating'])
	&& !is_nan($_POST['rating'])
	&& $_POST['rating'] > 0
	&& $_POST['rating'] <=5) {
	$rating = intval($_POST['rating']);
} else {
	$errors[] = 'rating_error';
}

/*
/* Check article
*/
if (isset($_POST['id_article'])
	&& !is_nan($_POST['id_article'])
	&& $_POST['id_article'] > 0) {
	$id_article = intval($_POST['id_article']);
} else {
	$errors[] = 'article_error';
}

/*
/* Query to check if user has already vote
*/
$query = mysqli_query($db, 'SELECT id
							FROM star
							WHERE id_user ='.$id_user.' AND id_article ='.$id_article);
if ($result = mysqli_fetch_assoc($query)) {
	$id_rating = $result['id'];
}
if (count($errors) == 0) {

	/*
	/* If user has voted before, update the vote
	*/
	if (isset($id_rating)) {
		if (mysqli_query($db, '	UPDATE star
								SET rating = '. $rating .'
								WHERE id = '. $id_rating)) {
			$success = true;
		} else  {
			$errors[] = 'query_error';
		}
	} else {

	/*
	/* If user never voted, create new vote
	*/
		if (mysqli_query($db, '	INSERT INTO star (id_article, id_user, rating)
								VALUES ('. $id_article .','. $id_user .','. $rating .')')) {
			$success = true;
		} else {
			$errors[] = 'query_error';
		}
	}
} else {
	var_dump($errors);
}

/*
/* Update the global rating of the article
*/
if ($success) {

	/*
	/* Update the average rating of the article
	*/
	$query = mysqli_query($db, 'SELECT AVG(rating) AS rating
								FROM star
								WHERE id_article  ='. $id_article);
	$rating = mysqli_fetch_assoc($query)['rating'];

	/*
	/* Update the rating in the article table
	*/
	if (mysqli_query($db, '	UPDATE article
							SET note ='. $rating .'
							WHERE id ='. $id_article)) {
		header('Location: ?page=article&id='. $id_article .'&success=true');
		exit;
	} else {
		$success = false;
		$errors[] = "query_error";
	}
}	