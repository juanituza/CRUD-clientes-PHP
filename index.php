<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start();

$pg = "header";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Teco</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link href="assets/img/teco.svg" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="sweetalert2.min.css">

  <script src="web/js/bootstrap.js"></script>



  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/fontawesome/css/fontawesome.css" rel="stylesheet" type="text/css">
  <link href="assets/css/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Sweet Alert -->
  <link rel="stylesheet" href="assets/plugins/SweetAlert/dist/sweetalert2.min.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span id="titulo" class=" d-none d-lg-block"><span style="color:orange;font-size: 35px;">C</span>lien<span style="color:orange;font-size: 35px;">T</span>es</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>

    </div>
    <div class="d-flex align-items-center justify-content-between">
      <ol class="breadcrumb mx-5">
        <li class="breadcrumb-item mt-3"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item active mt-3"><a href="cliente-listar.php">Cliente</a></li>
      </ol>
    </div>


    <!-- <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3 form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
        </li>
        <li class="nav-item dropdown pe-3">
          <button class="btn btn-warning usuario">
            <i class="fa-solid fa-user"></i>
          </button>
        </li>
      </ul>
    </nav> -->

    <body>

      <main>
        <section class="menu">


          <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">
              <li class="nav-item ">
                <a id="listados_titulos" class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                  <i id="listados_titulos" class="bi bi-menu-button-wide"></i><span>Clientes</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                    <a id="listados" href="cliente-listar.php">
                      <i class="bi bi-circle"></i>
                      <span>Listado Clientes</span>
                    </a>
                  </li>
                  <li>
                    <a id="listados" href="cliente-nuevo.php">
                      <i class="bi bi-circle"></i>
                      <span>Nuevo Cliente</span>
                    </a>
                  </li>
                </ul>
              </li>
              <ul>
        </section>
      </main>

    </body>

  </header>







  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/plugins/SweetAlert/dist/sweetalert2.all.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  




</body>

</html>