<?php
class Home extends Connect
{
    protected $userModel;
    protected $postModel;
    protected $categoryModel;
    protected $reviewModel;
    public function __construct(){
        $this->postModel = $this->call_models("PostModel");
        $this->categoryModel = $this->call_models("CategoryModel");
        $this->userModel = $this->call_models("UserModel");
        $this->reviewModel = $this->call_models("ReviewModel");
    }
    public function index(){
        $quantity_post = 3;
        if(!isset($_GET['page'])){
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang = ($trang-1)*$quantity_post;
        $posts = $this->postModel->listPost_Status();
        foreach($posts as $post){
            $rate[] = $this->reviewModel->countRate($post['id']);
        }
        foreach($rate as $rat){
            if($rat[0]['countRate']>0){
                $rs[] = $rat[0];
            }
        }
        //var_dump($rs);
        $this->call_views('client/index', [
            'folder' => 'pages',
            'page' => 'home',
            'trang' => $trang,
            'posts' => $posts, //banner
            'categories' => $this->categoryModel->listCat(),
            'postsR' => $this->postModel->postRecent(), 
            'postsP' => $this->postModel->postPaging($tung_trang, $quantity_post),
            'users' => $this->userModel->listUser(),
            'reviews' => $rs
        ]);
    }
    public function about(){
        $this->call_views('client/index', [
            'folder' => 'pages',
            'page' => 'about',
            'categories' => $this->categoryModel->listCat(),
        ]);
    }
    public function category($slug){
        $quantity_post = 3;
        if(!isset($_GET['page'])){
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang = ($trang-1)*$quantity_post;
        $cats = $this->categoryModel->checkSlug($slug);
        $posts = $this->postModel->getPostCat($cats[0]['id']);
        foreach($posts as $post){
            $rate[] = $this->reviewModel->countRate($post['id']);
        }
        if($rate){
            foreach($rate as $rat){
                if($rat[0]['countRate']>0){
                    $rs[] = $rat[0];
                }
            }
        } else $rs = [];
        if($cats){
            $this->call_views('client/index', [
                'folder' => 'pages',
                'page' => 'category',
                'trang' => $trang,
                'categories' => $this->categoryModel->listCat(),
                'postsR' => $this->postModel->postRecent(),
                'titleCat' => $cats[0]['title'],
                'posts' => $posts,
                'postsP' => $this->postModel->postPaging($tung_trang, $quantity_post),
                'reviews' => $rs
            ]);
        }
    }
    public function post($slug){
        $post = $this->postModel->checkSlug($slug);
        $cat = $this->categoryModel->getCat($post[0]['cat_id']);
        $rate = $this->reviewModel->countRate($post[0]['id']);
        $author = $this->userModel->getUser($post[0]['user_id']);
        $this->call_views('client/index', [
            'folder' => 'pages',
            'page' => 'post',
            'categories' => $this->categoryModel->listCat(),
            'postsR' => $this->postModel->postRecent(),
            'titleCat' => $cat[0]['title'],
            'post' => $post[0],
            'reviews' => $rate[0]['countRate'],
            'author' => $author[0],
        ]);
    }
    public function contact(){
        $this->call_views('client/index', [
            'folder' => 'pages',
            'page' => 'contact',
            'categories' => $this->categoryModel->listCat(),
        ]);
    }
    public function search(){
        $quantity_post = 3;
        if(!isset($_GET['page'])){
            $trang = 1;
        } else {
            $trang = $_GET['page'];
        }
        $tung_trang = ($trang-1)*$quantity_post;
        if(isset($_POST['search'])){
            $keyword = addslashes($_POST['txtSearch']);
            $posts = $this->postModel->searchAllPost($keyword);
            $blog_post = $this->postModel->search($keyword, $tung_trang, $quantity_post);
        } else {
            $keyword = $_GET['keyword'];
            $posts = $this->postModel->searchAllPost($keyword);
            $blog_post = $this->postModel->search($keyword, $tung_trang, $quantity_post);
        }
        $this->call_views('client/index', [
            'folder' => 'pages',
            'page' => 'search',
            'trang' => $trang,
            'posts' => $posts, //banner
            'key' => $keyword,
            'categories' => $this->categoryModel->listCat(),
            'postsR' => $this->postModel->postRecent(), 
            'postsP' => $blog_post,
            'users' => $this->userModel->listUser(),
        ]);
    }
}