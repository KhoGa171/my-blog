<?php
class User extends Connect
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = $this->call_models("UserModel");
    }
    public function index()
    {
        if(isset($_POST['search'])){
            $key = $_POST['txtSearch'];
            $users = $this->userModel->TKUser($key);
        } else {
            $users =  $this->userModel->listUser();
        }
        $this->call_views('admin/index', [
            'folder' => 'user',
            'page' => 'index',
            'users' => $users
        ]);
    }
    public function viewAddUser()
    {
        $this->call_views('admin/index', [
            'folder' => 'user',
            'page' => 'addUser'
        ]);
    }
    public function addUser()
    {
        if (isset($_POST['addUser'])) {
            $name = $_POST['txtName'];
            $email = $_POST['txtEmail'];
            $phone = $_POST['txtPhone'];
            $addr = $_POST['txtAddr'];
            $pass = md5($_POST['txtPass']);
            $role = $_POST['txtRole'];
            $check = $this->userModel->checkEmail($email);
            if ($check) {
                echo '<script>alert("Email này đã được đăng ký!"); window.location="' . URL . 'User/viewAddUser";</script>';
            } else {
                if (isset($_FILES['fileUpload'])) {
                    $photo = $_FILES['fileUpload']['name'];
                    move_uploaded_file($_FILES['fileUpload']['tmp_name'], './public/uploads/avatar/' . $photo);
                    $result = $this->userModel->addUser($name, $email, $phone, $addr, $pass, $role, $photo);
                    if ($result) {
                        echo '<script>alert("Thêm thành công!"); window.location="' . URL . 'User/index";</script>';
                    } else {
                        echo '<script>alert("Thêm không thành công!"); window.location="' . URL . 'User/viewAddUser";</script>';
                    }
                }
            }
        }
    }
    public function viewEditUser()
    {
        $this->call_views('admin/index', [
            'folder' => 'user',
            'page' => 'editUser',
            'users' => $this->userModel->getUser($_GET['id'])
        ]);
    }
    public function editUser()
    {
        if (isset($_POST['editUser'])) {
            $name = $_POST['txtName'];
            $email = $_POST['txtEmail'];
            $phone = $_POST['txtPhone'];
            $addr = $_POST['txtAddr'];
            $role = $_POST['txtRole'];
            $pt = $_POST['txtPhoto'];
            $ckEmail = $this->userModel->getUser($_GET['id']);
            //checkpass
            if($ckEmail[0]['password'] == $_POST['txtPass']){
                $pass = $_POST['txtPass'];
            } else $pass = md5($_POST['txtPass']);
            //checkemail
            if ($ckEmail[0]['email'] != $email) {
                $check = $this->userModel->checkEmail($email);
                if ($check==null) {
                    if (isset($_FILES['fileUpload'])) {
                        if ($_FILES['fileUpload']['error'] > 0) {
                            $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $pt);
                            if ($result) {
                                echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'User/index";</script>';
                            } else {
                                echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'User/viewEditUser&id='.$_GET['id'].'";</script>';
                            }
                        } else {
                            unlink('./public/uploads/avatar/' . $pt);
                            $photo = $_FILES['fileUpload']['name'];
                            move_uploaded_file($_FILES['fileUpload']['tmp_name'], './public/uploads/avatar/' . $photo);
                            $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $photo);
                            if ($result) {
                                echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'User/index";</script>';
                            } else {
                                echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'Profile/viewEditUser&id='.$_GET['id'].'";</script>';
                            }
                        }
                    }
                } else echo '<script>alert("Email này đã được đăng ký!"); window.location="' . URL . 'User/viewEditUser&id='.$_GET['id'].'";</script>';
            } else { 
                if (isset($_FILES['fileUpload'])) {
                    if ($_FILES['fileUpload']['error'] > 0) {
                        $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $pt);
                        if ($result) {
                            echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'User/index";</script>';
                        } else {
                            echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'User/viewEditUser&id='.$_GET['id'].'";</script>';
                        }
                    } else {
                        unlink('./public/uploads/avatar/' . $pt);
                        $photo = $_FILES['fileUpload']['name'];
                        move_uploaded_file($_FILES['fileUpload']['tmp_name'], './public/uploads/avatar/' . $photo);
                        $result = $this->userModel->editUser($_GET['id'], $name, $email, $phone, $addr, $pass, $role, $photo);
                        if ($result) {
                            echo '<script>alert("Cập nhật thành công!"); window.location="' . URL . 'User/index";</script>';
                        } else {
                            echo '<script>alert("Cập nhật không thành công!"); window.location="' . URL . 'User/viewEditUser&id='.$_GET['id'].'";</script>';
                        }
                    }
                }
            }
        }
    }
    public function deleteUser()
    {
        if (isset($_GET['id'])) {
            unlink('./public/uploads/avatar/' . $_GET['photo']);
            $result = $this->userModel->deleteUser($_GET['id']);
            if ($result) echo '<script>alert("Xóa thành công!"); window.location="' . URL . 'User/index";</script>';
            else echo '<script>alert("Xóa không thành công!");window.location="' . URL . 'User/index";</script>';
        }
    }
}
