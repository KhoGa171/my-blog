<?php
class Category extends Connect
{
    protected $categoryModel;
    public function __construct()
    {
        $this->categoryModel = $this->call_models("CategoryModel");
    }
    public function index()
    {
        if(isset($_POST['search'])){
            $key = $_POST['txtSearch'];
            $categories = $this->categoryModel->TKCat($key);
        } else {
            $categories =  $this->categoryModel->listCat();
        }
        $this->call_views('admin/index', [
            'folder' => 'category',
            'page' => 'index',
            'categories' => $categories,
        ]);
    }
    public function viewAddCat()
    {
        $this->call_views('admin/index', [
            'folder' => 'category',
            'page' => 'addCat'
        ]);
    }
    public function addCat()
    {
        $slug = '';
        if (isset($_POST['addCat']) && isset($_SESSION['userID'])) {
            $user_id = $_SESSION['userID'];
            $title = $_POST['txtTitle'];
            $slug = $this->to_slug($title);
            $total_row = count($this->categoryModel->searchCat($slug));
            if ($total_row > 0) {
                foreach ($this->categoryModel->listCat() as $row) {
                    $data[] = $row['slug'];
                }
                if (in_array($slug, $data)) {
                    $count = 0;
                    while (in_array(($slug . '-' . ++$count), $data));
                    $slug = $slug . '-' . $count;
                }
            }
            $result = $this->categoryModel->addCategory($user_id, $title, $slug);
            if ($result) {
                echo '<script>alert("Thêm thành công!"); window.location="' . URL . 'Category/index";</script>';
            } else {
                echo '<script>alert("Thêm không thành công!"); window.location="' . URL . 'Category/viewAddCat";</script>';
            }
        }
    }
    public function viewEditCat()
    {
        $this->call_views('admin/index', [
            'folder' => 'category',
            'page' => 'editCat',
            'categories' => $this->categoryModel->getCat($_GET['id'])
        ]);
    }
    public function editCat()
    {
        if (isset($_POST['editCat']) && isset($_SESSION['userID'])) {
            $id = $_GET['id'];
            $user_id = $_SESSION['userID'];
            $title = $_POST['txtTitle'];
            $slug = $this->to_slug($title);
            $total_row = count($this->categoryModel->searchCat($slug));
            if ($total_row > 0) {
                foreach ($this->categoryModel->listCat() as $row) {
                    $data[] = $row['slug'];
                }
                if (in_array($slug, $data)) {
                    $count = 0;
                    while (in_array(($slug . '-' . ++$count), $data));
                    $slug = $slug . '-' . $count;
                }
            }
            $result = $this->categoryModel->editCat($id, $user_id, $title, $slug);
            if ($result) {
                echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'Category/index";</script>';
            } else {
                echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Category/viewEditCat";</script>';
            }
        }
    }
    public function deleteCat()
    {
        if (isset($_GET['id'])) {
            $result = $this->categoryModel->deleteCat($_GET['id']);
            if ($result) echo '<script>alert("Xóa thành công!"); window.location="' . URL . 'Category/index";</script>';
            else echo '<script>alert("Xóa không thành công!");window.location="' . URL . 'Category/index";</script>';
        }
    }
}
