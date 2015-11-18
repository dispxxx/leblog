<?php
$query = "SELECT article.id, user.username, article.title, article.date_published, article.content, article.id_user 
FROM article
LEFT JOIN user ON article.id_user = user.id
WHERE article.id = '". intval($_GET['id']) ."'";
$resultat = mysqli_query($db, $query);
$article = mysqli_fetch_assoc($resultat);
if($article != NULL){
    require('./views/content/article/article.phtml');

}
else {
    require('./controllers/content/404/404.php');
}
