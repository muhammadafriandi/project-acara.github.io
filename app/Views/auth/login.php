<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>login &mdash; Nikahan</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo site_url() ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo site_url() ?>template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                                    </div>

                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <div class="alert-body">
                                                <button class="close" data-dismiss="alert">x</button>
                                                <b>error !</b>
                                                <?php echo session()->getFlashdata('error') ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <form method="POST" action="<?php echo site_url('auth/loginProcess') ?>" class="needs-validation user" novalidate="">
                                        <?php echo csrf_field() ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email.." name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>

                                        <button type="submit" class="btn btn-primary form-control">Login</button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="http://localhost/toko_online/registrasi/index">Daftar Akun</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


</body>

</html>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo site_url() ?>template/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo site_url() ?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo site_url() ?>template/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo site_url() ?>template/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo site_url() ?>template/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo site_url() ?>template/js/demo/chart-area-demo.js"></script>
<script src="<?php echo site_url() ?>template/js/demo/chart-pie-demo.js"></script>

</body>

</html>