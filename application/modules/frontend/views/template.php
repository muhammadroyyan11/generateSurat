<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>
        Pembuatan Surat Online
    </title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <!-- <link href="<?= base_url() ?>/_temp/uploads/img/<?= $company[0]['img_logo'] ?>" rel="icon" />
    <link href="<?= base_url() ?>/_temp/uploads/img/<?= $company[0]['img_logo'] ?>" rel="apple-touch-icon" /> -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/front/vendor/aos/aos.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- include summernote css/js -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/front/css/style.css" rel="stylesheet" />

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo">
                <a href="<?= site_url('home') ?>" class="logo"><img
                        src="" alt="" /></a>
                
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->

            <nav id="navbar" class="navbar">
                
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
            <a href="<?= site_url('login') ?>" class="btn btn-primary w-200">
                Login
            </a>
        </div>
    </header>
    <!-- End Header -->
    <?= $contents ?>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>
                    </span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <strong>INSTITUT AGAMA ISLAM AL-QODIRI JEMBER</strong>
                2024
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url() ?>assets/front/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/front/js/main.js"></script>

    <!-- JS File -->
    <script src="<?= base_url() ?>assets/front/js/form.js"></script>
    <script src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>

    <script>
        var ckeditor = CKEDITOR.replace('kebutuhan_produk', {
            height: '300px'
        });
    </script>

</body>

</html>
