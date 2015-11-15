Le Blog
=======

##Configuration

Afin de faciliter les choses, j'ai configuré la connexion via PDO ( et non mysqli ).
Vous trouverez dans ce répertoire de fichier "blog_unk.sql" pour recréer la base de donnée de travail.

##Une fois cette base installé.
Afin de vous y connecter avec PHP, vous n'aurez qu'à modifier si besoin le fichier "init_database.php".

Vous pouvez vous servir de la manière PDO comme suit:


### SELECT
    $nomDeVariable = $db->query('SELECT * FROM table);

    //Utilisation...

    //Exemple 1:
     $data = $nomDeVariable->fetch();
     echo $data['colonneTable'];

    //Exemple 2:
     while($reponse = $nomDeVariable->fetch()){
        echo $reponse['colonneTable'];
     }

    //Puis toujours clôturer quand vous avez fini votre traitement avec la db
     $query->closeCursor();

### INSERT INTO

    $db->exec('INSERT INTO table(colonneTable) VALUE ("Contenu crée") );

    //Puis toujours clôturer quand vous avez fini votre traitement avec la db
    $db->closeCursor();

### UPDATE

    $db->exec('UPDATE table SET colonneTable = "Contenu maj" WHERE id = 1);

    //Puis toujours clôturer quand vous avez fini votre traitement avec la db
    $db->closeCursor();


### DELETE FROM

    $db->exec('DELETE FROM table WHERE id = 1);

    //Puis toujours clôturer quand vous avez fini votre traitement avec la db
    $db->closeCursor();


####Dernier point important

La sécurisation des données envoyé par l'utilisateur sur le serveur.

    mysqli_real_escape_string est remplacé par quote

Exemple :

**Avant**

'DELETE FROM table WHERE name = ' .mysqli_real_escape_string($string) ;

**Maintenant**

'DELETE FROM table WHERE name = '.$db->quote($string) ;





##Les constantes

###STATUS

+STATUS_MEMBER       -> Définie la valeur qui correspond au statut membre
+STATUS_ADMIN        -> Définie la valeur qui correspond au statut admin
+STATUS_BAN_TEMP     -> Définie la valeur qui correspond au statut bannit temporairement
+STATUS_BAN_PERM     -> Définie la valeur qui coreespond au statut bannit indéfiniment

__Note: STATUS_BAN_PERM < STATUS_BAN_TEMP < STATUS_MEMBER < STATUS_ADMIN__.



##Information

**Cahier des charges :**
https://docs.google.com/document/d/1S0n7l1KGhS2Tb34-qWNxC4TuU31pzL5RYzd6rPFY_CY/edit?usp=sharing


**Structure database :**
https://docs.google.com/drawings/d/1s1jWIn0Z4hBvZMpHfOnAom6SAUvYvOVHUtKppEgI8rQ/edit?usp=sharing



**Structure MVC :**
https://docs.google.com/drawings/d/1rky7tgVy-_b-4RHzpXh70PHgzdXte0qjrjnQL3je4Pc/edit?usp=sharing

