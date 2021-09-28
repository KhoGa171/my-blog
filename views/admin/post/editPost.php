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
                    <h3 class="card-title">Edit Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo URL ?>Post/editPost&id=<?php echo $data['posts'][0]['id']?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <!-- <input type="text" class="form-control" name="txtTitle" placeholder="Tên danh mục" required> -->
                            <select class="form-control" name="txtCatID">
                                <?php foreach ($data['categories'] as $category) {?>
                                <option value="<?php echo $category['id']?>" <?php if($data['posts'][0]['cat_id']==$category['id']) echo 'selected' ?>><?php echo $category['title']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" name="txtTitle" value="<?php echo $data['posts'][0]['title']?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tóm lược</label>
                            <input type="text" class="form-control" name="txtSumm" value="<?php echo $data['posts'][0]['summary']?>" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Nội dung</label>
                            <input type="text" class="form-control" name="txtDes required>
                        </div> -->
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" name="txtDes" required><?php echo $data['posts'][0]['description']?></textarea> 
                            <!--id="summernote" -->
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" class="form-control" name="fileToUpload" id="image" multiple="multiple" accept="image/jpg, image/jpeg, image/png" />
                        </div>
                        <div class="form-group" style="display: none;">
                            <input type="text" name="txtPhoto" value="<?php echo $data['posts'][0]['photo']?>">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select class="form-control" name="txtStatus">
                                <option value="active" <?php if($data['posts'][0]['status']=='active') echo 'selected' ?>>Đã được duyệt</option>
                                <option value="inactive" <?php if($data['posts'][0]['status']=='inactive') echo 'selected' ?>>Đang xử lý...</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" name="editPost">Edit Post</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>