<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Search: "<?php echo $data['key']; ?>"</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="all-blog-posts">
                    <div class="row">
                        <?php foreach ($data['postsP'] as $post) { ?>
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                        <img src="<?php echo URL ?>public/uploads/<?php echo $post['photo'] ?>" alt="" 
                                        style="object-fit: cover; max-width: 100%; height: 400px; filter: drop-shadow(2px 2px 6px gray);">
                                        </a>
                                    </div>
                                    <div class="down-content">
                                        <span><?php foreach ($data['categories'] as $category) if ($category['id'] == $post['cat_id']) echo $category['title'] ?></span>
                                        <a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                            <h4><?php echo $post['title'] ?></h4>
                                        </a>
                                        <ul class="post-info">
                                            <li>
                                                <a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                                <?php foreach ($data['users'] as $user) if ($user['id'] == $post['user_id']) echo $user['name'] ?>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo URL.'Home/post/'.$post['slug']?>"><?php echo $post['updated_at'] ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                                
                                                </a>
                                            </li>
                                        </ul>
                                        <p><?php echo $post['summary'] ?></p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        <li><i class="fa fa-tags"></i></li>
                                                        <li><a href="#">Beauty</a>,</li>
                                                        <li><a href="#">Nature</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a href="#">Facebook</a>,</li>
                                                        <li><a href="#"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <div class="col-lg-12">
                            <ul class="page-numbers">
                            <?php 
                                $count = ceil(count($data['posts'])/3);
                                for($i=1; $i<=$count; $i++) { 
                            ?>
                                <li class="<?php if($data['trang'] == $i) echo 'active'?>">
                                    <a href="<?php echo URL.'Home/search&page='.$i.'&keyword='.$data['key']?>"><?php echo $i?></a>
                                </li>
                            <?php }?>
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
                            <!-- <div class="sidebar-item search"> -->
                                <form action="<?php echo URL.'Home/search'?>" method="POST" class="d-flex">
                                    <input type="text" class="form-control" name="txtSearch" placeholder="Tìm kiếm..." required>
                                    <button type="submit" name="search" class="btn btn-primary ml-1"><i class="fas fa-search"></i></button>
                                </form>
                            <!-- </div> -->
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item recent-posts">
                                <div class="sidebar-heading">
                                    <h2>Bài đăng gần đây</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <?php foreach ($data['postsR'] as $post) { ?>
                                            <li><a href="<?php echo URL.'Home/post/'.$post['slug']?>">
                                                    <h5 style="font-weight:500; font-size: medium;"><?php echo $post['title'] ?></h5>
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
                                            <li><a href="<?php echo URL.'Home/category/'.$category['slug']?>">- <?php echo $category['title'] ?></a></li>
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