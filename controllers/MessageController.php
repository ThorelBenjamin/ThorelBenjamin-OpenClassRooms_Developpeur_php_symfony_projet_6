<?php 

class MessageController 
{
    
    public function showMessage() : void
    {
        $this->checkIfUserIsConnected();

        $userId = $_SESSION['userId'];
        $senderId = $recipientId = Utils::request("senderid");
        

        $messageManager = new MessageManager();
        $message = $messageManager->getMessageByIdRecipient($userId);
        $messageSender = $messageManager->getMessagesForUserAndSender($userId, $senderId);

        $userManager = new UserManager();
        $user = $userManager->getUserById($senderId);

        $view = new View("Messagerie");
        $view->render("message", ['message' => $message, 'messageSender' => $messageSender, 'user' => $user]);
    }

    private function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect("connexion");
        }
    }
}