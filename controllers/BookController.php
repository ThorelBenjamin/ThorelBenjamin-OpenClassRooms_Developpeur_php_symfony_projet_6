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

    public function updateBook() : void
{
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

    public function userPage() : void
    {
        try {
            $id = Utils::request("id", -1);

            $userManager = new UserManager();
            $user = $userManager->getUserById($id);

            $bookManager = new BookManager();
            $book = $bookManager->getAllBooksFromUserId($user->getUserId());

            if (!$user) {
                throw new Exception("L'utilisateur demandé n'existe pas.");
            }

            if ($user !== null && $user->getCreateAt() instanceof DateTime) {
                $accountCreationDate = $user->getCreateAt();
                
                $accountDuration = Utils::userTime($accountCreationDate);
            }

            $view = new View($user->getUsername());
            $view->render("userPage", ['user' => $user, 'accountDuration' => $accountDuration, 'book' => $book]);
        } catch (Exception $e) {
            $errorView = new View('Erreur');
            $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
        }
    }

    public function CreateBook() : void
    {

        $view = new View("Création de livre");
        $view->render("createBook", []);
    }

    public function addBook(){
        try {
            $userId = $_SESSION['userId'];
            $title = Utils::request("title", "");
            $author = Utils::request("author", "");
            $picture = Utils::request("picture", "");
            $description = Utils::request("description", "");
            
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

    public function updateBookInfo(){
        try {
            $id = Utils::request("id", -1);
            $title = Utils::request("title", "");
            $author = Utils::request("author", "");
            $description = Utils::request("description", "");
            $status = Utils::request("status", "");
    
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

    public function deleteBook()
{
    try {
        $idBook = Utils::request("id");

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
    
}