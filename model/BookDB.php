<?php


namespace Model;


class BookDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM books';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $books = [];
        foreach ($result as $row) {
            $book = new Book($row['name'], $row['author']);
            $book->id = $row['id'];
            $books[] = $book;
        }
        return $books;
    }

    public function create($book)
    {
        $sql = 'INSERT INTO customer (name, author) VALUES (?, ?)';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $book->name);
        $statement->bindParam(2, $book->author);
        return $statement->execute();
    }
}