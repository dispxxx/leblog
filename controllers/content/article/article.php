<?php
if (isset($_GET['id'])) {
    $query = "  SELECT article.id, user.username, title, date_published, content, id_user, note, thumbnail
                FROM article
                LEFT JOIN user ON article.id_user = user.id
                WHERE article.id = '" . intval($_GET['id']) . "'";
    
    $resultat = mysqli_query($db, $query);

    $article = mysqli_fetch_assoc($resultat);    
    if(isset($_GET['success']) &&  $_GET['success'] == true) {
    	require('./views/content/article/success/success.phtml');
    }
    if(count($errors)>0) {
    	for($i = 0; $i < count($errors); $i++) {
        	require('./views/content/article/errors/'.$errors[$i].'.phtml');
    	}
    }
    if ($article != NULL) {
    	require('./views/content/article/article.phtml');
    	if (isset($_SESSION['id'])) {
        /*
         *
         * Check rate star
         *
         */
            $query = mysqli_query($db, ' SELECT rating
                    FROM star
                    WHERE id_user = "' . $_SESSION['id'] . '" AND id_article = "' . intval($_GET['id']) . '"
        ');
            $resultatCountRate = mysqli_fetch_assoc($query);
    		require('./views/content/article/article_rate/article_rate.phtml');
    		require('./views/content/article/article_comment_form/article_comment_form.phtml');
    	} else {
    		require('./views/content/article/article_comment_form/article_comment_form_logout.phtml');
    	}
        $query = "  SELECT COUNT(*)
                    FROM comments
                    LEFT JOIN article ON comments.id_article = article.id
                    WHERE article.id = '" . intval($_GET['id']) . "'";
        
        $resultatCom = mysqli_query($db, $query);
        $commentaires = mysqli_fetch_assoc($resultatCom);
        
        if ($commentaires['COUNT(*)'] > 0) {
            require('./views/content/article/article_comment_list/article_comment_list_button.phtml');
            require('./controllers/content/article/article_comment_list/article_comment_list.php');
            require('./views/content/article/article_comment_list/article_comment_pagination/article_comment_pagination.phtml');
        } else {
            require('./views/content/article/article_comment_list/article_comment_list_zero.phtml');
        }
    } else {
        require('./controllers/content/404/404.php');

    }
} else {
	require('./controllers/content/404/404.php');
}
