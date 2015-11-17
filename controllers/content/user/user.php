<?php
$query = "SELECT * FROM user WHERE user.id = '". $_GET['id'] ."'";;
$resultat = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($resultat);
require('./views/content/user/user.phtml');
?>