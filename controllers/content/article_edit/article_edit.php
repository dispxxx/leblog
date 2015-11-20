<?php 
if (isset($_GET['id'])) {
	$id_article = intval($_GET['id']);
} else {
	header('Location: ?page=home');
	exit;
}

if(count($errors)>0){
    for($i = 0; $i < count($errors); $i++){
        require('./views/content/article_edit/errors/'.$errors[$i].'.phtml');
    }

} elseif (count($errors) == 0 && isset($_GET['success']) && $_GET['success']=="true") {
    require('./views/content/article_edit/success/success.phtml');
}

if ($article = mysqli_fetch_assoc(mysqli_query($db, 'SELECT title, content, id_category, thumbnail
													 FROM article
													 WHERE id ='. $id_article))) 
{
	require('views/content/article_edit/article_edit.phtml');
} else {
	header('Location: ?page=home');
	exit;
}