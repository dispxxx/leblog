<?php
$nombreDeMessagesParPage = 5;
$nombreOffset = 0;



$retour = mysqli_query($db, 'SELECT COUNT(*) AS nb_messages FROM article WHERE date_validation <> "0000-00-00 00:00:00"');
$donnees = mysqli_fetch_array($retour);
$totalDesMessages = $donnees['nb_messages'];
if (isset($_GET['p']) && is_numeric($_GET['p'])) {
    $nombreDeMessagesParPage = intval($_GET['p']);
}
if (isset($_GET['o']) && is_numeric($_GET['o']) ) {
    $nombreOffset = intval($_GET['o']);
}

if ($donnees['nb_messages'] == 0) {
    require('./views/content/home/home_empty.phtml');
} else {
    $totalDesMessages = $donnees['nb_messages'];
    $nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);
    $count = 0;
    require('./views/content/home/home.phtml');
    require('./views/content/home/home_pagination/home_pagination.phtml');
}
