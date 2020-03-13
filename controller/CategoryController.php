<?php


namespace Controller;


use Model\Category;
use Model\CategoryDB;
use Model\DBConnection;

class CategoryController
{
    public $categoryDB;

    public function __construct()
    {
        $connection = new DBConnection("pgsql:host=ec2-52-87-58-157.compute-1.amazonaws.com;dbname=d17a9mgkqjdtb8",
            "amuzveojvxwycw",
            "77e503ae4123247d680bbca6f6ddf14a2bacb8c44923466a4b190bb970d7f617");
        $this->categoryDB = new CategoryDB($connection->connect());
    }

    public function getAll()
    {
        $categories = $this->categoryDB->getAll();
        include 'view/category/list.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/category/create.php';
        } else {
            $name = $_POST['name'];
            $category = new Category($name);
            $this->categoryDB->create($category);
            $message = 'Created!';
            include 'view/category/create.php';
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->getOne($id);
            include 'view/category/update.php';
        } else {
            $id = $_POST['id'];
            $category = new Category($_POST['name']);
            $this->categoryDB->update($id, $category);
            header('Location: category-management.php');
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $category = $this->categoryDB->getOne($id);
            include 'view/category/delete.php';
        } else {
            $id = $_POST['id'];
            $this->categoryDB->delete($id);
            header('Location: category-management.php');
        }
    }
}