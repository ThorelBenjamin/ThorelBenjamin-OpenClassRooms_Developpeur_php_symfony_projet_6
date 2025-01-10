<?php

/** 
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager 
{

    /**
     * Récupère un utilisateur à partir de son nom d'utilisateur (login).
     * @param string $username Le nom d'utilisateur à rechercher.
     * @return User|null Retourne un objet User si l'utilisateur est trouvé, sinon null.
     */
    public function getUserByLogin(string $username) : ?User 
    {
        $sql = "SELECT * FROM user WHERE username = :username";
        $result = $this->db->query($sql, ['username' => $username]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }
    
    /**
     * Récupère un utilisateur à partir de son identifiant (user_id).
     * @param int $userId L'identifiant de l'utilisateur à rechercher.
     * @return User|null Retourne un objet User si l'utilisateur est trouvé, sinon null.
     */
    public function getUserById($userId) : ?User 
    {
        $sql = "SELECT * FROM user WHERE user_id = :user_id";
        $result = $this->db->query($sql, ['user_id' => $userId]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }
    
    /**
     * Ajoute un nouvel utilisateur dans la base de données.
     * @param User $user L'objet User contenant les informations de l'utilisateur à ajouter.
     * @return void
     */
    public function addUser(User $user) : void
    {
        $sql = "INSERT INTO user (username, password, email, create_at) VALUES (:username, :password, :email, NOW())";
        $this->db->query($sql, [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail()
        ]);
    }

    /**
     * Met à jour les informations d'un utilisateur dans la base de données.
     * @param User $user L'objet User contenant les informations mises à jour.
     * @return void
     */
    public function updateUser(User $user) : void
    {
        $sql = "UPDATE user SET username = :username, password = :password, email = :email WHERE user_id = :user_id";
        $this->db->query($sql, [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
            'user_id'  => $user->getUserId()
        ]);
    }
}