<?php


/*
 * Default page
 */
$page = 'home';

/*
 * Set access
 */
$access = array('home', 'article', 'user');
$access_visitor = array('register', 'login');
$access_member = array('messenger', 'profile', 'article_write', 'logout');
$access_admin = array('dashboard');


if(isset($_GET['page'])){
    if(in_array($_GET['page'], $access)){
        $page = $_GET['page'];
    }
    elseif(in_array($_GET['page'], $access_visitor)){
        $page = $_GET['page'];
    }
    elseif(in_array($_GET['page'], $access_member)){
        $page = $_GET['page'];
    }
    elseif(in_array($_GET['page'], $access_admin)){
        $page = $_GET['page'];
    }else{
        $page = "404";
    }

}









require('./controllers/skel.php');