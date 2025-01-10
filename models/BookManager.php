<?php

/**
 * Classe qui gère les livres.
 */
class BookManager extends AbstractEntityManager 
{
    /**
     * Récupère tous les livres de la bibliothèque avec le nom d'utilisateur du propriétaire.
     * @return array Liste des livres sous forme d'objets Book
     */
    public function getAllBooks() : array
    {
        $sql = "SELECT library.*, user.username FROM library INNER JOIN user ON library.user_id = user.user_id";
        $result = $this->db->query($sql);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * Récupère tous les livres d'un utilisateur par son identifiant.
     * @param int $userId L'identifiant de l'utilisateur
     * @return array Liste des livres de l'utilisateur sous forme d'objets Book
     */
    public function getAllBooksFromUserId($userId) : array
    {
        $sql = "SELECT library.id_book, library.title, library.author, library.picture, library.description, library.status, library.insert_at FROM library WHERE library.user_id = :user_id";
        $result = $this->db->query($sql, ['user_id' => $userId]);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * Récupère un livre par l'identifiant de l'utilisateur.
     * @param int $userId L'identifiant de l'utilisateur
     * @return Book|null Le livre trouvé ou null si aucun livre n'est trouvé
     */
    public function getBookByUserId(int $userId) : ?Book
    {
        $sql = "SELECT * FROM library WHERE user_id = :userId";
        $result = $this->db->query($sql, ['userId' => $userId]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }

    /**
     * Récupère un livre par son identifiant.
     * @param int $id L'identifiant du livre
     * @return Book|null Le livre trouvé ou null si aucun livre n'est trouvé
     */
    public function getBookById(int $id) : ?Book
    {
        $sql = "SELECT library.*, user.username, user.user_logo, user.user_id FROM library INNER JOIN user ON library.user_id = user.user_id WHERE library.id_book = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $book = $result->fetch();
        if ($book) {
            return new Book($book);
        }
        return null;
    }
    
    /**
     * Recherche des livres par titre ou auteur.
     * @param string $query La chaîne de recherche
     * @return array Liste des livres correspondants sous forme d'objets Book
     */
    public function searchBooks(string $query): array
    {
        $sql = "SELECT library.*, user.username FROM library INNER JOIN user ON library.user_id = user.user_id WHERE library.title LIKE :query OR library.author LIKE :query";
        $result = $this->db->query($sql, ['query' => '%' . $query . '%']);
        $books = [];

        while ($book = $result->fetch()) {
            $books[] = new Book($book);
        }
        return $books;
    }

    /**
     * Ajoute un nouveau livre à la bibliothèque.
     * @param Book $book L'objet Book à ajouter
     * @return void
     */
    public function addBook(Book $book): void
    {
        $sql = "INSERT INTO library (title, author, picture, description, status, insert_at, user_id) 
                VALUES (:title, :author, :picture, :description, :status, NOW(), :user_id)";

        $this->db->query($sql, [
            'title'       => $book->getTitle(),
            'author'      => $book->getAuthor(),
            'picture'     => $book->getPicture(),
            'description' => $book->getDescription(),
            'status'      => $book->getStatus(),
            'user_id'     => $book->getUserId()
        ]);
    }

    /**
     * Met à jour un livre existant dans la bibliothèque.
     * @param int $id L'identifiant du livre à mettre à jour
     * @param string $title Le titre du livre
     * @param string $author L'auteur du livre
     * @param string $description La description du livre
     * @param string $status Le statut du livre
     * @return bool True si la mise à jour a réussi, sinon false
     */
    public function updateBook(int $id, string $title, string $author, string $description, string $status): bool
    {
        try {
            $sql = "UPDATE library SET title = :title, author = :author, description = :description, status = :status WHERE id_book = :id";

            $params = [
                'id' => $id,
                'title' => $title,
                'author' => $author,
                'description' => $description,
                'status' => $status,
            ];

            $result = $this->db->query($sql, $params);

            return $result !== false;
        } catch (Exception $e) {
            error_log("Erreur lors de la mise à jour du livre : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Supprime un livre de la bibliothèque par son identifiant.
     * @param int $idBook L'identifiant du livre à supprimer
     * @return void
     */
    public function deleteBookById(int $idBook): void
    {
        $sql = "DELETE FROM library WHERE id_book = :id_book";
        $this->db->query($sql, ['id_book' => $idBook]);
    }

} 