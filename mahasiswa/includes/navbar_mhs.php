<!--Navbar -->
<?php $page = $_SERVER['REQUEST_URI']; ?>
<nav class="navbar navbar-expand-lg bg-success shadow ">
  <div class="container ">
    <a class="navbar-brand" href="home_mhs.php">SIAKAD </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/mahasiswa/home_mhs.php") { ?> class="nav-link active" <?php   } else {  ?> class="nav-link" <?php } ?> aria-current="page" href="home_mhs.php">Home</a>
        </li>
        <li class="nav-item">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/mahasiswa/krs_mhs.php") { ?> class="nav-link active" <?php   } else {  ?> class="nav-link" <?php } ?> href="krs_mhs.php">KRS</a>
        </li>
        <li class="nav-item dropdown">
          <a <?php if ($_SERVER['SCRIPT_NAME'] == "/mahasiswa/home_mhs.php") { ?> class="nav-link dropdown-toggle active" <?php   } else {  ?> class="nav-link dropdown-toggle" <?php } ?> href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Data Master
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="mahasiswa.php">Mahasiswa</a></li>
            <li><a class="dropdown-item" href="#">Dosen</a></li>

          </ul>
        </li>

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