<?php

class MessageManager extends AbstractEntityManager 
{

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

    
    public function getMessagesForUserAndSender($user_id, $senderId): array
    {
        $sql = "SELECT m.*, u.username, u.user_logo FROM message m JOIN user u ON m.sender_id = u.user_id WHERE (m.recipient_id = :user_id OR m.recipient_id = :senderId) AND (m.sender_id = :senderId OR m.sender_id = :user_id)";

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
    
}