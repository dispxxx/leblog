<?php
$query = "SELECT article.id, user.username, title, date_published, content 
FROM article
LEFT JOIN user ON article.id_user = user.id
ORDER BY article.id DESC LIMIT 0, 5 ";
$resultat = mysqli_query($db, $query);
$article = mysqli_fetch_assoc($resultat);
require('./views/content/article/article.phtml');
?>