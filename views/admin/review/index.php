<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Review</h1>
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
                <h3 class="card-title">List Review</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <form action="<?php echo URL.'Review/index' ?>" method="post" class="d-flex">
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
                      <th>Title Post</th>
                      <th>Rate</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $stt=1;
                        foreach($data['reviews'] as $review) {
                    ?>
                    <tr>
                      <td><?php echo $stt++ ?></td>
                      <td><?php echo $review['name'] ?></td>
                      <td><?php echo $review['title'] ?></td>
                      <td><?php echo $review['rate'] ?>
                        <label class="ml-2" style="width: 20px; height: 20px; font-size: 15px; color: yellow; ">&#11088;</label>
                      </td>
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