<?php
if(isset($_GET['id'])){
    $query = "SELECT user.id AS id_user, avatar, email, status, date_register, username FROM user WHERE user.id = '" . intval($_GET['id']) . "'";
    $resultat = mysqli_query($db, $query);
    if ($resultat) {
        $user = mysqli_fetch_assoc($resultat);
        $query =
        $query = "SELECT COUNT(note) AS article_note FROM article WHERE id_user = '" . intval($_GET['id']) . "' AND date_validation <> 0000-00-00 ";
        $resultat = mysqli_query($db, $query);
        if($resultat) {
            $nb_article_v = mysqli_fetch_assoc($resultat);
            if($nb_article_v['article_note'] > 0 ){
                $query = "SELECT note FROM article WHERE id_user = '" . intval($_GET['id']) . "' AND date_validation <> 0000-00-00 ";
                $resultat = mysqli_query($db, $query);
                $notes = 0;
                while($note = mysqli_fetch_assoc($resultat)){
                    $notes += $note['note'];
                }
                $note_moyenne = $notes / $nb_article_v['article_note'];
            }
            if ($user != NULL) {
                if (count($errors) == 0 && isset($_GET['success']) && $_GET['success'] == true) {
                    require('./views/content/user/success/success.phtml');
                } elseif (count($errors > 0)) {
                    for ($i = 0; $i < count($errors); $i++) {
                        require('./views/content/user/errors/' . $errors[$i] . '.phtml');
                    }
                }
                require('./views/content/user/user.phtml');
            } else {
                require('./views/content/404/404.phtml');
            }
        }

    }

}else{
    require('./views/content/404/404.phtml');
}
