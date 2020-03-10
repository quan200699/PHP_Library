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
        $sql = 'INSERT INTO books (name, author, category_id) VALUES (?, ?, ?)';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $book->name);
        $statement->bindParam(2, $book->author);
        $statement->bindParam(3, $book->category);
        return $statement->execute();
    }

    public function getOne($id)
    {
        $sql = 'SELECT * FROM books WHERE id = ?';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $book = new Book($row['name'], $row['author']);
        $book->id = $row['id'];
        $book->category = $row['category_id'];
        return $book;
    }

    public function update($id, $book)
    {
        $sql = 'UPDATE books SET name = ?, author = ?, category_id = ? WHERE  id =?';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $book->name);
        $statement->bindParam(2, $book->author);
        $statement->bindParam(3, $book->category);
        $statement->bindParam(4, $id);
        return $statement->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM books WHERE id = ?';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        return $statement->execute();
    }
}