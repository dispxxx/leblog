<?php
$nombreDeCommentairesParPage = 1;
$nombreOffComSet = 0;
if (isset($_GET['c'])) {
    $nombreDeCommentairesParPage = intval($_GET['c']);
}
if (isset($_GET['e'])) {
    $nombreOffComSet = intval($_GET['e']);
}

// On récupère le nombre total de messages
$retour = mysqli_query($db, 'SELECT COUNT(*) AS nb_commentaires FROM comments');
$donnees = mysqli_fetch_array($retour);
$totalDesCommentaires = $donnees['nb_commentaires'];
// On calcule le nombre de pages à créer
$nombreDePages = ceil($totalDesCommentaires / $nombreDeCommentairesParPage);
// Puis on fait une boucle pour écrire les liens vers chacune des pages
$count = 0;
$query = "SELECT user.username AS user_usernamegit , comments.content AS comments_content, comments.date_published AS comments_date, comments.id_user
FROM comments
LEFT JOIN article ON comments.id_article = article.id
LEFT JOIN user ON comments.id_user = user.id
WHERE comments.id_article = '". intval($_GET['id']) ."'
LIMIT ". intval($nombreDeCommentairesParPage) ." OFFSET ". intval($nombreOffComSet);

$resultat = mysqli_query($db, $query);

while ($article = mysqli_fetch_assoc($resultat))
{
	require('./views/content/article/article_comment_list/article_comment_list.phtml');
}

