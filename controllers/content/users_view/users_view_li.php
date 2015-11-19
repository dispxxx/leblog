<?php 
if ($resultat) 
{
	while ($user = mysqli_fetch_assoc($resultat))
	{
		$query2 = "SELECT COUNT(*)
					FROM article
					WHERE id_user = ".$user['id'];
		$resultat2 = mysqli_query($db, $query2);
		$nbArticles = mysqli_fetch_assoc($resultat2);
		require('./views/content/users_view/users_view_li.phtml');
	}
}
else 
{
    $errors[] = mysqli_error($db);
}
 ?>