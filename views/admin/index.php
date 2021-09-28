<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manager Blog</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo URL ?>public/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo URL ?>public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo URL ?>public/admin/dist/css/adminlte.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo URL ?>public/admin/plugins/summernote/summernote-bs4.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo URL ?>public/admin/plugins/dropzone/min/dropzone.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        //Preloader
        if (isset($_SESSION['name'])) {
            require_once('layouts/preloader.php');
            //Navbar
            require_once('layouts/navbar.php');
            require_once('layouts/siderbar.php');
            require_once($data["folder"] . '/' . $data["page"] . '.php');
            require_once('layouts/footer.php');
        } else {
            header('Location: ' . URL . 'LoginController/login');
        }
        ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo URL ?>public/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo URL ?>public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo URL ?>public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo URL ?>public/admin/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?php echo URL ?>public/admin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?php echo URL ?>public/admin/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo URL ?>public/admin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?php echo URL ?>public/admin/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo URL ?>public/admin/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo URL ?>public/admin/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo URL ?>public/admin/dist/js/pages/dashboard2.js"></script>

    <!-- Summernote -->
    <script src="<?php echo URL ?>public/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- dropzonejs -->
    <script src="<?php echo URL ?>public/admin/plugins/dropzone/min/dropzone.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
</body>

</html>