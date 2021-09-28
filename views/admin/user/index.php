<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div>
                <div class="col-sm-6 mt-1">
                    <ol class="breadcrumb float-sm-right">
                      <a class="btn btn-success" href="<?php echo URL ?>User/viewAddUser"><i class="fas fa-plus"> Add User</i></a>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List User</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <form action="<?php echo URL.'User/index' ?>" method="post" class="d-flex">
                      <input type="text" name="txtSearch" class="form-control float-right" placeholder="Search...">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default" name="search">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 700px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Role</th>
                      <th width="60px">Edit</th>
                      <th width="60px">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $stt=1;
                        foreach($data['users'] as $user) {
                    ?>
                    <tr>
                      <td><?php echo $stt++ ?></td>
                      <td><?php echo $user['name'] ?></td>
                      <td><?php echo $user['email'] ?></td>
                      <td><?php echo $user['phone'] ?></td>
                      <td><?php echo $user['address'] ?></td>
                      <td><?php echo $user['role'] ?></td>
                      <td><a class="btn btn-warning" href="<?php echo URL ?>User/viewEditUser&id=<?php echo $user['id'] ?>"><i class="fas fa-edit"></i></a></td>
                      <td><a class="btn btn-danger" href="<?php echo URL ?>User/deleteUser&id=<?php echo $user['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
    </section>
</div>