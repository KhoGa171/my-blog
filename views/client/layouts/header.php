<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="<?php echo URL ?>Home/index">
                <h2>Stand Blog<em>.</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <!-- active-->
                        <a class="nav-link" href="<?php echo URL ?>Home/index">Trang chủ
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL ?>Home/about">Thông tin</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Danh mục</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($data['categories'] as $cat) { ?>
                                <a class="dropdown-item text-uppercase" href="<?php echo URL.'Home/category/'.$cat['slug'] ?>"><?php echo $cat['title'] ?></a>
                            <?php } ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URL ?>Home/contact">Liên hệ</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['name'])) { ?>
                        <li class="nav-item">
                        </li>
                        <li class="nav-item d-flex justify-content-center">
                            <?php echo '<a href="#" class="nav-link">' . $_SESSION['name'] . '</a>'; ?>
                            <a href="<?php echo URL ?>LoginController/logout" class="nav-link ml-2"><i class="fas fa-sign-out-alt"></i></a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL ?>LoginController/register" class="nav-link"><i class="fas fa-user"></i> Sign Up</a>
                        </li>
                        <li class="nav-item ">
                            <a href="<?php echo URL ?>LoginController/login" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>