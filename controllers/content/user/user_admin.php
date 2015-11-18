<?php
if(isset($_SESSION['id']) && $_SESSION['status'] == STATUS_ADMIN){

    if($user['status'] == STATUS_BAN_PERM){
        $user['status'] = "BAN PERMANENT";
    }elseif($user['status'] == STATUS_BAN_TEMP){
        $user['status'] = "BAN TEMPORAIRE";
    }elseif($user['status'] == STATUS_MEMBER){
        $user['status'] = "MEMBRE";
    }elseif($user['status'] == STATUS_ADMIN){
        $user['status'] = 'ADMIN';
    }


require('./views/content/user/user_admin.phtml');
}
