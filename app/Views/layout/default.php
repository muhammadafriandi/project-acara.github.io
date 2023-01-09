<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?= $this->renderSection('title') ?>

    <!-- Custom fonts for this template-->
    <link href="<?php echo site_url() ?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo site_url() ?>template/vendor/datatables/dataTables.bootstrap4.min.css" type="text/css">

    <!-- script data table -->
    <script type="text/javascript" src="<?php echo site_url() ?>template/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url() ?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="<?php echo site_url() ?>template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-light fa-cake-candles"></i>
                </div>
                <div class="sidebar-brand-text mx-3" href="<?php echo site_url() ?>">Acara </div>
            </a>
            <?php echo $this->include('layout/menu') ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>

                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>

                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">HI, <?php echo userLogin()->name_user ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo site_url() ?>11.PNG">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo site_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="main-content">
                        <?= $this->renderSection('content') ?>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color:dimgray;">
                <div class="modal-header text-white">Yakin Untuk Keluar ??</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-white">Jika Yakin Pilih Tombol Keluar Untuk Keluar !!</div>
                <div class="modal-footer">
                    <button class="btn btn-light text-dark" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?php echo site_url('auth/logout') ?>">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        var path = location.pathname.split('/')
        var url = location.origin + '/' + path[1]

        $('sidebar-menu li a').each(function() {
            if ($(this).attr('href').indexOf(url) != -1) {
                $(this).parent().addClass('active').parent().parent('li').addClass('active')
            }
        })
    </script>

    <!-- Bootstrap core JavaScript-->

    <script src="<?php echo site_url() ?>template/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo site_url() ?>js/jquery-3.1.0.js"></script>
    <script src="<?php echo site_url() ?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- script data table dengan menambahkan js data table syarat nya harus tau dmna letak js data table nya seperti di bawah ini -->
    <script src="<?php echo site_url() ?>template/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo site_url() ?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Core plugin JavaScript-->
    <script src="<?php echo site_url() ?>template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo site_url() ?>template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo site_url() ?>template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->


</body>

</html>