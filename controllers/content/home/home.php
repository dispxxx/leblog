<!-- Button -->

<nav class="navbar navbar-default">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Affichage par page<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?page=home&amp;p=2&amp;o=5">2</a></li>
            <li><a href="?page=home&amp;p=5&amp;o=5">5</a></li>
            <li><a href="?page=home&amp;p=10&amp;o=5">10</a></li>
          </ul>
</nav>

<?php
// On met dans une variable le nombre de messages qu'on veut par page
$nombreDeMessagesParPage = 5;
$nombreOffset= 0;

if (isset($_GET['p'])) {
	$nombreDeMessagesParPage = intval($_GET['p']);
}
if (isset($_GET['o'])) {
	$nombreOffset = intval($_GET['o']);
}

$query = "SELECT article.id, user.username, title, date_published, content 
FROM article
LEFT JOIN user ON article.id_user = user.id
ORDER BY date_published DESC LIMIT ". intval($nombreDeMessagesParPage) ." OFFSET ". intval($nombreOffset) ." ";
$resultat = mysqli_query($db, $query);
if ($resultat)
{
	while ($article = mysqli_fetch_assoc($resultat))
	{
		require('./views/content/home/home.phtml');
	}
}
else
	$errors[] = mysqli_error($db);
?>

<?php

// On récupère le nombre total de messages
$retour = mysqli_query($db, 'SELECT COUNT(*) AS nb_messages FROM article');
$donnees = mysqli_fetch_array($retour);
$totalDesMessages = $donnees['nb_messages'];
// On calcule le nombre de pages à créer
$nombreDePages  = ceil($totalDesMessages / $nombreDeMessagesParPage);
// Puis on fait une boucle pour écrire les liens vers chacune des pages
echo 'Page : ';
$count = 0;
for ($i = 1 ; $i <= $nombreDePages ; $i++)
{
   echo '<a href="?page=home&p=' . $nombreDeMessagesParPage . '&o='.$nombreDeMessagesParPage*$count.'">' . $i . '</a> ';
   $count++;
}
 
if (isset($_GET['page']))
{
        $page = $_GET['page']; // On récupère le numéro de la page indiqué dans l'adresse
}
else // La variable n'existe pas, c'est la première fois qu'on charge la page
{
        $page = 1; // On se met sur la page 1 (par défaut)
}
  
?>