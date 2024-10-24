<?php


class Message extends AbstractEntity 
{
    private int $idMessage;
    private int $senderId;
    private int $recipientId;
    private string $messageText;
    private int $isRead;
    private DateTime $sentAt;


    public function setIdMessage(int $idMessage) : void 
    {
        $this->idMessage = $idMessage;
    }

    public function getIdMessage() : int 
    {
        return $this->idMessage;
    }

    public function setSenderId(int $senderId) : void 
    {
        $this->senderId = $senderId;
    }

    public function getSenderId() : int 
    {
        return $this->senderId;
    }

    public function setRecipientId(int $recipientId) : void 
    {
        $this->recipientId = $recipientId;
    }

    public function getRecipientId() : int 
    {
        return $this->recipientId;
    }

    public function setMessageText(string $messageText) : void 
    {
        $this->messageText = $messageText;
    }

    public function getMessageText() : string 
    {
        return $this->messageText;
    }

    public function setIsRead(int $isRead) : void 
    {
        $this->isRead = $isRead;
    }

    public function getIsRead() : int 
    {
        return $this->isRead;
    }

    public function setSentAt(string|DateTime $sentAt, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($sentAt)) {
            $sentAt = DateTime::createFromFormat($format, $sentAt);
        }
        $this->sentAt = $sentAt;
    }

    public function getSentAt() : DateTime 
    {
        return $this->sentAt;
    }

}