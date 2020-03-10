<?php


namespace Controller;


use Model\CategoryDB;
use Model\DBConnection;

class CategoryController
{
    public $categoryDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=library", "root", "123456");
        $this->categoryDB = new CategoryDB($connection->connect());
    }

    public function getAll()
    {
        $categories = $this->categoryDB->getAll();
        include 'view/category/list.php';
    }
}