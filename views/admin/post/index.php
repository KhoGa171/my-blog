<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post</h1>
                </div>
                <div class="col-sm-6 mt-1">
                    <ol class="breadcrumb float-sm-right">
                      <a class="btn btn-success" href="<?php echo URL ?>Post/viewAddPost"><i class="fas fa-plus"> Add Post</i></a>
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
                <h3 class="card-title">List Post</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <form action="<?php echo URL.'Post/index' ?>" method="post" class="d-flex">
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
                <table class="table "> <!-- table-head-fixed text-nowrap -->
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Title Cat</th>
                      <th>User Name</th>
                      <th>Title</th>
                      <th>Summary</th>
                      <th>Photo</th>
                      <th>Status</th>
                      <th width="60px">Edit</th>
                      <th width="60px">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $stt=1;
                        foreach($data['posts'] as $post) {
                    ?> 
                    <tr>
                      <td><?php echo $stt++ ?></td>
                      <td><?php foreach($data['categories'] as $category) if($category['id']==$post['cat_id']) echo $category['title'] ?></td>
                      <td><?php foreach($data['users'] as $user) if($user['id']==$post['user_id']) echo $user['name'] ?></td>
                      <td><?php echo $post['title'] ?></td>
                      <td style="width: 40%"><?php echo $post['summary'] ?></td>
                      <td><img src="../public/uploads/<?php echo $post['photo']?>"  height="100px" width="100px"/></td>
                      <?php if($post['status']=='inactive') {?>
                        <td><h5><div class="badge bg-warning">Đang xử lý...</div></h5></td>
                      <?php }
                      else {?>
                        <td><h5><div class="badge bg-success">Đã được duyệt</div></h5></td>
                      <?php }?>
                      <td><a class="btn btn-warning" href="<?php echo URL ?>Post/viewEditPost&id=<?php echo $post['id'] ?>"><i class="fas fa-edit"></i></a></td>
                      <td><a class="btn btn-danger" href="<?php echo URL ?>Post/deletePost&id=<?php echo $post['id'] ?>"><i class="fas fa-trash-alt"></i></a></td>
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