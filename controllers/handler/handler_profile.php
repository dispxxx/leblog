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
			$password = $user['password'];
		}
		$change=false;
		//----- A METTRE A JOUR ----------------------------------------------------
		// Pas de DB images pour upload et traiter l'image, code actuel pour fichiers dans le répertoire racine
		if (isset($_FILES['avatar_source']) && $_FILES['avatar_source']['name'] != "") {
			if ( $image = @getimagesize($_FILES['avatar_source']['name']) ) { // vérif fichier image, @ désactive l'erreur renvoyée par la fonction
				if ($image[0] > 200 || $image[1] > 200) { // largeur et hauteur image
					$errors[] = "avatar_dimension";
				}
				else if ($_FILES['avatar_source']['size'] > 26000) { // poids image
					$errors[] = "avatar_taille";
				}
				else {
					$avatar = mysqli_real_escape_string($db, $_FILES['avatar_source']['name']);
					$change=true;
				}
			}
			else {
				$errors[] = "avatar_format";
			}
		}
		// Créer un fichier .htaccess (serveurs Apache) dans le répertoire d'upload pour empêcher l'exécution de code php
		//--------------------------------------------------------------------------
		// Problème de droit d'accès pour fichier distant (modifier php.ini), n'exécute pas getimagesize
		else if (isset($_POST['avatar_url']) && $_POST['avatar_url'] != "") {
			if ( $image = @getimagesize($_POST['avatar_url']) ) { // vérif fichier image, @ désactive l'erreur renvoyée par la fonction
				if ($image[0] > 200 || $image[1] > 200) { // largeur et hauteur image
					$errors[] = "avatar_dimension";
				}
				else if (filesize($_POST['avatar_url']) > 26000) { // poids image
					$errors[] = "avatar_taille";
				}
				else {
					$avatar = mysqli_real_escape_string($db, $_POST['avatar_url']);
					$change=true;
				}
			}
			else {
				$errors[] = "avatar_format";
			}
		}
		//----------------------------------------------------------------------------
		if (isset($_POST['name']) && ($_POST['name'] != $name)) {
			if (strlen($_POST['name']) < 1 || strlen($_POST['name']) > 31) {
				$errors[] = "name";
			}
			else {
				$name = mysqli_real_escape_string($db, $_POST['name']);
				$change=true;
			}
		}
		if (isset($_POST['surname']) && ($_POST['surname'] != $surname)) {
			if (strlen($_POST['surname']) < 1 || strlen($_POST['surname']) > 31) {
				$errors[] = "surname";
			}
			else {
				$surname = mysqli_real_escape_string($db, $_POST['surname']);
				$change=true;
			}
		}
		if (isset($_POST['email']) && ($_POST['email'] != $email)) {
			if (strlen($_POST['email']) < 5 || strlen($_POST['email']) > 63 || !(preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,5}$#", $_POST['email']))) {
				$errors[] = "email";
			}
			else {
				$email = mysqli_real_escape_string($db, $_POST['email']);
				$change=true;
			}
		}
		if (isset($_POST['password-old'], $_POST['password-new']) && $_POST['password-old'] != "") {
			if (!(password_verify($_POST['password-old'], $user['password']))) {
				$errors[]="password-old";
			}
			else if (strlen($_POST['password-new']) < 8 || strlen($_POST['password-new']) > 31) {
				$errors[]="password-new";
			}
			else if ($_POST['password-new2'] != $_POST['password-new']) {
				$errors[]="password-new2";
			}
			else {
				$password = mysqli_real_escape_string($db, password_hash($_POST['password-new'], PASSWORD_DEFAULT));
				$change=true;
			}
		}
		if (count($errors) == 0 && $change) {
			$query = "UPDATE user SET avatar='".$avatar."', name='".$name."', surname='".$surname."', email='".$email."', password='".$password."' WHERE id='".$_SESSION['id']."'";
			$resultat = mysqli_query($db, $query);
			if ($resultat) {
				header ('Location: ?page=profile&success=true');
				exit;
			}
			else {
				$errors[] = mysqli_error($db);
			}
		}
?>