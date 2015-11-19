<?php

/*
 * Init default value
 */
$login = "";

if (isset($_POST['login_email'], $_POST['login_password'])) {



    /*
     * Mysqli
     */
    $query = mysqli_query($db, 'SELECT id, email, username, password, status FROM user WHERE email = "'. mysqli_escape_string($db, $_POST['login_email']) .'"');
    $data = mysqli_fetch_assoc($query);
    if(!$query){
        $errors[] = 'db';
    }

    /*
     * PDO
     */
//    $query = $db->query('
//        SELECT id, email, username, password
//        FROM user
//        WHERE email = ' . $db->quote($_POST['login_email'])
//    );
//    $data = $query->fetch();
//    $query->closeCursor();


    if (mysqli_num_rows($query) == 1) {
        /*Save data login*/
        $login = $_POST['login_email'];

        /* Password verify*/
        if (!password_verify($_POST['login_password'], $data['password'])) {
            $errors[] = "password";
        }

    } else {
        $errors[] = 'email';
    }

    if (count($errors) == 0) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['status'] = $data['status'];

        header('Location: ?page=home');
        exit;
    }

}