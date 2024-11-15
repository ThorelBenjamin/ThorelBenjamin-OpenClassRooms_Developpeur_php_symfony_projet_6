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

    public function showDashboard() : void
    {
        $bookManager = new BookManager();
        $books = $bookManager->getAllBooks();

        $view = new View("Livres à l'échange");
        $view->render("exchange", ['books' => $books]);
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

    public function updateBookInfo() : void
    {
        
    }
    
}