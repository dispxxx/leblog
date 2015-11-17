<?php


$query = mysqli_query($db, '
    SELECT article.id AS article_id, title, date_published, id_category, content, user.username AS username
    FROM article
    LEFT JOIN user ON article.id_user = user.id
    WHERE date_validation = "0000-00-00 00:00:00"
    ORDER BY date_published DESC');
while ($data = mysqli_fetch_assoc($query)){
    /*
         * Compte le nombre de caractère et le reformat si besoin
         *
         */
    if(strlen($data['content']) > 30){
        $data['content']=substr($data['content'],0,30);
        $space=strrpos($data['content']," ");
        if($space){
            $data['content']=substr($data['content'],0,$space);
        }
        $data['content'] .= '...';
    }


    require('./views/content/article_validation/article_validation_list/article_validation_list.phtml');
}
