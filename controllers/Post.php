<?php
class Post extends Connect
{
    protected $postModel;
    protected $userModel;
    protected $categoryModel;
    public function __construct()
    {
        $this->postModel = $this->call_models("PostModel");
        $this->userModel = $this->call_models("UserModel");
        $this->categoryModel = $this->call_models("CategoryModel");
    }
    public function index()
    {
        if($_SESSION['role']=='admin'||$_SESSION['role']=='editor'){
            if(isset($_POST['search'])){
                $key = $_POST['txtSearch'];
                $posts = $this->postModel->TKPost($key);
            } else {
                $posts =  $this->postModel->listPost();
            }
            $this->call_views('admin/index', [
                'folder' => 'post',
                'page' => 'index',
                'posts' => $posts,
                'users' => $this->userModel->listUser(),
                'categories' => $this->categoryModel->listCat()
            ]);
        } else {
            if(isset($_POST['search'])){
                $key = $_POST['txtSearch'];
                $posts = $this->postModel->TKPostID($key, $_SESSION['userID']);
            } else {
                $posts =  $this->postModel->listPostID($_SESSION['userID']);
            }
            $this->call_views('admin/index', [
                'folder' => 'post',
                'page' => 'index',
                'posts' => $posts,
                'users' => $this->userModel->listUser(),
                'categories' => $this->categoryModel->listCat()
            ]);
        }
    }
    public function viewAddPost()
    {
        $this->call_views('admin/index', [
            'folder' => 'post',
            'page' => 'addPost',
            'categories' => $this->categoryModel->listCat()
        ]);
    }
    public function addPost()
    {
        if (isset($_POST['addPost']) && isset($_SESSION['userID'])) {
            $cat_id = $_POST['txtCatID'];
            $user_id = $_SESSION['userID'];
            $title = $_POST['txtTitle'];
            $summary = $_POST['txtSumm'];
            $des = $_POST['txtDes'];
            $slug = $this->to_slug($title);
            $total_row = count($this->postModel->searchPost($slug));
            if ($total_row > 0) {
                foreach ($this->postModel->listPost() as $row) {
                    $data[] = $row['slug'];
                }
                if (in_array($slug, $data)) {
                    $count = 0;
                    while (in_array(($slug . '-' . ++$count), $data));
                    $slug = $slug . '-' . $count;
                }
            }
            if (isset($_FILES['fileToUpload'])) {
                if ($_FILES['fileToUpload']['error'] > 0) {
                    echo '<script>alert("Bạn chưa chọn file upload!"); window.location="' . URL . 'Post/viewAddPost";</script>';
                } else {
                    $photo = $_FILES['fileToUpload']['name'];
                    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
                    if ($check !== false) {
                        move_uploaded_file($_FILES['fileToUpload']['tmp_name'], './public/uploads/' . $photo);
                        $result = $this->postModel->addPost($cat_id, $user_id, $title, $summary, $des, $photo, $slug);
                        if ($result) {
                            echo '<script>alert("Thêm thành công!"); window.location="' . URL . 'Post/index";</script>';
                        } else {
                            echo '<script>alert("Thêm không thành công!"); window.location="' . URL . 'Post/viewAddPost";</script>';
                        }
                    } else echo '<script>alert("Bạn chọn không phải là file ảnh!"); window.location="' . URL . 'Post/viewAddPost";</script>';
                }
            } else  echo '<script>alert("Lỗi!"); window.location="' . URL . 'Post/viewAddPost";</script>';
        }
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        //     echo '<script>alert("Sorry, only JPG, JPEG, PNG files are allowed!"); window.location="' . URL . 'Post/viewAddPost";</script>';
        // }
    }
    public function viewEditPost()
    {
        $this->call_views('admin/index', [
            'folder' => 'post',
            'page' => 'editPost',
            'posts' => $this->postModel->getPost($_GET['id']),
            'categories' => $this->categoryModel->listCat()
        ]);
    }
    public function editPost()
    {
        if (isset($_POST['editPost']) && isset($_SESSION['userID'])) {
            $cat_id = $_POST['txtCatID'];
            $title = $_POST['txtTitle'];
            $summary = $_POST['txtSumm'];
            $des = $_POST['txtDes'];
            $status = $_POST['txtStatus'];
            $pt = $_POST['txtPhoto'];
            $slug = $this->to_slug($title);
            $total_row = count($this->postModel->searchPost($slug));
            if ($total_row > 0) {
                foreach ($this->postModel->listPost() as $row) {
                    $data[] = $row['slug'];
                }
                if (in_array($slug, $data)) {
                    $count = 0;
                    while (in_array(($slug . '-' . ++$count), $data));
                    $slug = $slug . '-' . $count;
                }
            }
            if (isset($_FILES['fileToUpload'])) {
                if ($_FILES['fileToUpload']['error'] > 0) {
                    $result = $this->postModel->editPost($_GET['id'], $cat_id, $title, $summary, $des, $pt, $status, $slug);
                    if ($result) {
                        echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'Post/index";</script>';
                    } else {
                        echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Post/viewAddPost";</script>';
                    }
                } else {
                    unlink('./public/uploads/' . $pt);
                    $photo = $_FILES['fileToUpload']['name'];
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], './public/uploads/' . $photo);
                    $result = $this->postModel->editPost($_GET['id'], $cat_id, $title, $summary, $des, $photo, $status, $slug);
                    if ($result) {
                        echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'Post/index";</script>';
                    } else {
                        echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Post/viewAddPost";</script>';
                    }
                }
            } 
        }
    }
    public function deletePost()
    {
        if (isset($_GET['id'])) {
            $result = $this->postModel->deletePost($_GET['id']);
            if ($result) echo '<script>alert("Xóa thành công!"); window.location="' . URL . 'Post/index";</script>';
            else echo '<script>alert("Xóa không thành công!");window.location="' . URL . 'Post/index";</script>';
        }
    }
}
