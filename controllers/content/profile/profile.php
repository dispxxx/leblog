<?php
	$query = "SELECT * FROM user WHERE id='".$_SESSION['id']."'";
	$resultat = mysqli_query($db, $query);
	if ($user = mysqli_fetch_array($resultat)) {
		$username = $user['username'];
		$date = $user['date_register'];
		$avatar = $user['avatar'];
		$name = $user['name'];
		$surname = $user['surname'];
		$email = $user['email'];
	}
	if( isset($_GET['success']) &&  $_GET['success'] == true){
    	require('./views/content/profile/success/success.phtml');
	}
	if(count($errors)>0) {
	    for($i = 0; $i < count($errors); $i++) {
	        require('./views/content/profile/errors/'.$errors[$i].'.phtml');
	    }
	}
	require('./views/content/profile/profile.phtml');
?>