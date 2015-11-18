<?php
for ($i = 1; $i <= $nombreDePages; $i++) {
    require('./views/content/article/article_comment_list/article_comment_pagination/article_comment_pagination_li.phtml');
    $count++;
}