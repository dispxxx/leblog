<?php

$retour = mysqli_query($db, 'SELECT COUNT(*) AS nb_messages FROM article WHERE date_validation = "0000-00-00 00:00:00"');
$count = mysqli_fetch_array($retour);
if($count['nb_messages'] > 0){

    require('./views/content/article_validation/article_validation.phtml');
}
else{
    require('./views/content/article_validation/article_validation_empty.phtml');
}
