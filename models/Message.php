<?php


class Message extends AbstractEntity 
{
    private int $idMessage;
    private int $senderId;
    private int $recipientId;
    private string $messageText;
    private int $isRead;
    private DateTime $sentAt;
    private string $username;
    private string $userLogo;
    private string $formattedSentAt;

    /**
     * Définit l'identifiant du message.
     * @param int $idMessage L'identifiant du message
     */
    public function setIdMessage(int $idMessage) : void 
    {
        $this->idMessage = $idMessage;
    }

    /**
     * Récupère l'identifiant du message.
     * @return int L'identifiant du message
     */
    public function getIdMessage() : int 
    {
        return $this->idMessage;
    }

    /**
     * Définit l'identifiant de l'expéditeur du message.
     * @param int $senderId L'identifiant de l'expéditeur
     */
    public function setSenderId(int $senderId) : void 
    {
        $this->senderId = $senderId;
    }

    /**
     * Récupère l'identifiant de l'expéditeur du message.
     * @return int L'identifiant de l'expéditeur
     */
    public function getSenderId() : int 
    {
        return $this->senderId;
    }

    /**
     * Définit l'identifiant du destinataire du message.
     * @param int $recipientId L'identifiant du destinataire
     */
    public function setRecipientId(int $recipientId) : void 
    {
        $this->recipientId = $recipientId;
    }

    /**
     * Récupère l'identifiant du destinataire du message.
     * @return int L'identifiant du destinataire
     */
    public function getRecipientId() : int 
    {
        return $this->recipientId;
    }

    /**
     * Définit le texte du message.
     * @param string $messageText Le contenu du message
     */
    public function setMessageText(string $messageText) : void 
    {
        $this->messageText = $messageText;
    }

    /**
     * Récupère le texte du message.
     * @return string Le contenu du message
     */
    public function getMessageText() : string 
    {
        return $this->messageText;
    }

    /**
     * Définit l'état de lecture du message (0 pour non lu, 1 pour lu).
     * @param int $isRead L'état de lecture (0 ou 1)
     */
    public function setIsRead(int $isRead) : void 
    {
        $this->isRead = $isRead;
    }

    /**
     * Récupère l'état de lecture du message.
     * @return int L'état de lecture (0 ou 1)
     */
    public function getIsRead() : int 
    {
        return $this->isRead;
    }

    /**
     * Définit la date d'envoi du message.
     * Si la date est fournie sous forme de chaîne, elle sera convertie en objet DateTime.
     * @param string|DateTime $sentAt La date d'envoi (sous forme de chaîne ou DateTime)
     * @param string $format Le format de la chaîne de date (par défaut : 'Y-m-d H:i:s')
     */
    public function setSentAt(string|DateTime $sentAt, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($sentAt)) {
            $sentAt = DateTime::createFromFormat($format, $sentAt);
        }
        $this->sentAt = $sentAt;
    }

    /**
     * Récupère la date d'envoi du message.
     * @return DateTime La date d'envoi du message
     */
    public function getSentAt() : DateTime 
    {
        return $this->sentAt;
    }

    /**
     * Définit la date d'envoi formatée du message.
     * @param string $formattedSentAt La date d'envoi formatée (en chaîne)
     */
    public function setFormattedSentAt(string $formattedSentAt)
    {
        $this->formattedSentAt = $formattedSentAt;
    }

    /**
     * Récupère la date d'envoi formatée du message.
     * @return string La date d'envoi formatée
     */
    public function getFormattedSentAt() : string
    {
        return $this->formattedSentAt;
    }

    /**
     * Définit le nom d'utilisateur associé au message.
     * @param string $username Le nom d'utilisateur
     */
    public function setUsername(string $username) : void 
    {
        $this->username = $username;
    }

    /**
     * Récupère le nom d'utilisateur associé au message.
     * @return string Le nom d'utilisateur
     */
    public function getUsername() : string 
    {
        return $this->username;
    }

    /**
     * Définit le logo de l'utilisateur associé au message.
     * @param string $userLogo Le logo de l'utilisateur
     */
    public function setUserLogo(string $userLogo) : void 
    {
        $this->userLogo = $userLogo;
    }

    /**
     * Récupère le logo de l'utilisateur associé au message.
     * @return string Le logo de l'utilisateur
     */
    public function getUserLogo() : string 
    {
        return $this->userLogo;
    }

}