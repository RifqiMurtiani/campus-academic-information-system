<!--Navbar -->
<?php $page = $_SERVER['REQUEST_URI']; ?>
<nav class="navbar navbar-expand-lg bg-info shadow ">
  <div class="container ">
    <a class="navbar-brand" href="home_admin.php">SIAKAD </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/admin/home_admin.php") { ?> class="nav-link active" <?php   } else {  ?> class="nav-link" <?php } ?> aria-current="page" href="home_admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/admin/pemrograman_krs.php") { ?> class="nav-link active" <?php   } else {  ?> class="nav-link" <?php } ?> href="/admin/pemrograman_krs.php">Pemrograman KRS</a>
        </li>
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/admin/pengumuman.php") { ?> class="nav-link active" <?php   } else {  ?> class="nav-link" <?php } ?> href="/admin/pengumuman.php">Pengumuman</a>
        </li>
        <li class="nav-item dropdown">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/admin/mahasiswa.php") { ?> class="nav-link dropdown-toggle active" <?php   } else {  ?> class="nav-link dropdown-toggle" <?php } ?> href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Master
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="mahasiswa.php">Mahasiswa</a></li>
            <li><a class="dropdown-item" href="#">Dosen</a></li>

          </ul>
        </li>
        <li class="nav-item dropdown">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/admin/user_mhs.php") { ?> class="nav-link dropdown-toggle active" <?php   } else {  ?> class="nav-link dropdown-toggle" <?php } ?> href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Akun
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user_mhs.php">Mahasiswa</a></li>
            <li><a class="dropdown-item" href="#">Dosen</a></li>

          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <a href="../../logout.php" class="btn"><i class="bi bi-box-arrow-right"></i></a>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
<!--/.Navbar -->