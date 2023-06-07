<style>
  .sidebar .nav-links li a .active {
  font-size: 18px;
  font-weight: 400;
  color: blue;
  transition: all 0.4s ease;
}
.sidebar.close .nav-links li a .active {
  opacity: 0;
  pointer-events: none;
}
  .sidebar .nav-links li a .inactive {
  font-size: 18px;
  font-weight: 400;
  color: #696969;
  transition: all 0.4s ease;
}
.sidebar.close .nav-links li a .inactive {
  opacity: 0;
  pointer-events: none;
}
</style>
<div class="sidebar close">
  <?php $page = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],"/")+1); ?>
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">CodingLab</span>
      </div>
      <ul class="nav-links">
        <li class="">
          <a href="#">
            <i class="bx bx-grid-alt"></i>
            <span class=" <?= $page == 'dashboard.php' ? 'active' : 'inactive' ?>">Home</span>
          </a>
          <!-- <ul class="sub-menu blank">
            <li><a class="" href="dashboard_admin.php">Home</a></li>
          </ul> -->
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bx-data"></i>
              <span class="link_name">Data</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <!-- <li><a class="link_name" href="#">Master Data</a></li> -->
            <li>
              <a   href="mahasiswa.php">
                <span class="<?= $page == 'mahasiswa.php' ? 'active' : 'inactive' ?>">Mahasiswa</span>
              </a>
            </li>
            <li>
              <a   href="mahasiswa.php">
                <span class="<?= $page == '.php' ? 'active' : 'inactive' ?>">Dosen</span>
              </a>
            </li>
            <li>
              <a   href="mahasiswa.php">
                <span class="<?= $page == '.php' ? 'active' : 'inactive' ?>">Admin</span>
              </a>
            </li>
            
          </ul>
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bx-book-alt"></i>
              <span class="link_name">Posts</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Posts</a></li>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Login Form</a></li>
            <li><a href="#">Card Design</a></li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="link_name">Analytics</span>
          </a>
          <!-- <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Analytics</a></li>
          </ul> -->
        </li>
        <li>
          <a href="#">
            <i class="bx bx-line-chart"></i>
            <span class="link_name">Chart</span>
          </a>
          <!-- <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Chart</a></li>
          </ul> -->
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
              <i class="bx bx-plug"></i>
              <span class="link_name">Plugins</span>
            </a>
            <i class="bx bxs-chevron-down arrow"></i>
          </div>
          <ul class="sub-menu">
            <li><a class="link_name" href="#">Plugins</a></li>
            <li><a href="#">UI Face</a></li>
            <li><a href="#">Pigments</a></li>
            <li><a href="#">Box Icons</a></li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-compass"></i>
            <span class="link_name">Explore</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Explore</a></li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-history"></i>
            <span class="link_name">History</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">History</a></li>
          </ul>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="link_name">Setting</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="#">Setting</a></li>
          </ul>
        </li>
        <li>
          <div class="profile-details">
            <div class="profile-content">
              <img src="image/profile.jpg" alt="profileImg" />
            </div>
            <div class="name-job">
              <div class="profile_name">Prem Shahi</div>
              <div class="job">Web Desginer</div>
            </div>
            <i class="bx bx-log-out"></i>
          </div>
        </li>
      </ul>
    </div>