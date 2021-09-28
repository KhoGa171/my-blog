<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Post</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo URL ?>Post/addPost" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <!-- <input type="text" class="form-control" name="txtTitle" placeholder="Tên danh mục" required> -->
                            <select class="form-control" name="txtCatID">
                                <?php foreach ($data['categories'] as $category) { ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" name="txtTitle" placeholder="Tiêu đề" required>
                        </div>
                        <div class="form-group">
                            <label>Tóm lược</label>
                            <input type="text" class="form-control" name="txtSumm" placeholder="Tóm lược" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Nội dung</label>
                            <input type="text" class="form-control" name="txtDes" placeholder="Nội dung" required>
                        </div> -->
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" name="txtDes" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" multiple="multiple">
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="addPost">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>