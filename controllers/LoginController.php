<?php
class LoginController extends Connect
{
    protected $loginModel;
    protected $userModel;
    public function __construct()
    {
        $this->loginModel = $this->call_models("LoginModel");
        $this->userModel = $this->call_models("UserModel");
    }
    public function login()
    {
        $this->call_views('auth/login');
        if (isset($_POST['login'])) {
            $email = $_POST['txtEmail'];
            $pass = md5($_POST['txtPass']);
            $result = $this->loginModel->login($email, $pass);
            if ($result) {
                $_SESSION['name'] = $result[0]['name'];
                $_SESSION['userID'] = $result[0]['id'];
                $role = $result[0]['role'];
                $_SESSION['role'] = $role;
                if ($role == 'admin' || $role == 'editor' || $role == 'writer') {
                    //$this->call_views('admin/index');
                    //echo '<script>alert("Đăng nhập thành công!"); window.location="'.URL.'Admin/index";</script>';
                    header('Location:' . URL . 'Admin/home');
                } else {
                    header('Location:' . URL . 'Home/index');
                }
            } else {
                echo '<script>alert("Sai email hoặc mật khẩu!"); window.location="' . URL . 'LoginController/login";</script>';
            }
        }
    }
    public function logout()
    {
        if (isset($_SESSION['name'])) {
            if($_SESSION['role']=="user"){
                unset($_SESSION['name']);
                unset($_SESSION['userID']);
                unset($_SESSION['role']);
                header('Location: ' . URL . 'Home/index');
            } else {
                unset($_SESSION['name']);
                unset($_SESSION['userID']);
                unset($_SESSION['role']);
                header('Location: ' . URL . 'LoginController/login');
            }
        }
    }
    public function register()
    {
        $this->call_views('auth/register');
        if (isset($_POST['register'])) {
            $name = $_POST['txtName'];
            $email = $_POST['txtEmail'];
            $phone = $_POST['txtPhone'];
            $address = $_POST['txtAddress'];
            $pass = md5($_POST['txtPass']);
            $check = $this->userModel->checkEmail($email);
            if($check){
                echo '<script>alert("Email này đã được đăng ký!"); window.location="' . URL . 'LoginController/register";</script>';
            }
            else {
                $result = $this->loginModel->register($name, $email, $phone, $address, $pass);
                if ($result) {
                    $_SESSION['name'] = $name;
                    header('Location: ' . URL . 'Home/index');
                }
                 else {
                    echo '<script>alert("Đăng ký không thành công!"); window.location="' . URL . 'LoginController/register";</script>';
                }
            }
        }
    }
}
