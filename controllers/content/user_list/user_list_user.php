<?php 
$query = mysqli_query($db, 'SELECT username, email, date_register, `status`
							FROM user
							ORDER BY id ASC');

while ($user = mysqli_fetch_assoc($query)) {
	$user['date_register'] = date('Y-m-d', strtotime($user['date_register']));
	require('views/content/user_list/user_list_user.phtml');
}