<?php
	/*
	 * Content empty verify
	 */
	if (isset($_POST['msg_content']) && $_POST['msg_content'] != "") {
		$content = $_POST['msg_content'];
	} else {
		$errors[] = 'no_content';
	}

	/*
	/* Fetch previous message and do verifications
	*/
	if (isset($_POST['id_prev'])) {
		$id_prev = intval($_POST['id_prev']);
		$query = mysqli_query($db, 'SELECT id_recipient, id_sender, id_prev, subject
									FROM private_msg
									WHERE id =' . $id_prev);
		if ($message = mysqli_fetch_assoc($query)) {
			if ($message['id_recipient'] != $_SESSION['id']) {
				$errors[] = 'error';
			}
		} else {
			$errors[] = 'error';
		}
	} else {
		$errors[] = 'error';
	}

	/*
	/* Send if no error
	*/
	if (count($errors) == 0) {
		$id_recipient = $message['id_sender'];
		$id_sender = $_SESSION['id'];
		$id_prev = $id_prev;
		$subject = 'Re: ' . $message['subject'];
		$content = mysqli_real_escape_string($db, $content);
		if ((mysqli_query($db, 'INSERT INTO private_msg(id_recipient, id_sender, id_prev, subject, content)
                               		VALUES ('.$id_recipient.', '.$id_sender.', '.$id_prev.', "'.$subject.'", "'.$content.'")'))) {
			header('Location: ?page=messenger&succcess=true');
			exit;
		} else {
			$errors[] = 'error';
		}
	}