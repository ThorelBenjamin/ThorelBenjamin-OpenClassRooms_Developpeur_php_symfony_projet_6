<?php

/** 
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager 
{

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
    

    public function addUser(User $user) : void
    {
        $sql = "INSERT INTO user (username, password, email, create_at) VALUES (:username, :password, :email, NOW())";
        $this->db->query($sql, [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail()
        ]);
    }

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