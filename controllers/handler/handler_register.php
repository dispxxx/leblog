<?php
/*
 * Variable init
 */
$email = "";
$email_confirm = "";
$name = "";
$surname = "";
$username = "";


if(isset($_POST['register_email'], $_POST['register_email_confirm'], $_POST['register_password'], $_POST['register_password_confirm'], $_POST['register_name'], $_POST['register_surname'], $_POST['register_username'],$_POST['g-recaptcha-response'])){


    /*
     * Captcha verify
     */
    $url_captcha = 'https://www.google.com/recaptcha/api/siteverify?secret=6LeiBBETAAAAACYZpXXYpzS85YysXIvZrkjEkixa&response='.$_POST['g-recaptcha-response'];
    $curl = curl_init($url_captcha);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $reponse = curl_exec($curl);

    $json = json_decode($reponse, true);


    if ($json['success'] === false) {
        $errors[] = "captcha";
    }


    /*
     * Email exist
     */

    /*
     * Methode pdo
     */
//    $query = $db->prepare('
//    SELECT COUNT(email) FROM user WHERE email = :email
//    ');
//    $query->execute(array('email' => $_POST['register_email']));
//    $reponse = $query->fetch();
//    if($reponse[0]!= 0){
//        $errors[]= "email_exist";
//    }

    /*
     * Methode mysqli
     */
    $query = mysqli_query($db, 'SELECT COUNT(email) FROM user WHERE email = "'. mysqli_escape_string($db, $_POST['register_email']) .'"');
    $data = mysqli_fetch_assoc($query);
    if($data['COUNT(email)'] != 0){
        $errors[] = "email_exist";
    }


    /*
     * Email format verify
     */
    if(strlen($_POST['register_email'])>5 && strlen($_POST['register_email'])<63){
        if(preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,5}$#", $_POST['register_email'])){
            $email = $_POST['register_email'];
        }else{
            $errors[] = 'email_format';
        }
    }else{
        $errors[] = 'email_format';
    }
    /*
     * Email confirm verify
     */
    if($_POST['register_email'] === $_POST['register_email_confirm']){
        $email_confirm = $email;
    }else {
        $errors[] = 'email_confirm';
    }


    /*
     * Password format verify
     */
    if(strlen($_POST['register_password']) >= 8 && strlen($_POST['register_password']) <= 30){
        $password = password_hash($_POST['register_password'], PASSWORD_DEFAULT);
    }else {
        $errors[] = 'password_format';
    }
    /*
     * Password confirm verify
     */
    if($_POST['register_password'] !== $_POST['register_password_confirm']){
        $errors[] = 'password_confirm';
    }


    /*
     * Name format verify
     */
    if((strlen($_POST['register_name']) >=2 && strlen($_POST['register_name'])<=30) || $_POST['register_name'] === ""){

        if((preg_match("#[a-zA-Z]+[ -']*$#", $_POST['register_name'])) || $_POST['register_surname'] === ""){
            $name = $_POST['register_name'];
        }else {
            $errors[] = "name_format";
        }
    }else {
        $errors[] = "name_lenght";
    }

    /*
     * Surname format verify
     */
    if((strlen($_POST['register_surname']) >=2 && strlen($_POST['register_surname'])<=30) || $_POST['register_surname'] === ""){

        if((preg_match("#[a-zA-Z]+[ -']*$#", $_POST['register_surname']))  || $_POST['register_surname'] === "" ){
            $surname = $_POST['register_surname'];
        }else {
            $errors[] = "surname_format";
        }
    }else {
        $errors[] = "surname_lenght";
    }


    /*
     * Username format verify
     */
    if((strlen($_POST['register_username']) >=2 && strlen($_POST['register_username'])<=30) || $_POST['register_username'] === ""){

        if((preg_match("#[a-zA-Z0-9]+[ -_']*$#", $_POST['register_username']))  || $_POST['register_surname'] === ""){
            $username = $_POST['register_username'];
        }else {
            $errors[] = "username_format";
        }
    }else {
        $errors[] = "username_lenght";
    }



    if(count($errors) == 0){
        /*
         * Methode pdo avec quote
         */
//        $query = $db->query('
//        INSERT INTO user(`name`, surname, email, password, username, status)
//        VALUES ('. $db->quote($name) .', '. $db->quote($surname) .', '. $db->quote($email) .', '.$password.', '.$db->quote($username).', '.STATUS_MEMBER.')
//        ');


        /*
         * Methode pdo avec prepare
         */
//        $query = $db->prepare('INSERT INTO user(name, surname, email, password, username, status) VALUES (:name, :surname, :email, :password, :username, :status)');
//        $query->execute(array(
//           "name" => $name,
//            "surname" => $surname,
//            "email" => $email,
//            "password" => $password,
//            "username" => $username,
//            "status" => STATUS_MEMBER
//        ));
//        $query->closeCursor();

        /*
         * Methode mysqli
         */
        $name = mysqli_escape_string($db, $name);
        $surname = mysqli_escape_string($db, $surname);
        $email = mysqli_escape_string($db,$email);
        $username = mysqli_escape_string($db,$username);


        $query = mysqli_query($db, 'INSERT INTO user(name, surname, email, password, username, status)
                                    VALUES ("'.$name.'", "'.$surname.'", "'.$email.'", "'.$password.'", "'.$username.'", '.STATUS_MEMBER.')');
        if($query){
            header('Location: ?page=register&success=true');
            exit;
        }else {
            $errors[] = "db";
        }
    }


}
