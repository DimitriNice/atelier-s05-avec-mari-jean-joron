

//aller dans le dossier de travail courant 
creer un fichier composer.json a la racine du projet

//dans le fichier composer.json 
rajouter juste les {} et fermer le fichier composer


//ouvrir le terminal 
//se mettre dans le dossier de travail
//et taper ces ligne de code 


//etape 1
composer install

//etape 2
composer update

//etape 3 
composer require symfony/var-dumper

//etape 4 
composer require altorouter/altorouter

//etape 5
//il faut rajouter ça dans l'index.php 
require_once __DIR__ . '/vendor/autoload.php';

//en fin de journee a faire en ligne de commande dans le terminal
//remplacer le lien git et le nom de la branche a creer et le nom de la branche source
sh import-external-repo.sh git@github.com:O-clock-XXXXX/nom-de-depot.git nom-de-la-branche-a-creer [nom-de-la-branche-source]

