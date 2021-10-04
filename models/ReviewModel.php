<?php
require_once('db.php');
class ReviewModel extends DBConnection {
    public function __construct() {
        parent::connect();
    }
    public function getReview(){
        $sql = "SELECT * FROM post_reviews JOIN posts ON post_reviews.post_id = posts.id
        JOIN users ON post_reviews.user_id = users.id";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function checkReview($user_id, $post_id){
        $sql = "SELECT * FROM post_reviews WHERE user_id = '$user_id' AND post_id = '$post_id'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function countRate($post_id){
        $sql = "SELECT post_id, ROUND(AVG(rate),1) as countRate FROM post_reviews WHERE post_id = '$post_id'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function addRate($user_id, $post_id, $email, $name, $rate){
        $sql = "INSERT INTO post_reviews (user_id, post_id, email_review, name_review, rate) VALUES ('$user_id', '$post_id', '$email', '$name', '$rate')";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return $result;
    }
    public function searchReview($key){
        $sql = "SELECT * FROM post_reviews JOIN posts ON post_reviews.post_id = posts.id
        JOIN users ON post_reviews.user_id = users.id 
        WHERE name LIKE '%$key%' OR title LIKE'%$key%' OR email_review LIKE'%$key%' OR name_review LIKE'%$key%'";
        $result= $this->conn->query($sql);
        return $result->fetchAll();
    }
    public function countAllRate(){
        $sql = "SELECT * FROM post_reviews";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $row = $result->rowCount();
        return $row;
    }
}