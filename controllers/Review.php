<?php
class Review extends Connect
{
    protected $reviewModel;
    public function __construct()
    {
        $this->reviewModel = $this->call_models("ReviewModel");
    }
    public function index()
    {
        if (isset($_POST['search'])) {
            $key = $_POST['txtSearch'];
            $reviews = $this->reviewModel->searchReview($key);
        } else {
            $reviews =  $this->reviewModel->getReview();
        }
        $this->call_views('admin/index', [
            'folder' => 'review',
            'page' => 'index',
            'reviews' => $reviews,
        ]);
    }
    public function addRate()
    {
        if (isset($_POST['review'])) {
            $user_id = $_GET['user_id'];
            $post_id = $_GET['post_id'];
            $email = $_POST['txtEmail'];
            $name = $_POST['txtName'];
            $rate = $_POST['star'];
            $slug = $_GET['slug'];
            if ($rate) {
                $result = $this->reviewModel->addRate($user_id, $post_id, $email, $name, $rate);
                if ($result) {
                    echo '<script>alert("Bạn đã đánh giá thành công!"); window.location="' . URL . 'Home/post/' . $slug . '";</script>';
                } else {
                    echo '<script>alert("Đánh giá lỗi!"); window.location="' . URL . 'Home/post/' . $slug . '";</script>';
                }
            } 
            else {
                echo '<script>alert("Bạn chưa đánh giá sao cho bài viết!"); window.location="' . URL . 'Home/post/' . $slug . '";</script>';
            }
        }
    }
}
