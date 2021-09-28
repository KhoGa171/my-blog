<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Blog</li>
                    </ol>
                </div>/.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo URL ?>User/editUser&id=<?php echo $data['users'][0]['id'] ?>" method="post">

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
                            <input type="text" class="form-control" name="txtPass" value="<?php echo $data['users'][0]['password'] ?>" required>
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