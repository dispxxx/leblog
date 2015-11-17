<?php


if( isset($_GET['success']) &&  $_GET['success'] == true && count($errors) == 0){
    require('./views/content/register/success/success.phtml');
}else {
    if(count($errors)>0){
        for($i = 0; $i < count($errors); $i++){
            require('./views/content/register/errors/'.$errors[$i].'.phtml');
        }
    }
}

require('./views/content/register/register.phtml');