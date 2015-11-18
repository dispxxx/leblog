<?php
$query = "SELECT article.id, user.username, title, date_published, content, id_user
FROM article
LEFT JOIN user ON article.id_user = user.id
WHERE date_validation <> \"0000-00-00 00:00:00\"
ORDER BY date_published DESC LIMIT ". intval($nombreDeMessagesParPage) ." OFFSET ". intval($nombreOffset) ." ";
$resultat = mysqli_query($db, $query);

if ($resultat) {
    while ($article = mysqli_fetch_assoc($resultat))
    {

        /*
         * Compte le nombre de caractère et le reformat si besoin
         *
         */
        if(strlen($article['content']) > 150){
            $article['content']=substr($article['content'],0,150);
            $space=strrpos($article['content']," ");
            if($space){
                $article['content']=substr($article['content'],0,$space);
            }
            $article['content'] .= '...';
        }

        require('./views/content/home/home_list.phtml');
    }
}
else {
    $errors[] = mysqli_error($db);
}