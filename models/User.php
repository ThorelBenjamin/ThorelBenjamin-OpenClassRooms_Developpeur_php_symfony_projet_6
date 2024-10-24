<?php

/**
 * Entité User : un user est défini par son id, un username et un password.
 */ 
class User extends AbstractEntity 
{
    private int $userId;
    private string $username;
    private string $password;
    private string $email;
    private string $userLogo;
    private DateTime $createAt;

    /**
     * Setter pour le username.
     * @param string $username
     */
    public function setUsername(string $username) : void 
    {
        $this->username = $username;
    }

    /**
     * Getter pour le username.
     * @return string
     */
    public function getUsername() : string 
    {
        return $this->username;
    }

    public function setUserId(int $userId) : void 
    {
        $this->userId = $userId;
    }

    public function getUserId() : int 
    {
        return $this->userId;
    }

    public function setPassword(string $password) : void 
    {
        $this->password = $password;
    }

    public function getPassword() : string 
    {
        return $this->password;
    }

    public function setUserLogo(string $userLogo) : void 
    {
        $this->userLogo = $userLogo;
    }

    public function getUserLogo() : string 
    {
        return $this->userLogo;
    }


    /**
     * Setter pour l'email'
     * @param string $email
     */
    public function setEmail(string $email) : void 
    {
        $this->email = $email;
    }

    /**
     * Getter pour l'email'.
     * @return string
     */
    public function getEmail() : string 
    {
        return $this->email;
    }

    public function setCreateAt(string|DateTime $createAt, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($createAt)) {
            $createAt = DateTime::createFromFormat($format, $createAt);
        }
        $this->createAt = $createAt;
    }

    public function getCreateAt() : DateTime 
    {
        return $this->createAt;
    }

}