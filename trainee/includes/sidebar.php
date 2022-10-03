<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="assets/dist/img/napd.svg" alt="NAPD Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">NAPD OLMS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/dist/img/Hasan.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Md. Nasarul Hasan</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="fa-solid fa-gauge-circle-bolt"></i>
            </p>
          </a>
        </li>

        <li class="nav-header">Master List</li>

        <li class="nav-item dropdown">
          <a href="trainee/index.php" class="nav-link nav-faculty">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Your's Information
            </p>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a href="../trainee/down/index.php" class="nav-link nav-course">
          <i class="fa-solid fa-file-circle-plus"></i>
            <p>
              Download Session file
            </p>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a href="../trainee/video/display_video.php" class="nav-link nav-course">
          <i class="fa-solid fa-file-video"></i>
            <p>
              Download Session Vedio
            </p>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a href="login/logout.php" class="nav-link nav-course">
            <i class="fa-solid fa-right-from-bracket"></i>
            <p>
              Log out
            </p>
          </a>
        </li>

      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


<script>
  $(document).ready(function() {
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    page = page.split('/');
    page = page[0];
    if (s != '')
      page = page + '_' + s;

    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active')
      if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open')
      }
    }
  })
</script>