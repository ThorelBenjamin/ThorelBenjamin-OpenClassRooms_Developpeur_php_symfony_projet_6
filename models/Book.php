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
    private int $status;
    private int $userId;
    private DateTime $insertAt;
    private string $username;
    private string $userLogo;

    public function setIdBook(int $idBook) : void 
    {
        $this->idBook = $idBook;
    }

    public function getIdBook() : int 
    {
        return $this->idBook;
    }

    public function setTitle(string $title) : void 
    {
        $this->title = $title;
    }

    public function getTitle() : string 
    {
        return $this->title;
    }

    public function setAuthor(string $author) : void 
    {
        $this->author = $author;
    }

    public function getAuthor() : string 
    {
        return $this->author;
    }

    
    public function setPicture(string $picture) : void 
    {
        $this->picture = $picture;
    }

    public function getPicture() : string 
    {
        return $this->picture;
    }

    public function setDescription(string $description) : void 
    {
        $this->description = $description;
    }

    public function getDescription() : string 
    {
        return $this->description;
    }

    public function setUserId(int $userId) : void 
    {
        $this->userId = $userId;
    }

    public function getUserId() : int 
    {
        return $this->userId;
    }

    public function setStatus(int $status) : void 
    {
        $this->status = $status;
    }

    public function getStatus() : string 
    {
        if ($this->status == 1) {
            return "disponible";
        } else {
            return "non dispo.";
        }
    }

    public function setInsertAt(string|DateTime $insertAt, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($insertAt)) {
            $insertAt = DateTime::createFromFormat($format, $insertAt);
        }
        $this->insertAt = $insertAt;
    }

    public function getInsertAt() : DateTime 
    {
        return $this->insertAt;
    }

    public function setUsername(string $username) : void 
    {
        $this->username = $username;
    }

    public function getUsername() : string 
    {
        return $this->username;
    }

    public function setUserLogo(string $userLogo) : void 
    {
        $this->userLogo = $userLogo;
    }

    public function getUserLogo() : string 
    {
        return $this->userLogo;
    }

}