<?php

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
            $bookController->showDashboard();
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

        case 'updateBookInfo': 
            $bookController = new BookController();
            $bookController->updateBookInfo();
            break;
        
        case 'addMessage': 
            $messageController = new MessageController();
            $messageController->addMessage();
            break;
            
        default:
            throw new Exception("La page demandée n'existe pas.");
    }
} catch (Exception $e) {
    $errorView = new View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
