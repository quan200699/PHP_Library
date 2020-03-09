<?php


namespace Controller;

use Model\BookDB;
use Model\DBConnection;

class BookController
{
    public $bookDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=library", "root", "123456");
        $this->bookDB = new BookDB($connection->connect());
    }

    public function getAll()
    {
        $books = $this->bookDB->getAll();
        include 'view/book/list.php';
    }
}