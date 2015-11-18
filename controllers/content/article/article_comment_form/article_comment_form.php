<?php 
if (isset($_SESSION['id'])) 
{
	require('./views/content/article/article_comment_form/article_comment_form.phtml');
}
else
{
	echo 'Veuillez vous <a href="?page=login">connecter</a> pour poster un commentaire';
}
