<?php

$retour = mysqli_query($db, 'SELECT COUNT(*) AS nb_messages FROM article WHERE date_validation = "0000-00-00 00:00:00"');
$count = mysqli_fetch_array($retour);


if( (isset($_GET['success'])) && ($_GET['success'] == true) && (count($errors) == 0)){
    if(isset($_GET['a'])){
        if($_GET['a'] == "v" || $_GET['a'] == "d"){
            require('./views/content/article_validation/success/success_'.$_GET['a'].'.phtml');
        }
    }
}

if($count['nb_messages'] > 0){
    require('./views/content/article_validation/article_validation.phtml');
}
else{
    require('./views/content/article_validation/article_validation_empty.phtml');
}
