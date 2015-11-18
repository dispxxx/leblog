<?php
$query = "SELECT user.id AS id_user, avatar, email, status, date_register, username FROM user WHERE user.id = '". intval($_GET['id']) ."'";;
$resultat = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($resultat);
if($user != NULL){
    if(count($errors) == 0 && isset($_GET['success']) && $_GET['success'] == true){
        require('./views/content/user/success/success.phtml');
    }elseif(count($errors > 0)){
        for( $i = 0; $i< count($errors); $i ++){
            require('./views/content/user/errors/'.$errors[$i].'.phtml');
        }
    }
    require('./views/content/user/user.phtml');
}
else{
    require('./views/content/404/404.phtml');
}
