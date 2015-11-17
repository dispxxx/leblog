<?php
$query = "SELECT article.id, user.username, article.title, article.date_published, article.content, comments.content AS comments_content
FROM article
LEFT JOIN user ON article.id_user = user.id
LEFT JOIN comments ON article.id = comments.id_article
ORDER BY article.id DESC LIMIT 0, 5 ";
$resultat = mysqli_query($db, $query);
$article = mysqli_fetch_assoc($resultat);
$comments = mysqli_fetch_assoc($resultat);
require('./views/content/article/article.phtml');
 ?>