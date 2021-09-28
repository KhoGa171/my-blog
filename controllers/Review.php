<?php
class Review extends Connect {
    protected $reviewModel;
    public function __construct(){
        $this->reviewModel = $this->call_models("ReviewModel");
    }
    public function addRate(){
        if(isset($_SESSION['userID'])){
            if(isset($_POST['review'])){
                $user_id = $_SESSION['userID'];
                $post_id = $_GET['post_id'];
                $rate = $_POST['star'];
                $slug = $_GET['slug'];
                if(empty($this->reviewModel->checkReview($user_id, $post_id))){
                    $result = $this->reviewModel->addRate($user_id, $post_id, $rate);
                    if($result){
                        echo '<script>alert("Bạn đã đánh giá thành công!"); window.location="' . URL . 'Home/post/'.$slug.'";</script>';
                    } else {
                        echo '<script>alert("Đánh giá lỗi!"); window.location="' . URL . 'Home/post/'.$slug.'";</script>';
                    }
                } else {
                    echo '<script>alert("Bạn đã đánh giá bài viết này rồi!"); window.location="' . URL . 'Home/post/'.$slug.'";</script>';
                }
            }
        } else{
            echo '<script>alert("Bạn cần đăng nhập để đánh giá!"); window.location="' . URL . 'LoginController/login";</script>';
        }
    }
}