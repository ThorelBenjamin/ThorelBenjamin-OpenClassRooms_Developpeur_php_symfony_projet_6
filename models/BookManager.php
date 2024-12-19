<?php

/**
 * Classe qui gère les livres.
 */
class BookManager extends AbstractEntityManager 
{
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

} 