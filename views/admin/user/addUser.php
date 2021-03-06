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

    <!-- Main content -->
    <div class="row">
        <div class="col-lg-4">
            <form action="<?php echo URL ?>User/addUser" method="post" enctype="multipart/form-data">
                <div class="profile-images d-flex justify-content-center">
                    <img src="" id="upload-img">
                </div>
                <div class="custom-file">
                    <label for="fileupload">Thêm avatar</label>
                    <input type="file" class="form-control-file" id="fileupload" name="fileUpload" accept="image/jpg, image/jpeg, image/png">
                </div>
        </div>
        <div class="col-lg-8">
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" class="form-control" name="txtName" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" required>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="txtPhone" required>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="txtAddr" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" required>
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="txtRole" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="editor">Editor</option>
                                    <option value="writer">Writer</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="addUser">Add User</button>
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