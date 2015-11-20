Le Blog
=======

##Configuration

Afin de faciliter les choses, j'ai configuré la connexion en mysql.
Vous trouverez dans ce répertoire de fichier "blog_unk.sql" pour recréer la base de donnée de travail.

##Une fois cette base installé.
Afin de vous y connecter avec PHP, vous n'aurez qu'à modifier si besoin le fichier "init_database.php".


####Dernier point important

La sécurisation des données envoyé par l'utilisateur sur le serveur.

    mysqli_real_escape_string a ne pas oublier.

##Les constantes

###STATUS

+   STATUS_MEMBER       -> Définie la valeur qui correspond au statut membre
+   STATUS_ADMIN        -> Définie la valeur qui correspond au statut admin
+   STATUS_BAN_TEMP     -> Définie la valeur qui correspond au statut bannit temporairement
+   STATUS_BAN_PERM     -> Définie la valeur qui coreespond au statut bannit indéfiniment

__Note: STATUS_BAN_PERM < STATUS_BAN_TEMP < STATUS_MEMBER < STATUS_ADMIN__.



##Information

**Cahier des charges :**
https://docs.google.com/document/d/1S0n7l1KGhS2Tb34-qWNxC4TuU31pzL5RYzd6rPFY_CY/edit?usp=sharing


**Structure database :**
https://docs.google.com/drawings/d/1s1jWIn0Z4hBvZMpHfOnAom6SAUvYvOVHUtKppEgI8rQ/edit?usp=sharing



**Structure MVC :**
https://docs.google.com/drawings/d/1rky7tgVy-_b-4RHzpXh70PHgzdXte0qjrjnQL3je4Pc/edit?usp=sharing