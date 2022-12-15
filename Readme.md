# Programmation Web avancée:TP3

Site Web de gestion de projet pour une société de développement Web.

utilistateur:
- visiteur : peut voir la page d'accueil seulement
- admin : a le droit d'ajouter des nouveaux utilisateurs(developpeur),voir le journal de bord ,ajouter des nouveaux sites et les modifier
- developpeur : peut voir la liste des sites et les telecharger

# installation

## ajout fichier **.htaccess**

RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d

RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.+)$ index.php?url=$1 [L]

## installation composer

 composer update

## changer la valeur de {{path}}

aller au 'library/twig.php' et changer la valeur de path par votre adresse local de serveur

## le lien vers webdev

https://e2295531.webdev.cmaisonneuve.qc.ca/tp3-mvc
