<?php
$query = "SELECT * FROM user WHERE user.id = '". intval($_GET['id']) ."'";;
$resultat = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($resultat);
if($user != NULL){
    require('./views/content/user/user.phtml');
}
else{
    require('./views/content/404/404.phtml');
}
