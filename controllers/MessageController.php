<?php 

class MessageController 
{
    
    public function showMessage() : void
    {
        $this->checkIfUserIsConnected();

        $userId = $_SESSION['userId'];
        $senderId = $recipientId = Utils::request("senderId");
        

        $messageManager = new MessageManager();
        $message = $messageManager->getMessageByIdRecipient($userId);
        $messageSender = $messageManager->getMessagesForUserAndSender($userId, $senderId);

        $userManager = new UserManager();
        $user = $userManager->getUserById($senderId);

        $view = new View("Messagerie");
        $view->render("message", ['message' => $message, 'messageSender' => $messageSender, 'user' => $user]);
    }

    public function addMessage() : void
    {
        $this->checkIfUserIsConnected();

        $senderId = $_SESSION['userId'];
        $recipientId = Utils::request("recipientId");
        $messageText = Utils::request("messageText");

        $message = new Message([
            'senderId' => $senderId,
            'recipientId' => $recipientId,
            'messageText' => $messageText
        ]);

        $messageManager = new MessageManager();
        $result = $messageManager->addMessage($message);

        Utils::redirect("message&senderId=$recipientId");
    }

    private function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect("connexion");
        }
    }
}