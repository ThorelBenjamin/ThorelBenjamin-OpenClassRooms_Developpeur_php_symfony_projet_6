<?php
// En fonction des routes utilisées, il est possible d'avoir besoin de la session ; on la démarre dans tous les cas. 
session_start();

require_once 'config/_config.php';
require_once 'config/autoload.php';

$action = Utils::request('action', 'home');

try {
    switch ($action) {
        case 'home':
            $bookController = new BookController();
            $bookController->showHome();
            break;

        case 'registration':
            $connectionController = new ConnectionController();
            $connectionController->showRegistration();
            break;

        case 'connexion':
            $connectionController = new ConnectionController();
            $connectionController->showConnection();
            break;

        case 'exchange':
            $bookController = new BookController();
            $bookController->showExchange();
            break;

        case 'dashboard':
            $connectionController = new ConnectionController();
            $connectionController->showDashboard();
            break;

        case 'connectUser': 
            $connectionController = new ConnectionController();
            $connectionController->connectUser();
            break;

        case 'addUser': 
            $connectionController = new ConnectionController();
            $connectionController->addUser();
            break;
            
        case 'updateUser': 
            $connectionController = new ConnectionController();
            $connectionController->updateUser();
            break;

        case 'showBook': 
            $bookController = new BookController();
            $bookController->showBook();
            break;

        case 'message': 
            $messageController = new MessageController();
            $messageController->showMessage();
            break;

        case 'updateBook': 
            $bookController = new BookController();
            $bookController->updateBook();
            break;

        case 'userPage': 
            $bookController = new BookController();
            $bookController->userPage();
            break;

        case 'updateBookInfo': 
            $bookController = new BookController();
            $bookController->updateBookInfo();
            break;
        
        case 'addMessage': 
            $messageController = new MessageController();
            $messageController->addMessage();
            break;
        
        case 'logout': 
            $connectionController = new ConnectionController();
            $connectionController->logout();
            break;
            
            default:
            http_response_code(404);
        
            $errorView = new View('Erreur 404');
            $errorView->render('404Page', ['errorMessage' => "La page demandée n'existe pas."]);
            break;
    }
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
