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
     * Setter pour le nom d'utilisateur.
     * @param string $username Le nom d'utilisateur à définir
     */
    public function setUsername(string $username) : void 
    {
        $this->username = $username;
    }

    /**
     * Getter pour le nom d'utilisateur.
     * @return string Le nom d'utilisateur de l'utilisateur
     */
    public function getUsername() : string 
    {
        return $this->username;
    }

    /**
     * Setter pour l'identifiant de l'utilisateur.
     * @param int $userId L'identifiant de l'utilisateur
     */
    public function setUserId(int $userId) : void 
    {
        $this->userId = $userId;
    }

    /**
     * Getter pour l'identifiant de l'utilisateur.
     * @return int L'identifiant de l'utilisateur
     */
    public function getUserId() : int 
    {
        return $this->userId;
    }

    /**
     * Setter pour le mot de passe de l'utilisateur.
     * @param string $password Le mot de passe à définir
     */
    public function setPassword(string $password) : void 
    {
        $this->password = $password;
    }

    /**
     * Getter pour le mot de passe de l'utilisateur.
     * @return string Le mot de passe de l'utilisateur
     */
    public function getPassword() : string 
    {
        return $this->password;
    }

    /**
     * Setter pour le logo de l'utilisateur.
     * @param string $userLogo Le logo ou avatar de l'utilisateur à définir
     */
    public function setUserLogo(string $userLogo) : void 
    {
        $this->userLogo = $userLogo;
    }

    /**
     * Getter pour le logo de l'utilisateur.
     * @return string Le logo ou avatar de l'utilisateur
     */
    public function getUserLogo() : string 
    {
        return $this->userLogo;
    }

    /**
     * Setter pour l'email de l'utilisateur.
     * @param string $email L'email à définir
     */
    public function setEmail(string $email) : void 
    {
        $this->email = $email;
    }

    /**
     * Getter pour l'email de l'utilisateur.
     * @return string L'email de l'utilisateur
     */
    public function getEmail() : string 
    {
        return $this->email;
    }

    /**
     * Setter pour la date de création du compte de l'utilisateur.
     * La date peut être passée soit sous forme de chaîne de caractères (avec un format spécifique), soit sous forme d'objet DateTime.
     * @param string|DateTime $createAt La date de création du compte
     * @param string $format Le format de la date sous forme de chaîne (par défaut 'Y-m-d H:i:s')
     */
    public function setCreateAt(string|DateTime $createAt, string $format = 'Y-m-d H:i:s') : void 
    {
        if (is_string($createAt)) {
            $createAt = DateTime::createFromFormat($format, $createAt);
        }
        $this->createAt = $createAt;
    }

    /**
     * Getter pour la date de création du compte de l'utilisateur.
     * @return DateTime La date de création du compte de l'utilisateur
     */
    public function getCreateAt() : DateTime 
    {
        return $this->createAt;
    }

}