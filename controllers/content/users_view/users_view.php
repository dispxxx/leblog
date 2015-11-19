<?php 
$query = "SELECT user.id, user.username
FROM user";
$resultat = mysqli_query($db, $query);
require('./views/content/users_view/users_view.phtml');
 ?>