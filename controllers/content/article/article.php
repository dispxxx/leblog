<?php
$query = "SELECT article.id, user.username, article.title, article.date_published, article.content, article.id_user 
FROM article
LEFT JOIN user ON article.id_user = user.id
WHERE article.id = '" . intval($_GET['id']) . "'";
$resultat = mysqli_query($db, $query);
$article = mysqli_fetch_assoc($resultat);


if ($article != NULL) {
    require('./views/content/article/article.phtml');


    if (isset($_SESSION['id'])) {
        require('./views/content/article/article_comment_form/article_comment_form.phtml');
    } else {
        require('./views/content/article/article_comment_form/article_comment_form_logout.phtml');
    }

    $query = "SELECT COUNT(*)
    FROM comments
    LEFT JOIN article ON comments.id_article = article.id
    WHERE article.id = '" . intval($_GET['id']) . "'";
    $resultatCom = mysqli_query($db, $query);
    $commentaires = mysqli_fetch_assoc($resultatCom);
    if ($commentaires['COUNT(*)'] > 0) {
        require('./views/content/article/article_comment_list/article_comment_list_button.phtml');
        require('./controllers/content/article/article_comment_list/article_comment_list.php');
        require('./views/content/article/article_comment_list/article_comment_pagination/article_comment_pagination.phtml');
    }else{
        echo "aucun";
    }
} else {
    require('./controllers/content/404/404.php');
}


