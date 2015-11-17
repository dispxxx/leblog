<?php
// On met dans une variable le nombre de messages qu'on veut par page
$nombreDeMessagesParPage = 5;
$nombreOffset = 0;
if (isset($_GET['p'])) {
    $nombreDeMessagesParPage = intval($_GET['p']);
}
if (isset($_GET['o'])) {
    $nombreOffset = intval($_GET['o']);
}


// On récupère le nombre total de messages
$retour = mysqli_query($db, 'SELECT COUNT(*) AS nb_messages FROM article');
$donnees = mysqli_fetch_array($retour);
$totalDesMessages = $donnees['nb_messages'];
// On calcule le nombre de pages à créer
$nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);
// Puis on fait une boucle pour écrire les liens vers chacune des pages
$count = 0;

require('./views/content/home/home.phtml');


require('./views/content/home/home_pagination/home_pagination.phtml');