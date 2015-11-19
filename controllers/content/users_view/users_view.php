<?php 
$query = "SELECT user.id, user.surname, article.id_user AS article_author
FROM user
LEFT JOIN article ON user.id = article.id_user
LIMIT 0 , 30";
$resultat = mysqli_query($db, $query);

$query = "SELECT COUNT(*)
FROM article
WHERE id_user = '" . $_GET['id'] . "'";
$resultat2 = mysqli_query($db, $query);
$nbArticles = mysqli_fetch_assoc($resultat2);

if ($resultat) 
{
	while ($user = mysqli_fetch_assoc($resultat))
	{
		require('./views/content/users_view/users_view.phtml');
	}
}
else 
{
    $errors[] = mysqli_error($db);
}
?>