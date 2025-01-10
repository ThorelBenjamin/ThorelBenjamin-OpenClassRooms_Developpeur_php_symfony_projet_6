<?php

class MessageManager extends AbstractEntityManager 
{

    /**
     * Récupère les derniers messages pour un destinataire donné.
     * Seuls les messages les plus récents pour chaque expéditeur sont récupérés.
     * 
     * @param int $recipientId L'identifiant du destinataire
     * @return array Un tableau d'objets Message
     */
    public function getMessageByIdRecipient($recipientId): array
    {
        $sql = "SELECT m.*, u.username, u.user_logo FROM message m JOIN user u ON m.sender_id = u.user_id WHERE m.recipient_id = :recipient_id AND m.sent_at = (SELECT MAX(sent_at) FROM message WHERE sender_id = m.sender_id AND recipient_id = :recipient_id)";
        $result = $this->db->query($sql, ['recipient_id' => $recipientId]); 
        $messages = [];

        while ($message = $result->fetch()) {
            $msg = new Message($message);

            $date = new DateTime($message['sent_at']);
            $formattedTime = $date->format('H:i');

            $msg->setFormattedSentAt($formattedTime);

            $messages[] = $msg;
        }
        return $messages;
    
    }

    /**
     * Récupère tous les messages échangés entre un utilisateur et un expéditeur.
     * 
     * @param int $user_id L'identifiant de l'utilisateur destinataire
     * @param int $senderId L'identifiant de l'expéditeur
     * @return array Un tableau d'objets Message
     */
    public function getMessagesForUserAndSender($user_id, $senderId): array
    {
        $sql = "SELECT m.*, u.username, u.user_logo 
                FROM message m 
                JOIN user u ON m.sender_id = u.user_id 
                WHERE (m.recipient_id = :user_id OR m.recipient_id = :senderId) 
                AND (m.sender_id = :senderId OR m.sender_id = :user_id)
                ORDER BY m.sent_at ASC";  

        $result = $this->db->query($sql, [
            'user_id' => $user_id,
            'senderId' => $senderId
        ]); 
        
        $messages = [];

        while ($message = $result->fetch()) {
            $msg = new Message($message);

            $date = new DateTime($message['sent_at']);
            $formattedTime = $date->format('d.m H:i');

            $msg->setFormattedSentAt($formattedTime);

            $messages[] = $msg;
        }

        return $messages;
    }

    /**
     * Ajoute un message à la base de données.
     * 
     * @param Message $message L'objet Message à ajouter
     */
    public function addMessage(Message $message) : void
    {
        $sql = "INSERT INTO message (sender_id, recipient_id, message_text, sent_at) VALUES (:senderId, :recipientId, :messageText, NOW())";
        $this->db->query($sql, [
            'senderId' => $message->getSenderId(),
            'recipientId' => $message->getRecipientId(),
            'messageText' => $message->getMessageText()
        ]);
    }

     /**
     * Récupère le nombre de messages non lus pour un utilisateur donné.
     * 
     * @param int $user_id L'identifiant de l'utilisateur destinataire
     * @return Message|null Un objet Message avec le nombre de messages non lus, ou null si aucun message non lu
     */
    public function getUnreadMessageCount($user_id): array
    {
        $sql = "SELECT COUNT(*) AS unread_count FROM message WHERE recipient_id = :recipient_id AND is_read = 0";

        $result = $this->db->query($sql, [
            'recipient_id' => $recipientId
        ]); 
        $unreadMessage = $result->fetch();
        if ($unreadMessage) {
            return new Message($unreadMessage);
        }
        return $messages;
    }
    
}