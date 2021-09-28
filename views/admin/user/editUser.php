<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
        <div class="col-lg-4">
            <form action="<?php echo URL ?>User/editUser&id=<?php echo $data['users'][0]['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="profile-images d-flex justify-content-center">
                    <img src="<?php echo URL . 'public/uploads/avatar/' . $data['users'][0]['photo'] ?>" id="upload-img">
                </div>
                <div class="custom-file">
                    <label for="fileupload">Thay đổi avatar</label>
                    <input type="file" class="form-control-file" id="fileupload" name="fileUpload" accept="image/jpg, image/jpeg, image/png">
                    <div class="d-none">
                        <input type="text" name="txtPhoto" value="<?php echo $data['users'][0]['photo'] ?>">
                    </div>
                </div>
        </div>
        <div class="col-lg-8">
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Họ tên</label>
                                    <input type="text" class="form-control" name="txtName" value="<?php echo $data['users'][0]['name'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="txtEmail" value="<?php echo $data['users'][0]['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="txtPhone" value="<?php echo $data['users'][0]['phone'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="txtAddr" value="<?php echo $data['users'][0]['address'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" class="form-control" name="txtPass" value="<?php echo $data['users'][0]['password'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="txtRole" class="form-control">
                                        <option value="admin" <?php if ($data['users'][0]['role'] == 'admin') echo 'selected' ?>>Admin</option>
                                        <option value="editor" <?php if ($data['users'][0]['role'] == 'editor') echo 'selected' ?>>Editor</option>
                                        <option value="writer" <?php if ($data['users'][0]['role'] == 'writer') echo 'selected' ?>>Writer</option>
                                        <option value="user" <?php if ($data['users'][0]['role'] == 'user') echo 'selected' ?>>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="editUser">Edit User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
        </form>
    </div>
</div>
<script src="<?php echo URL ?>public/admin/jquery-latest.min.js"></script>
<script>
    $(function() {
        $("#fileupload").change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $("#upload-img").attr("src", x);
            console.log(event);
        });
    })
</script>