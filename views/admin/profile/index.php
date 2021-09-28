<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="row">
        <div class="col-lg-4">
            <form action="<?php echo URL ?>Profile/editProfile&id=<?php echo $data['users'][0]['id'] ?>" method="post" enctype="multipart/form-data">
                <div class="profile-images">
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
                            <h3 class="card-title">Thông tin</h3>
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
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" name="editProfile">Save profile</button>
                        </div>
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