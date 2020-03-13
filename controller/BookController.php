<?php


namespace Controller;

use Model\Book;
use Model\BookDB;
use Model\CategoryDB;
use Model\DBConnection;

class BookController
{
    public $bookDB;
    public $categoryDB;

    public function __construct()
    {
        $connection = new DBConnection("pgsql:host=ec2-52-87-58-157.compute-1.amazonaws.com;dbname=d17a9mgkqjdtb8",
            "amuzveojvxwycw",
            "77e503ae4123247d680bbca6f6ddf14a2bacb8c44923466a4b190bb970d7f617");
        $this->bookDB = new BookDB($connection->connect());
        $this->categoryDB = new CategoryDB($connection->connect());
    }

    public function getAll()
    {
        $books = $this->bookDB->getAll();
        include 'view/book/list.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categories = $this->categoryDB->getAll();
            include 'view/book/add.php';
        } else {
            $name = $_POST['name'];
            $author = $_POST['author'];
            $category = $_POST['category'];
            $book = new Book($name, $author);
            $book->category = $category;
            $this->bookDB->create($book);
            $message = 'created!';
            include 'view/book/add.php';
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->getOne($id);
            $categories = $this->categoryDB->getAll();
            include 'view/book/update.php';
        } else {
            $id = $_POST['id'];
            $book = new Book($_POST['name'], $_POST['author']);
            $book->category = $_POST['category'];
            $this->bookDB->update($id, $book);
            header('Location: book-management.php');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $book = $this->bookDB->getOne($id);
            include 'view/book/delete.php';
        } else {
            $id = $_POST['id'];
            $this->bookDB->delete($id);
            header('Location: book-management.php');
        }
    }

    public function searchByName()
    {
        $name = $_GET['nameSearch'];
        $books = $this->bookDB->findAllByNameContaining($name);
        include 'view/book/list.php';
    }
}