<?php 

class ConnectionController 
{
    /**
     * Affiche la page de connection.
     * @return void
     */
    public function showConnection() : void
    {
        $view = new View("Connexion");
        $view->render("connexion");
    }

    public function showRegistration() : void
    {
        $view = new View("Inscription");
        $view->render("registration");
    }

    public function showDashboard() : void
    {
        $this->checkIfUserIsConnected();

        $userId = $_SESSION['userId'];

        $userManager = new UserManager();
        $user = $userManager->getUserById($userId);
        
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooksFromUserId($userId);
        
        $view = new View("Mon compte");
        $view->render("dashboard", ['user' => $user, 'books' => $books]);
    }

    public function addUser()
    {
        $username = Utils::request("username");
        $password = Utils::request("password");
        $email = Utils::request("email");

        if (empty($username) || empty($password) || empty($email)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $user = new User([
            'username' => $username,
            'password' => $hashedPassword,
            'email' => $email
        ]);

        $userManager = new UserManager();
        $result = $userManager->addUser($user);

        Utils::redirect("dashboard");
    }

    public function updateUser()
    {
        $userId = Utils::request("userId");
        $username = Utils::request("username");
        $password = Utils::request("password");
        $email = Utils::request("email");

        Utils::redirect("dashboard");
    }

    private function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect("connexion");
        }
    }

    public function connectUser() : void 
    {
        // On récupère les données du formulaire.
        $username = Utils::request("username");
        $password = Utils::request("password");

        // On vérifie que les données sont valides.
        if (empty($username) || empty($password)) {
            throw new Exception("Tous les champs sont obligatoires. 2");
        }

        // On vérifie que l'utilisateur existe.
        $userManager = new UserManager();
        $user = $userManager->getUserByLogin($username);
        if (!$user) {
            throw new Exception("L'utilisateur demandé n'existe pas.");
        }

        // On vérifie que le mot de passe est correct.
        if (!password_verify($password, $user->getPassword())) {
            throw new Exception("Le mot de passe est incorrect");
        }

        // On connecte l'utilisateur.
        $_SESSION['userId'] = $user->getUserId();

        // On redirige vers la page d'administration.
        Utils::redirect("dashboard");
    }
}