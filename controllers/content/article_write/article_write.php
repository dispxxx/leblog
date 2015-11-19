<?php

if(count($errors)>0){
    for($i = 0; $i < count($errors); $i++){
        require('./views/content/article_write/errors/'.$errors[$i].'.phtml');
    }

}elseif (count($errors) == 0 && isset($_GET['success']) && $_GET['success']=="true") {
    require('./views/content/article_write/success/success.phtml');
}
	require('./views/content/article_write/article_write.phtml');
