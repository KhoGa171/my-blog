<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Recent Posts</h4>
                        <h2>Our Recent Blog Entries</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="blog-posts grid-system">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php foreach ($data['posts'] as $post) { ?>
                            <div class="col-lg-6">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                            <img src="<?php echo URL . 'public/uploads/' . $post['photo'] ?>" alt="" style="object-fit: cover; max-width: 100%; height: 250px; filter: drop-shadow(2px 2px 6px gray);">
                                        </a>
                                    </div>
                                    <div class="down-content">
                                        <span><?php echo $data['titleCat'] ?></span>
                                        <a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                            <h4 style="height: 50px;"><?php echo $post['title'] ?></h4>
                                        </a>
                                        <ul class="post-info" style="height: 48px;">
                                            <li><a href="<?php echo URL.'Home/post/'.$post['slug']?>">Admin</a></li>
                                            <li><a href="<?php echo URL.'Home/post/'.$post['slug']?>"> <?php echo $post['updated_at'] ?></a></li>
                                            <li><a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                                <?php if(!empty($data['reviews'])) {
                                                    foreach ($data['reviews'] as $review){  
                                                    if ($review['post_id'] == $post['id']) {
                                                        echo $review['countRate'];?>
                                                        <label class="ml-2" style="width: 20px; height: 20px; font-size: 15px; color: yellow; ">&#11088;</label>
                                                <?php } 
                                                    }
                                                    $kt = false;
                                                    foreach ($data['reviews'] as $review){
                                                        if($post['id'] != $review['post_id']){
                                                            $kt = true;
                                                        } else {
                                                            $kt = false; break;
                                                        }
                                                    }
                                                    if($kt == true) echo 'Chưa có đánh giá';
                                                } else echo 'Chưa có đánh giá';
                                                ?>

                                            </a></li>
                                        </ul>
                                        <p style="overflow: hidden; height: 125px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;"><?php echo $post['summary'] ?></p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Best Templates</a>,</li>
                                                        <li><a href="#">TemplateMo</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-12">
                            <ul class="page-numbers">
                                <?php
                                $count = ceil(count($data['posts']) / 3);
                                for ($i = 1; $i <= $count; $i++) {
                                ?>
                                    <li class="<?php if ($data['trang'] == $i) echo 'active' ?>">
                                        <a href="<?php echo URL . 'Home/index&page=' . $i ?>"><?php echo $i ?></a>
                                    </li>
                                <?php } ?>
                                <!-- <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="<?php echo URL . 'Home/search' ?>" method="POST" class="d-flex">
                                <input type="text" class="form-control" name="txtSearch" placeholder="Tìm kiếm..." required>
                                <button type="submit" name="search" class="btn btn-primary ml-1"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Bài đăng gần đây</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php foreach ($data['postsR'] as $post) { ?>
                                            <li><a href="<?php echo URL . 'Home/post/' . $post['slug'] ?>">
                                                    <h5><?php echo $post['title'] ?></h5>
                                                    <span><?php echo $post['updated_at'] ?></span>
                                                </a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item categories">
                                <div class="sidebar-heading">
                                    <h2>Danh mục</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php foreach ($data['categories'] as $category) { ?>
                                            <li><a href="<?php echo URL . 'Home/category/' . $category['slug'] ?>">- <?php echo $category['title'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item tags">
                                <div class="sidebar-heading">
                                    <h2>Tag Clouds</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li><a href="#">Lifestyle</a></li>
                                        <li><a href="#">Creative</a></li>
                                        <li><a href="#">HTML5</a></li>
                                        <li><a href="#">Inspiration</a></li>
                                        <li><a href="#">Motivation</a></li>
                                        <li><a href="#">PSD</a></li>
                                        <li><a href="#">Responsive</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>