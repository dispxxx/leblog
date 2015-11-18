<?php
if( isset($_GET['success']) &&  $_GET['success'] == true){
	require('./views/content/messenger/success/success.phtml');
}else {
	if(count($errors) > 0){
		for($i = 0; $i < count($errors); $i++){
			require('./views/content/messenger/errors/'.$errors[$i].'.phtml');
		}
	}
}

require('./views/content/messenger/messenger.phtml');