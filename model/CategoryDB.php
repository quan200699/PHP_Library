<?php


namespace Model;


class CategoryDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM categories';
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $categories = [];
        foreach ($result as $row) {
            $category = new Category($row['name']);
            $category->id = $row['id'];
            $categories[] = $category;
        }
        return $categories;
    }

    public function create($category)
    {
        $sql = 'INSERT INTO categories (name) VALUES (?)';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $category->name);
        return $statement->execute();
    }

    public function update($id, $category)
    {
        $sql = 'UPDATE categories SET name = ? WHERE  id = ?';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $category->name);
        $statement->bindParam(2, $id);
        return $statement->execute();
    }

    public function getOne($id)
    {
        $sql = 'SELECT * FROM categories WHERE  id = ?';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $id);
        $statement->execute();
        $row = $statement->fetch();
        $category = new Category($row['name']);
        $category->id = $row['id'];
        return $category;
    }
}