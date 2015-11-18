<?php

$user_status = array(STATUS_MEMBER, STATUS_ADMIN, STATUS_BAN_TEMP, STATUS_BAN_PERM);

/*
/* Checks
*/
if (isset($_POST['id_user']) && !is_nan($_POST['id_user'])) {
	$id = $_POST['id_user'];
} else {
	$errors[] = 'no_id';
}
if (isset($_POST['status']) && in_array($_POST['status'], $user_status)) {
	$status = $_POST['status'];
} else {
	$errors[] = 'no_status';
}

/*
/* Status update
*/
if (count($errors) == 0) {
	if(mysqli_query($db, '	UPDATE user
							SET status = '.$status.'
							WHERE id = '.$id)) {
		header('Location: ?page=user_list&success=true');
	} else {
		$errors[] = 'query_error';
	}
}