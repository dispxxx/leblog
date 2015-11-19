<?php

if(isset($_POST['msg_id_recipient'], $_POST['msg_subject'], $_POST['msg_content'])){

    if(strlen($_POST['msg_subject']) > 2 && strlen($_POST['msg_subject']) < 127){
        $subject = $_POST['msg_subject'];
    }
    else{
        $errors[] = 'subject_len';
    }

    if(strlen($_POST['msg_content']) > 2 && strlen($_POST['msg_content']) < 510 ){
        $content = $_POST['msg_content'];
    }
    else {
        $errors[] = 'content_len';
    }

    if($_POST['msg_id_recipient'] == intval($_GET['id'])){
        $id = $_POST['msg_id_recipient'];
    }
    else {
        $errors[] = 'id_verif';
    }

    if (count($errors) == 0) {
        $id_recipient = $id;
        $id_sender = $_SESSION['id'];
        $id_prev = 0;
        $subject = mysqli_real_escape_string($db, $subject);
        $content = mysqli_real_escape_string($db, $content);
        if (mysqli_query($db, ' INSERT INTO private_msg(id_recipient, id_sender, id_prev, subject, content)
                               	VALUES ('.$id_recipient.', '.$id_sender.', '.$id_prev.', "'.$subject.'", "'.$content.'")')) {
            header('Location: ?page=user&id='.$id.'&success=true');
            exit;
        } else {
            $errors[] = 'db';
        }
    }

}

