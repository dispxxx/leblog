<?php 
$query = "SELECT user.surname AS user_surname, comments.content AS comments_content, comments.date_published AS comments_date 
FROM comments
LEFT JOIN article ON comments.id_article = article.id
LEFT JOIN user ON comments.id_user = user.id
WHERE comments.id_article = '". $_GET['id'] ."'";
$resultat = mysqli_query($db, $query);
while ($article = mysqli_fetch_assoc($resultat))
{
	require('./views/content/article/article_comment_list/article_comment_list.phtml');
}
?>