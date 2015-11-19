<?php
if(isset($_SESSION['id']) && $_SESSION['status'] == STATUS_ADMIN ){
    require('./views/menu/menu_admin.phtml');
}
