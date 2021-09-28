<?php
class Admin extends Connect
{
    protected $userModel;
    protected $postModel;
    protected $categoryModel;
    public function __construct()
    {
        $this->userModel = $this->call_models("UserModel");
        $this->postModel = $this->call_models("PostModel");
        $this->categoryModel = $this->call_models("CategoryModel");
    }
    function home(){
        $this->call_views('admin/index', [
            'folder' => 'layouts',
            'page' => 'home',
            'countUser' => $this->userModel->countUser(),
            'countPost' => $this->postModel->countPost(),
            'countCat' => $this->categoryModel->countCat(),
        ]);
    }
}