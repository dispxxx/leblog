<?php

if(isset($_POST['id'], $_POST['action'])){
    if($_POST['action'] == "validate"){
        $query = mysqli_query($db, "UPDATE article
        SET date_validation = '". date('Y-m-d H:i:s')."'
        WHERE id = '".$_POST['id']."'");

        if($query){
            header('Location: ?page=article_validation&success=true&a=v');
            exit;
        }
        else {
            $errors[]='db';
        }

    }
    elseif($_POST['action'] == "delete"){
        $query = mysqli_query( $db, '
    DELETE FROM article
    WHERE id = '.$_POST['id'] );

        if($query){
            header('Location: ?page=article_validation&success=true&a=d');
            exit;
        }
        else {
            $errors[]= "db";
        }
    }
}