<div class="heading-page header-text">
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-content">
                        <h4>Post Details</h4>
                        <h2>Single blog post</h2>
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
                        <div class="col-lg-12">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="<?php echo URL . 'public/uploads/' . $data['post']['photo'] ?>" alt="">
                                </div>
                                <div class="down-content">
                                    <span><?php echo $data['titleCat'] ?></span>
                                    <a href="post-details.html">
                                        <h4><?php echo $data['post']['title'] ?></h4>
                                    </a>
                                    <ul class="post-info">
                                        <li><a href="#">Admin</a></li>
                                        <li><a href="#"><?php echo $data['post']['updated_at'] ?></a></li>
                                        <li><a href="#">
                                            <?php if($data['reviews']){ echo $data['reviews'] ?> <label class="ml-2" style="width: 20px; height: 20px; font-size: 15px; color: yellow; ">&#11088;</label>
                                            <?php } else { echo 'Chưa có đánh giá'; }?>
                                        </a></li>
                                    </ul>
                                    <p><?php echo $data['post']['description'] ?></p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    <li><i class="fa fa-tags"></i></li>
                                                    <li><a href="#">Best Templates</a>,</li>
                                                    <li><a href="#">TemplateMo</a></li>
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
                        <div class="col-lg-12">
                            <div class="sidebar-heading d-flex">
                                <h2>ĐÁNH GIÁ BÀI VIẾT:</h2>
                            </div>
                            <div class="row">
                                <div class="col-3 d-flex ml-2" style="border-right: 1px solid gray">
                                    <?php if($data['reviews']) {?>
                                    <h5 class="mt-2" style="color: #f48840;"> <?php echo $data['reviews'] ?>/5.0 </h5>
                                    <label class="ml-2" style="width: 30px; height: 30px; font-size: 25px; color: yellow; ">&#11088;</label>
                                    <?php } else {?>
                                        <h5 class="mt-2" style="color: #f48840;"> Chưa có đánh giá </h5>
                                    <?php } ?>
                                </div>
                                <form action="<?php echo URL.'Review/addRate&post_id='.$data['post']['id'].'&slug='.$data['post']['slug'] ?>" method="post" class="col-5 d-flex ml-3">
                                    <div class="rating">
                                        <input type="radio" name="star" id="star-1" value="1">
                                        <input type="radio" name="star" id="star-2" value="2">
                                        <input type="radio" name="star" id="star-3" value="3">
                                        <input type="radio" name="star" id="star-4" value="4">
                                        <input type="radio" name="star" id="star-5" value="5">
                                        <label for="star-1">&#11088;</label>
                                        <label for="star-2">&#11088;</label>
                                        <label for="star-3">&#11088;</label>
                                        <label for="star-4">&#11088;</label>
                                        <label for="star-5">&#11088;</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary form-control ml-3" name="review">Đánh giá</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="sidebar-item comments">
                                <div class="sidebar-heading">
                                    <h2>4 comments</h2>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="<?php echo URL ?>public/client/assets/images/comment-author-01.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Charles Kate<span>May 16, 2020</span></h4>
                                                <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla condimentum eu quis leo. Vestibulum id turpis porttitor sapien facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend posuere id tellus.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="<?php echo URL ?>public/client/assets/images/comment-author-02.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Thirteen Man<span>May 20, 2020</span></h4>
                                                <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="author-thumb">
                                                <img src="<?php echo URL ?>public/client/assets/images/comment-author-03.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                                                <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                                            </div>
                                        </li>
                                        <li class="replied">
                                            <div class="author-thumb">
                                                <img src="<?php echo URL ?>public/client/assets/images/comment-author-02.jpg" alt="">
                                            </div>
                                            <div class="right-content">
                                                <h4>Thirteen Man<span>May 22, 2020</span></h4>
                                                <p>Mauris sit amet justo vulputate, cursus massa congue, vestibulum odio. Aenean elit nunc, gravida in erat sit amet, feugiat viverra leo.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                            <div class="sidebar-item submit-comment">
                                <div class="sidebar-heading">
                                    <h2>Your comment</h2>
                                </div>
                                <div class="content">
                                    <form id="comment" action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="name" type="text" id="name" placeholder="Your name" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <fieldset>
                                                    <input name="email" type="text" id="email" placeholder="Your email" required="">
                                                </fieldset>
                                            </div>
                                            <div class="col-md-12 col-sm-12">
                                                <fieldset>
                                                    <input name="subject" type="text" id="subject" placeholder="Subject">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button type="submit" id="form-submit" class="main-button">Submit</button>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
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