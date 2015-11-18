<?php
if(count($errors)>0){
    for($i = 0; $i < count($errors); $i++){
        require('./views/content/login/errors/'.$errors[$i].'.phtml');
    }
}
require('./views/content/login/login.phtml');