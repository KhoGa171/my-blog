<?php
require_once('db.php');
class PostModel extends DBConnection
{
    public function __construct()
    {
        parent::connect();
    }
    public function getPost($id){
        $sql = "SELECT * FROM posts WHERE id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function getPostCat($id){
        $sql = "SELECT * FROM posts WHERE cat_id = '$id' AND status = 'active'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function postRecent(){
        $sql = "SELECT * FROM posts ORDER BY updated_at DESC LIMIT 0, 3";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function postPaging($start, $quantity){
        $sql = "SELECT * FROM posts WHERE status='active' LIMIT $start, $quantity";
        $result = $this->conn->query($sql);
        return $result;
    }
    public function listPU(){
        $sql = "SELECT * FROM posts WHERE status='active'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function listPost(){
        $sql = "SELECT * FROM posts";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function listPostID($user_id){
        $sql = "SELECT * FROM posts WHERE user_id = '$user_id'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function addPost($cat_id, $user_id, $title, $summary, $des, $photo, $slug){
        $sql = "INSERT INTO posts (cat_id, user_id, title, summary, description, photo, slug) values (?, ?, ?, ?, ?, ?, ?)";
        $result = $this->conn->prepare($sql);
        $result->bindParam(1, $cat_id);
        $result->bindParam(2, $user_id);
        $result->bindParam(3, $title);
        $result->bindParam(4, $summary);
        $result->bindParam(5, $des);
        $result->bindParam(6, $photo);
        $result->bindParam(7, $slug);
        $result->execute();
        return $result;
    }
    public function editPost($id, $cat_id, $title, $summary, $des, $photo, $status, $slug){
        $sql = "UPDATE posts SET cat_id='$cat_id', title='$title', summary='$summary', description='$des', photo='$photo', status='$status', slug='$slug' WHERE id='$id'";
        $result = $this->conn->query($sql);
        $result->execute();
        return $result;
    }
    public function deletePost($id){
        $sql = "DELETE FROM posts WHERE id= '$id'";
        $result = $this->conn->query($sql);
        $result->execute();
        return $result;
    }
    public function searchPost($slug){
        $sql = "SELECT * FROM posts WHERE slug LIKE '%$slug%'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function checkSlug($slug){
        $sql = "SELECT * FROM posts WHERE slug = '$slug'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function search($keyword, $start, $quantity){
        $sql = "SELECT * FROM posts JOIN users ON posts.user_id = users.id
        WHERE title LIKE '%$keyword%' OR summary LIKE '%$keyword%' OR description LIKE '%$keyword%' 
        OR name LIKE '%$keyword%' LIMIT $start, $quantity";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function searchAllPost($keyword){
        $sql = "SELECT * FROM posts JOIN users ON posts.user_id = users.id
        WHERE title LIKE '%$keyword%' OR summary LIKE '%$keyword%' OR description LIKE '%$keyword%'
        OR name LIKE '%$keyword%'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function TKPost($keyword){
        $sql = "SELECT * FROM posts JOIN users ON posts.user_id = users.id
        WHERE title LIKE '%$keyword%' OR summary LIKE '%$keyword%' 
        OR description LIKE '%$keyword%' OR status LIKE '%$keyword%' OR name LIKE '%$keyword%'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function TKPostID($keyword, $user_id){
        $sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%' OR summary LIKE '%$keyword%' 
        OR description LIKE '%$keyword%' OR status LIKE '%$keyword%' AND user_id = '$user_id'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function countPost(){
        $sql = "SELECT * FROM posts";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $row = $result->rowCount();
        return $row;
    }
}
//OR summary LIKE '%$keyword%' OR description LIKE '%$keyword%'