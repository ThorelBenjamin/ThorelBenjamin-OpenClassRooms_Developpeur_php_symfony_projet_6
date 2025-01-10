<?php

/**
 * Entité Book : un livre est défini par son id, un titre, un auteur, son emplacement, sa description, son status, l'id de l'utilisateur et sa date d'insertion.
 */ 
class Book extends AbstractEntity 
{
    private int $idBook;
    private string $title;
    private string $author;
    private string $picture;
    private string $description;
    private int $status = 1;
    private int $userId;
    private DateTime $insertAt;
    private string $username;
    private string $userLogo;

    /**
     * Définit l'id du livre.
     * @param int $idBook L'identifiant du livre
     * @return void
     */
    public function setIdBook(int $idBook) : void 
    {
        $this->idBook = $idBook;
    }

    /**
     * Récupère l'id du livre.
     * @return int L'identifiant du livre
     */
    public function getIdBook() : int 
    {
        return $this->idBook;
    }

    /**
     * Définit le titre du livre.
     * @param string $title Le titre du livre
     * @return void
     */
    public function setTitle(string $title) : void 
    {
        $this->title = $title;
    }

    /**
     * Récupère le titre du livre.
     * @return string Le titre du livre
     */
    public function getTitle() : string 
    {
        return $this->title;
    }

    /**
     * Définit l'auteur du livre.
     * @param string $author L'auteur du livre
     * @return void
     */
    public function setAuthor(string $author) : void 
    {
        $this->author = $author;
    }

    /**
     * Récupère l'auteur du livre.
     * @return string L'auteur du livre
     */
    public function getAuthor() : string 
    {
        return $this->author;
    }

    /**
     * Définit l'image de couverture du livre.
     * @param string $picture Le chemin vers l'image du livre
     * @return void
     */
    public function setPicture(string $picture) : void 
    {
        $this->picture = $picture;
    }

    /**
     * Récupère l'image de couverture du livre.
     * @return string Le chemin vers l'image du livre
     */
    public function getPicture() : string 
    {
        return $this->picture;
    }

    /**
     * Définit la description du livre.
     * @param string $description La description du livre
     * @return void
     */
    public function setDescription(string $description) : void 
    {
        $this->description = $description;
    }

    /**
     * Récupère la description du livre.
     * @return string La description du livre
     */
    public function getDescription() : string 
    {
        return $this->description;
    }

    /**
     * Définit l'id de l'utilisateur propriétaire du livre.
     * @param int $userId L'identifiant de l'utilisateur
     * @return void
     */
    public function setUserId(int $userId) : void 
    {
        $this->userId = $userId;
    }

    /**
     * Récupère l'id de l'utilisateur propriétaire du livre.
     * @return int L'identifiant de l'utilisateur
     */
    public function getUserId() : int 
    {
        return $this->userId;
    }

    /**
     * Définit le statut du livre (disponible ou non disponible).
     * @param int $status Le statut du livre (1 pour disponible, autre pour non disponible)
     * @return void
     */
    public function setStatus(int $status) : void 
    {
        $this->status = $status;
    }

    /**
     * Récupère le statut du livre sous forme de chaîne de caractères.
     * @return string Le statut du livre ("disponible" ou "non dispo.")
     */
    public function getStatus() : string 
    {
        if ($this->status == 1) {
            return "disponible";
        } else {
            return "non dispo.";
        }
    }

    /**
     * Définit la date d'insertion du livre.
     * Si la date est une chaîne de caractères, elle est convertie en objet DateTime.
     * @param string|DateTime $insertAt La date d'insertion du livre
     * @param string $format Le format de la date (si la date est une chaîne)
     * @return void
     */
    public function setInsertAt(string|DateTime $insertAt, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($insertAt)) {
            $insertAt = DateTime::createFromFormat($format, $insertAt);
        }
        $this->insertAt = $insertAt;
    }

    /**
     * Récupère la date d'insertion du livre.
     * @return DateTime La date d'insertion du livre
     */
    public function getInsertAt() : DateTime 
    {
        return $this->insertAt;
    }

    /**
     * Définit le nom d'utilisateur du propriétaire du livre.
     * @param string $username Le nom d'utilisateur
     * @return void
     */
    public function setUsername(string $username) : void 
    {
        $this->username = $username;
    }

    /**
     * Récupère le nom d'utilisateur du propriétaire du livre.
     * @return string Le nom d'utilisateur
     */
    public function getUsername() : string 
    {
        return $this->username;
    }

    /**
     * Définit le logo de l'utilisateur propriétaire du livre.
     * @param string $userLogo Le chemin vers le logo de l'utilisateur
     * @return void
     */
    public function setUserLogo(string $userLogo) : void 
    {
        $this->userLogo = $userLogo;
    }

    /**
     * Récupère le logo de l'utilisateur propriétaire du livre.
     * @return string Le chemin vers le logo de l'utilisateur
     */
    public function getUserLogo() : string 
    {
        return $this->userLogo;
    }

}