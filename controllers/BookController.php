<?php 

class BookController 
{
    /**
     * Affiche la page d'accueil.
     * @return void
     */
    public function showHome() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();
        $lastBooks = array_slice($books, -4);

        $view = new View("Accueil");
        $view->render("home", ['books' => $lastBooks]);
    }

    /**
     * Affiche la page des livres à l'échange.
     * Si un terme de recherche est fourni, les livres correspondants sont affichés, sinon tous les livres sont affichés.
     * @return void
     */
    public function showExchange() : void
    {
        $query = Utils::request("search", "");
        $bookManager = new BookManager();

        if (!empty($query)) {
            // Si un terme de recherche est fourni, chercher les livres correspondants
            $books = $bookManager->searchBooks($query);
            if (empty($books)) {
                $books = [];
            }
        } else {
            $books = $bookManager->getAllBooks();
        }

        $view = new View("Livres à l'échange");
        $view->render("exchange", ['books' => $books, 'query' => $query]);
    }
    
    /**
     * Affiche les détails d'un livre spécifique.
     * Si le livre n'existe pas, une exception est levée.
     * @return void
     */
    public function showBook() : void
    {
        // Récupération de l'id de l'article demandé.
        $id = Utils::request("id", -1);

        $bookManager = new BookManager();
        $book = $bookManager->getBookById($id);
        
        if (!$book) {
            throw new Exception("Le livre demandé n'existe pas.");
        }

        $view = new View($book->getTitle());
        $view->render("showBook", ['book' => $book]);
    }

    /**
     * Affiche la page pour modifier un livre.
     * Vérifie si l'utilisateur a l'autorisation de modifier le livre avant d'afficher la vue.
     * @return void
     */
    public function updateBook() : void
    {
        $this->checkIfUserIsConnected();
        try {
            $id = Utils::request("id", -1);

            $bookManager = new BookManager();
            $book = $bookManager->getBookById($id);

            if (!$book) {
                throw new Exception("Le livre demandé n'existe pas.");
            }

            if ($book->getUserId() == $_SESSION['userId']) {
                $view = new View("Modifier le livre");
                $view->render("updateBook", ['book' => $book]);
            } else {
                throw new Exception("Vous n'avez pas l'autorisation de modifier ce livre.");
            }
        } catch (Exception $e) {
            $errorView = new View('Erreur');
            $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
        }
    }

    /**
     * Affiche la page d'un utilisateur avec ses livres et la durée de son compte.
     * Si l'utilisateur n'existe pas, une exception est levée.
     * @return void
     */
    public function userPage() : void
    {
        
        try {
            $id = Utils::request("id", -1);

            if ($id == '-1') {
                throw new Exception("L'identifiant est manquant");
            }

            $userManager = new UserManager();
            $user = $userManager->getUserById($id);
            $currentPage = Utils::request("page", 1);
            $booksPerPage = 4;

            $bookManager = new BookManager();
            $book = $bookManager->getAllBooksFromUserId($user->getUserId());


            if (!$user) {
                throw new Exception("L'utilisateur demandé n'existe pas.");
            }

            $pagination = Utils::paginate($book, $currentPage, $booksPerPage);

            if ($user !== null && $user->getCreateAt() instanceof DateTime) {
                $accountCreationDate = $user->getCreateAt();
                
                $accountDuration = Utils::userTime($accountCreationDate);
            }

            $view = new View($user->getUsername());
            $view->render("userPage", ['user' => $user, 'accountDuration' => $accountDuration, 'books' => $pagination['items'], 'currentPage' => $pagination['currentPage'], 'totalPages' => $pagination['totalPages']]);
        } catch (Exception $e) {
            $errorView = new View('Erreur');
            $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
        }
    }

    /**
     * Affiche la page de création d'un livre.
     * @return void
     */
    public function CreateBook() : void
    {
        $this->checkIfUserIsConnected();

        $view = new View("Création de livre");
        $view->render("createBook", []);
    }

    /**
     * Ajoute un livre dans la base de données.
     * Si l'ajout est réussi, redirige vers le tableau de bord, sinon une exception est levée.
     * @return void
     */
    public function addBook()
    {
        $this->checkIfUserIsConnected();

        try {
            $userId = $_SESSION['userId'];
            $title = Utils::request("title", "");
            $author = Utils::request("author", "");
            $picture = Utils::request("picture", "");
            $description = Utils::request("description", "");

            if (empty($userId) || empty($title) || empty($author) || empty($description)) {
                // Si un champ obligatoire est manquant, redirige vers le menu de création
                Utils::redirect("createBook");
                return;
            }

            $picture = "Livre_template.jpg";
            
            $book = new Book([
                'user_id' => $userId,
                'title' => $title,
                'author' => $author,
                'picture' => $picture,
                'description' => $description
                
            ]);

            $bookManager = new BookManager();
            $result = $bookManager->addBook($book);
            
            
            if ($book) {
                Utils::redirect("dashboard");
            } else {
                throw new Exception("Une erreur est survenue lors de la création du livre.");
            }
        } catch (Exception $e) {
            $view = new View("Erreur");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }
    }

    /**
     * Met à jour les informations d'un livre spécifique.
     * Si la mise à jour est réussie, redirige vers le tableau de bord, sinon une exception est levée.
     * @return void
     */
    public function updateBookInfo()
    {
        $this->checkIfUserIsConnected();

        try {
            $id = Utils::request("id", null);
            $title = Utils::request("title", "");
            $author = Utils::request("author", "");
            $description = Utils::request("description", "");
            $status = Utils::request("status", "");

            if (empty($idBook)) {
                throw new Exception("L'identifiant du livre est manquant.");
            }

            $bookManager = new BookManager();
            $success = $bookManager->updateBook($id, $title, $author, $description, $status);
    
            if ($success) {
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                throw new Exception("Une erreur est survenue lors de la mise à jour du livre.");
            }
        } catch (Exception $e) {
            $view = new View("Erreur");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }
    }

    /**
     * Supprime un livre spécifique de la base de données.
     * Vérifie si l'utilisateur a l'autorisation de supprimer le livre avant de le supprimer.
     * @return void
     */
    public function deleteBook()
    {
        $this->checkIfUserIsConnected();
        
        try {
            $idBook = Utils::request("id", null);

            if (empty($idBook)) {
                throw new Exception("L'identifiant du livre est manquant.");
            }

            $bookManager = new BookManager();
            $book = $bookManager->getBookById($idBook);

            if (!$idBook) {
                throw new Exception("L'identifiant du livre est manquant.");
            }

            if ($book->getUserId() == $_SESSION['userId']) {
                $view = new View("Modifier le livre");
                $view->render("updateBook", ['book' => $book]);
            } else {
                throw new Exception("Vous n'avez pas l'autorisation de supprimer ce livre.");
            }

            $bookManager = new BookManager();
            $bookManager->deleteBookById($idBook);

            Utils::redirect("dashboard");
        } catch (Exception $e) {
            $view = new View("Erreur");
            $view->render("errorPage", ['errorMessage' => $e->getMessage()]);
        }
    }
    
    /**
     * Vérifie si l'utilisateur est connecté.
     * Si l'utilisateur n'est pas connecté (aucun identifiant utilisateur dans la session),
     * il est redirigé vers la page de connexion.
     * @return void
     */
    private function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['userId'])) {
            Utils::redirect("connexion");
        }
    }
}