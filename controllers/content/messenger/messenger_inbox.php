<?php
	$query =  '	SELECT private_msg.id, id_sender, date_published, subject, content, user.username
				FROM private_msg
				LEFT JOIN user ON private_msg.id_sender = user.id
				WHERE id_recipient = '.$_SESSION['id'].'
				ORDER BY date_published DESC';
	$result = mysqli_query($db, $query);
	while ($msg = mysqli_fetch_assoc($result) ) {
		$msg_date = date("Y.m.d - H:i",strtotime($msg['date_published']));
		require('views/content/messenger/messenger_inbox.phtml');
	}
