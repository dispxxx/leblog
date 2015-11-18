<?php
	/*
	 * Field empty verify
	 */
	if (isset($_POST['msg_subject']) && $_POST['msg_subject'] != "") {
		$subject = $_POST['msg_subject'];
	} else {
		$errors[] = 'no_subject';
	}
	if (isset($_POST['msg_recipient'])  && $_POST['msg_recipient'] != "") {
		/*
		/*	Get recipient ID if it exists
		*/
		$recipient = mysqli_real_escape_string($db, $_POST['msg_recipient']);
		$result = mysqli_query($db, 'SELECT id, username
									 FROM user
									 WHERE username = "'.$recipient.'"');
		if (!($recipient_array = mysqli_fetch_assoc($result))) {
			$errors[] = 'wrong_recipient';
		}
	} else {
		$errors[] = 'no_recipient';
	}
	if (isset($_POST['msg_content']) && $_POST['msg_content'] != "") {
		$content = $_POST['msg_content'];
	} else {
		$errors[] = 'no_content';
	}

	if (count($errors) == 0) {
		$id_recipient = $recipient_array['id'];
		$id_sender = $_SESSION['id'];
		$id_prev = 0;
		$subject = mysqli_real_escape_string($db, $subject);
		$content = mysqli_real_escape_string($db, $content);
		if (mysqli_query($db, ' INSERT INTO private_msg(id_recipient, id_sender, id_prev, subject, content)
                               	VALUES ('.$id_recipient.', '.$id_sender.', '.$id_prev.', "'.$subject.'", "'.$content.'")')) {
			header('Location: ?page=messenger&succcess=true');
			exit;
		} else {
			echo('ERROR FFS');
		}
	}