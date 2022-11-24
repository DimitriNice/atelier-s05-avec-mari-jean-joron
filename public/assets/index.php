<?php

// Pour utiliser nos dépendances, on doit dire à PHP qu'il faut charger automatiquement les dépendances
require __DIR__ . '/../../vendor/autoload.php';

// On inclut Database (les models en ont besoin)
require_once __DIR__ . './../../app/Utils/Database.php';

// On inclut CoreModel et CoreController avant d'inclure les Models et les Controllers qui en héritent
require_once __DIR__ . '/../../app/Models/CoreModel.php.php';
require_once __DIR__ . '/../../app/Controllers/CoreController.php';

// On inclut toutes les classes dont auront besoin les fichiers PHP plus tard
require_once __DIR__ . '/../../app/Models/Category.php';

require_once __DIR__ . '/../../app/Models/Product.php';


require_once __DIR__ . '/../../app/Controllers/MainController.php';
require_once __DIR__ . '/../../app/Controllers/CatalogController.php';


// Nouvelle version de notre routage : on utilise AltoRouter
// On instancie Altorouter
$router = new AltoRouter();

// On doit indiquer à Altorouter quelle partie d'URL il doit utiliser pour faire la correspondance entre URL et route
// Pour cela, on va utiliser $_SERVER
// dump($_SERVER);
// Tout ce qui est avant le '/', cad :
// /Lucy/S05/S05-projet-oShop-gerardkassapian/public
// ne doit pas être pris en compte par Altorouter pour la correspondance URL / Route

$router->setBasePath($_SERVER['BASE_URI']);


// On définit nos routes à l'aide de la méthode map() d'Altorouter
// http://altorouter.com/usage/mapping-routes.html

// Route pour la home
$router->map(
    // Méthode HTTP
    'GET',
    // URL de la route
    '/',
    // Target cad controller et methode à utiliser pour cette route
    [
        'controller' => 'MainController',
        'method' => 'home'
    ],
    // nom de la route (optionnel, pâr défaut null)
    'home'
);

// Route pour la page mentions légales
$router->map(
    'GET',
    '/mentions-legales/',
    [
        'controller' => 'MainController',
        'method' => 'legalNotice'
    ],
    'legalNotice'
);


// Route pour les pages categories
// Pages dynamiques de la forme /catalogue/categorie/id
// Ex : /catalogue/categorie/12
$router->map(
    'GET',
    '/.../.../[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => '...'
    ],
    '...'
);

// Route pour les pages types
$router->map(
    'GET',
    '/.../.../[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => '...'
    ],
    '...'
);

// Route pour les pages marques
$router->map(
    'GET',
    '/.../.../[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => '...'
    ],
    'catalog-brand'
);

// Route pour les pages produits
$router->map(
    'GET',
    '/.../.../[i:id]',
    [
        'controller' => 'CatalogController',
        'method' => '...'
    ],
    '...'
);


// DISPATCHER
// On matche les requêtes (URL demandée par rapport aux routes existances)
// http://altorouter.com/usage/matching-requests.html
$match = $router->match();


// On vérifie si $match retourne quelque chose (cad s'il est différent de false)
if ($match) {   // équivalent à $match != false
    // On récupère le controller à utiliser
    //$controller = $routes[$requestedPage]['controller'];
    $controller = $match['target']['controller'];

    // On récupère la méthode à appeler
    // $methodToCall = $routes[$requestedPage]['method'];
    $methodToCall = $match['target']['method'];

    // On créer une instance du controller puis on appelle la méthode
    $controllerInstance = new $controller();
    $controllerInstance->$methodToCall($match['params']);
    // $match['params'] contient les éventuels paramètres récupérés de l'URL (comme l'id de la catégorie)
} else {
    // Si $match vaut false, cad l'URL demandée ne correspond à aucune route ==> on redirige vers la home
/*     $controller = 'MainController';
    $methodToCall = 'home';

    $mainController = new MainController();
    $mainController->home(); */


    //dump(ERROR 404 PAGE NOT FOUND);die;
}

// FIN DISPATCHER