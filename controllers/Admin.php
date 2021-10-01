<?php
class Admin extends Connect
{
    protected $userModel;
    protected $postModel;
    protected $categoryModel;
    protected $reviewModel;
    public function __construct()
    {
        $this->userModel = $this->call_models("UserModel");
        $this->postModel = $this->call_models("PostModel");
        $this->categoryModel = $this->call_models("CategoryModel");
        $this->reviewModel = $this->call_models("ReviewModel");
    }
    function home(){
        $this->call_views('admin/index', [
            'folder' => 'layouts',
            'page' => 'home',
            'countUser' => $this->userModel->countUser(),
            'countPost' => $this->postModel->countPost(),
            'countCat' => $this->categoryModel->countCat(),
            'countRate' => $this->reviewModel->countAllRate(),
        ]);
    }
}