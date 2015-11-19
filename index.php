<?php
session_start();
var_dump($_SESSION);

/*
 * Connect to db
 */
require('init_database.php');

/*
 * Methode Mysqli
 */
$db = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

/*
 * Methode PDO
 */
//try
//{
//    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//}
//catch (Exception $e)
//{
//    die('Erreur : ' . $e->getMessage());
//}

/*
 * Init constant
 */
require('init_const.php');


/*
 * Default page
 */
$page = 'home';

/*
 * Default errors;
 */
$errors = array();


/*
 * Set access
 */
$access = array('home', 'article', 'user', 'users_view');
$access_visitor = array('register', 'login');
$access_member = array('messenger', 'profile', 'article_write', 'logout');
$access_admin = array('dashboard', 'article_validation', 'user_list');


/*
 *  Set handlers
 */
$handler_visitor = array('login', 'register');
$handler_member = array('messenger', 'messenger_answer', 'profile', 'article_write', 'comment_write', 'vote_stars', 'user_messenger', 'logout');
$handler_admin = array('article_validation', 'article_edit', 'article_delete', 'comment_delete', 'user_update_status', 'messenger_user', 'vote_stars_edit');


if (isset($_GET['page'])) {
    if (in_array($_GET['page'], $access)) {
        $page = $_GET['page'];
    } /* Soon restrict for visitor*/
    elseif (in_array($_GET['page'], $access_visitor) && !isset($_SESSION['id'])) {
        $page = $_GET['page'];
    } /* Soon restrict for member*/
    elseif (in_array($_GET['page'], $access_member) && isset($_SESSION['id'])) {
        $page = $_GET['page'];
    } /* Soon restrict for admin */
    elseif (in_array($_GET['page'], $access_admin) && isset($_SESSION['id']) && $_SESSION['status'] == STATUS_ADMIN) {
        $page = $_GET['page'];
    } else {
        $page = "404";
    }


    if (isset($_GET['action'])) {
        /* Soon restrict for visitor */
        if (in_array($_GET['action'], $handler_visitor) && !isset($_SESSION['id'])) {
            require('./controllers/handler/handler_' . $_GET['action'] . '.php');
        } /* Soon restrict for member */
        elseif (in_array($_GET['action'], $handler_member) && isset($_SESSION['id'])) {
            require('./controllers/handler/handler_' . $_GET['action'] . '.php');
        } /* Soon restrict for admin */
        elseif (in_array($_GET['action'], $handler_admin) && isset($_SESSION['id']) && $_SESSION['status'] == STATUS_ADMIN) {
            require('./controllers/handler/handler_' . $_GET['action'] . '.php');
        }
    }

}

require('./controllers/skel.php');