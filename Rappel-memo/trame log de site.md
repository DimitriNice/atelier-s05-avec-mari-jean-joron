# Trame logique du site

## Point d'entrée : index.php

TODO :

- indiquer les chemins par des __DIR__
  
- créer __toutes__ les routes de notre site
///////////////////////////////////////////  

//////////////////////////////////////////  
- récupérer le paramètre de l'URL (s'il existe, sinon on prend la home)
////////////////////////////////////////////  

////////////////////////////////////////////////
- on dispatche
  
////////////////////////////////////////////////  

; 
/////////////////////////////////////////////////  

## Controllers

- créer le répertoire "Controllers"
- créer les controllers (MainController, CatalogController, ...)
- coder les controllers :
  - créer les méthodes nécessaires appellées pour la route
  
///////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////
  - créer la méthode show() qui gère les appels aux templtes
    
//////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////

## Templates

- créer les templates (factoriser autant que possible header, footer, ...)
- récupérer et utiliser les éventuelles données envoyées par show(); exemple : $viewData qui envoyaient les jours et horaires d'ouverture
