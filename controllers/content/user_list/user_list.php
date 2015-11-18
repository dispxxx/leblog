<?php
if( isset($_GET['success']) &&  $_GET['success'] == true){
	require('./views/content/user_list/success/success.phtml');
} else {
	if(count($errors) > 0){
		for($i = 0; $i < count($errors); $i++){
			require('./views/content/user_list/errors/'.$errors[$i].'.phtml');
		}
	}
}
require('./views/content/user_list/user_list.phtml');
