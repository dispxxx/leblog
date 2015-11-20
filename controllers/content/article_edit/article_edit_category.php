<?php
$select_category = "SELECT * FROM category";
$resultat = mysqli_query($db, $select_category);
while ($display_category = mysqli_fetch_array($resultat)) {
   require('./views/content/article_edit/article_edit_category.phtml');
}