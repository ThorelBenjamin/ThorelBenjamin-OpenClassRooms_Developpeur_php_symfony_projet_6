<?php
// En fonction des routes utilisées, il est possible d'avoir besoin de la session ; on la démarre dans tous les cas. 
session_start();

require_once 'config/_config.php';
require_once 'config/autoload.php';

$action = Utils::request('action', 'home');

try {
    switch ($action) {
        // Action "home" : Afficher la page d'accueil
        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        // Action "registration" : Afficher la page d'inscription
        case 'registration':
            $connectionController = new ConnectionController();
            $connectionController->showRegistration();
            break;

        // Action "connexion" : Afficher la page de connexion
        case 'connexion':
            $connectionController = new ConnectionController();
            $connectionController->showConnection();
            break;

        // Action "exchange" : Afficher la page d'échange de livres
        case 'exchange':
            $bookController = new BookController();
            $bookController->showExchange();
            break;
        
        // Action "dashboard" : Afficher le tableau de bord de l'utilisateur
        case 'dashboard':
            $connectionController = new ConnectionController();
            $connectionController->showDashboard();
            break;

        // Action "connectUser" : Connecter un utilisateur
        case 'connectUser': 
            $connectionController = new ConnectionController();
            $connectionController->connectUser();
            break;

        // Action "addUser" : Ajouter un nouvel utilisateur
        case 'addUser': 
            $connectionController = new ConnectionController();
            $connectionController->addUser();
            break;
        
         // Action "updateUser" : Mettre à jour les informations d'un utilisateur
        case 'updateUser': 
            $connectionController = new ConnectionController();
            $connectionController->updateUser();
            break;
        
        // Action "createBook" : Créer un nouveau livre
        case 'createBook': 
            $bookController = new BookController();
            $bookController->createBook();
            break;

        // Action "addBook" : Ajouter un livre
        case 'addBook': 
            $bookController = new BookController();
            $bookController->addBook();
            break;

        // Action "showBook" : Afficher les détails d'un livre
        case 'showBook': 
            $bookController = new BookController();
            $bookController->showBook();
            break;

        // Action "deleteBook" : Supprimer un livre
        case 'deleteBook': 
            $bookController = new BookController();
            $bookController->deleteBook();
            break;

        // Action "message" : Afficher la page des messages
        case 'message': 
            $messageController = new MessageController();
            $messageController->showMessage();
            break;

        // Action "updateBook" : Mettre à jour les informations d'un livre
        case 'updateBook': 
            $bookController = new BookController();
            $bookController->updateBook();
            break;

        // Action "userPage" : Afficher la page d'un utilisateur
        case 'userPage': 
            $bookController = new BookController();
            $bookController->userPage();
            break;

        // Action "updateBookInfo" : Mettre à jour les informations d'un livre
        case 'updateBookInfo': 
            $bookController = new BookController();
            $bookController->updateBookInfo();
            break;

        // Action "addMessage" : Ajouter un messa        
        case 'addMessage': 
            $messageController = new MessageController();
            $messageController->addMessage();
            break;
        
        // Action "logout" : Déconnecter l'utilisateur
        case 'logout': 
            $connectionController = new ConnectionController();
            $connectionController->logout();
            break;
            
        // Si l'action n'est pas reconnue, retourner une erreur 404.
        default:
            http_response_code(404);
            
            $errorView = new View('Erreur 404');
            $errorView->render('404Page', ['errorMessage' => "La page demandée n'existe pas."]);
            break;
    }
} catch (Exception $e) {
    // Si une exception est lancée, afficher une page d'erreur avec le message de l'exception.
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
