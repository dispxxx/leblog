<?php
$query = "SELECT article.id, user.username, article.title, article.date_published, article.content 
FROM article
LEFT JOIN user ON article.id_user = user.id
WHERE article.id = '". $_GET['id'] ."'";
$resultat = mysqli_query($db, $query);
$article = mysqli_fetch_assoc($resultat);
require('./views/content/article/article.phtml');
?>