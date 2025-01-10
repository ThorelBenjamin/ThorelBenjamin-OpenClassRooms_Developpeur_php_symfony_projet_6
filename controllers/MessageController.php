<?php 

class MessageController 
{
    /**
     * Affiche les messages d'un utilisateur avec un expéditeur spécifique.
     * Vérifie si l'utilisateur est connecté avant d'afficher les messages entre l'utilisateur connecté et l'expéditeur.
     * @return void
     */
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

    /**
     * Envoie un message d'un utilisateur à un autre utilisateur.
     * Vérifie si l'utilisateur est connecté avant d'envoyer le message.
     * @return void
     */
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

    /**
     * Vérifie si l'utilisateur est connecté.
     * Si l'utilisateur n'est pas connecté (aucun identifiant utilisateur dans la session),
     * il est redirigé vers la page de connexion.
     * @return void
     */
    private function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect("connexion");
        }
    }
}