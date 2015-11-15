<?php

/*
 * Init default value
 */
$login = "";

if (isset($_POST['loginEmail'], $_POST['loginPassword'])) {


    $query = $db->query('
        SELECT id, email, username, password
        FROM user
        WHERE email = ' . $db->quote($_POST['loginEmail'])
    );
    $data = $query->fetch();
    $query->closeCursor();


    if ($query->rowCount() > 0) {
        /*Save data login*/
        $login = $_POST['loginEmail'];


        /* Password verify*/
        if ($_POST['loginPassword'] != $data['password']) {
            $errors[] = "password";
        }

    } else {
        $errors[] = 'email';
    }

    if (count($errors) == 0) {
        $_SESSION['id'] = $data['id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['username'] = $data['username'];

        header('Location: ?page=home');
        exit;
    }

}