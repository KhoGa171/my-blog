<?php
class Profile extends Connect{
    protected $userModel;
    public function __construct(){
        $this->userModel = $this->call_models("UserModel");
    }
    public function index(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $user = $this->userModel->getUser($id);
        }
        $this->call_views('admin/index',[
            'folder' => 'profile',
            'page' => 'index',
            'users' => $user
        ]);
    }
    public function editProfile(){
        if (isset($_POST['editProfile'])) {
            $name = $_POST['txtName'];
            $email = $_POST['txtEmail'];
            $phone = $_POST['txtPhone'];
            $addr = $_POST['txtAddr'];
            $pass = md5($_POST['txtPass']);
            $role = $_SESSION['role'];
            $pt = $_POST['txtPhoto'];
            $ckEmail = $this->userModel->getUser($_GET['id']);
            if ($ckEmail[0]['email'] != $email) {
                $check = $this->userModel->checkEmail($email);
                if ($check==null) {
                    if (isset($_FILES['fileUpload'])) {
                        if ($_FILES['fileUpload']['error'] > 0) {
                            $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $pt);
                            if ($result) {
                                echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                            } else {
                                echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                            }
                        } else {
                            unlink('./public/uploads/avatar/' . $pt);
                            $photo = $_FILES['fileUpload']['name'];
                            move_uploaded_file($_FILES['fileUpload']['tmp_name'], './public/uploads/avatar/' . $photo);
                            $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $photo);
                            if ($result) {
                                echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                            } else {
                                echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                            }
                        }
                    }
                } else echo '<script>alert("Email này đã được đăng ký!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
            } else { 
                if (isset($_FILES['fileUpload'])) {
                    if ($_FILES['fileUpload']['error'] > 0) {
                        $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $pt);
                        if ($result) {
                            echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                        } else {
                            echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                        }
                    } else {
                        unlink('./public/uploads/avatar/' . $pt);
                        $photo = $_FILES['fileUpload']['name'];
                        move_uploaded_file($_FILES['fileUpload']['tmp_name'], './public/uploads/avatar/' . $photo);
                        $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $photo);
                        if ($result) {
                            echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                        } else {
                            echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Profile/index&id='.$_GET['id'].'";</script>';
                        }
                    }
                }
            }
        }
    }
}