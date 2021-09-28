<?php
require_once('db.php');
class CategoryModel extends DBConnection
{
    public function __construct()
    {
        parent::connect();
    }
    public function getCat($id){
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function searchCat($slug){
        $sql = "SELECT * FROM categories WHERE slug LIKE '%$slug%'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function checkSlug($slug){
        $sql = "SELECT * FROM categories WHERE slug = '$slug'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function listCat(){
        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function addCategory($user_id, $title, $slug){
        $sql = "INSERT INTO categories (user_id, title, slug) values (?, ?, ?)";
        $result = $this->conn->prepare($sql);
        $result->bindParam(1, $user_id);
        $result->bindParam(2, $title);
        $result->bindParam(3, $slug);
        $result->execute();
        return $result;
    }
    public function editCat($id, $user_id, $title, $slug){
        $sql = "UPDATE categories SET user_id='$user_id', title='$title', slug='$slug' WHERE id='$id'";
        $result = $this->conn->query($sql);
        $result->execute();
        return $result;
    }
    public function deleteCat($id){
        $sql = "DELETE FROM categories WHERE id= '$id'";
        $result = $this->conn->query($sql);
        $result->execute();
        return $result;
    }
    public function TKCat($keyword){
        $sql = "SELECT * FROM categories WHERE title LIKE '%$keyword%'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function countCat(){
        $sql = "SELECT * FROM categories";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $row = $result->rowCount();
        return $row;
    }
}