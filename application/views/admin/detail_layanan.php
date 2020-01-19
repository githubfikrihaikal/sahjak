              <!-- Page Container -->
              <div class="page-container">
                  <!-- Page Sidebar -->
                  <div class="page-sidebar">

                  </div><!-- /Page Sidebar -->
                  <div class="settings-sidebar">
                      <div class="settings-sidebar-content">
                          <div class="settings-sidebar-header">
                              <span>Settings</span>
                              <a href="javascript: void(0);" class="settings-menu-close"><i class="icon-close"></i></a>
                          </div>
                          <div class="right-sidebar-settings">
                              <span class="settings-title">General Settings</span>
                              <ul class="sidebar-setting-list list-unstyled">
                                  <li>
                                      <span class="settings-option">Notifications</span><input type="checkbox" class="js-switch" checked />
                                  </li>
                                  <li>
                                      <span class="settings-option">Activity log</span><input type="checkbox" class="js-switch" checked />
                                  </li>
                                  <li>
                                      <span class="settings-option">Automatic updates</span><input type="checkbox" class="js-switch" />
                                  </li>
                                  <li>
                                      <span class="settings-option">Allow backups</span><input type="checkbox" class="js-switch" />
                                  </li>
                              </ul>
                              <span class="settings-title">Account Settings</span>
                              <ul class="sidebar-setting-list list-unstyled">
                                  <li>
                                      <span class="settings-option">Chat</span><input type="checkbox" class="js-switch" checked />
                                  </li>
                                  <li>
                                      <span class="settings-option">Incognito mode</span><input type="checkbox" class="js-switch" />
                                  </li>
                                  <li>
                                      <span class="settings-option">Public profile</span><input type="checkbox" class="js-switch" />
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  <div class="settings-overlay"></div>
                  <!-- Page Content -->
                  <div class="page-content">
                      <?php $this->load->view('style/admin_sidebarmenu'); ?>
                      <!-- Page Header -->
                      <div class="page-header">
                          <div class="search-form">
                              <form action="#" method="GET">
                                  <div class="input-group">
                                      <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                      <span class="input-group-btn">
                                          <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                      </span>
                                  </div>
                              </form>
                          </div>
                          <nav class="navbar navbar-default navbar-expand-md">
                              <div class="container-fluid">
                                  <!-- Brand and toggle get grouped for better mobile display -->
                                  <div class="navbar-header">
                                      <div class="logo-sm">
                                          <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fas fa-bars"></i></a>
                                          <a class="logo-box" href="index.html"><span>concept</span></a>
                                      </div>
                                      <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                          <i class="fas fa-angle-down"></i>
                                      </button>
                                  </div>

                                  <!-- Collect the nav links, forms, and other content for toggling -->

                                  <div class="collapse navbar-collapse justify-content-between" id="bs-example-navbar-collapse-1">
                                      <ul class="nav navbar-nav mr-auto">
                                          <li class="collapsed-sidebar-toggle-inv"><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fas fa-bars"></i></a></li>
                                          <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fas fa-expand"></i></a></li>
                                          <li><a href="javascript:void(0)" id="search-button"><i class="fas fa-search"></i></a></li>
                                      </ul>
                                  </div><!-- /.navbar-collapse -->
                                  <ul class="nav navbar-nav">
                                      <li class="dropdown nav-item d-md-block">
                                          <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>
                                          <ul class="dropdown-menu dropdown-menu-right dropdown-lg dropdown-content">
                                              <li class="drop-title">Notifications<a href="#" class="drop-title-link"><i class="fas fa-angle-right"></i></a></li>
                                              <li class="slimscroll dropdown-notifications">
                                                  <ul class="list-unstyled dropdown-oc">
                                                      <li>
                                                          <a href="#"><span class="notification-badge bg-info"><i class="fas fa-at"></i></span>
                                                              <span class="notification-info">
                                                                  <span class="notification-info"><b>John Doe</b> mentioned you in a post "Update v1.5"</span>
                                                                  <small class="notification-date">06:07</small>
                                                              </span></a>
                                                      </li>
                                                      <li>
                                                          <a href="#"><span class="notification-badge bg-danger"><i class="fas fa-bolt"></i></span>
                                                              <span class="notification-info">
                                                                  <span class="notification-info">4 new special offers from the apps you follow!</span>
                                                                  <small class="notification-date">Yesterday</small>
                                                              </span></a>
                                                      </li>
                                                      <li>
                                                          <a href="#"><span class="notification-badge bg-success"><i class="fas fa-bullhorn"></i></span>
                                                              <span class="notification-info">
                                                                  <span class="notification-info">There is a meeting with <b>Ethan</b> in 15 minutes!</span>
                                                                  <small class="notification-date">Yesterday</small>
                                                              </span></a>
                                                      </li>
                                                  </ul>
                                              </li>
                                          </ul>
                                      </li>
                                      <li class="dropdown nav-item d-md-block">
                                          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?= $asset ?>images/avatars/avatar1.png" alt="" class="rounded-circle"></a>
                                          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                              <li><a href="#">Profile</a></li>
                                              <li><a href="#">Calendar</a></li>
                                              <li><a href="#"><span class="badge float-right badge-info">64</span>Messages</a></li>
                                              <li role="separator" class="divider"></li>
                                              <li><a href="#">Account Settings</a></li>
                                              <li><a href="#">Log Out</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                              </div><!-- /.container-fluid -->
                          </nav>
                      </div><!-- /Page Header -->
                      <!-- Page Inner -->
                      <div class="page-inner no-page-title">
                          <div id="main-wrapper">
                              <div class="content-header">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb breadcrumb-style-1">
                                          <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Daftar Layanan</li>
                                      </ol>
                                  </nav>
                                  <h1 class="page-title">Daftar Layanan</h1>
                              </div>
                              <div class="row">
                                  <div class="col-xl">
                                      <div class="card">
                                          <div class="card-body">
                                              <button type="button" class="btn btn-success float-right" style="margin-bottom:1px" onclick="goTambah()">+Tambah</button>
                                              <table class="table table-striped" id="tabel">
                                                  <thead class="thead-dark">
                                                      <tr>
                                                          <th scope="col">#</th>
                                                          <th scope="col">ID Antrian</th>
                                                          <th scope="col">Nama</th>
                                                          <th scope="col">Total Antrian</th>
                                                          <th scope="col">Antrian Sekarang</th>
                                                          <th scope="col">Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody id="tablebody">
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                          </div><!-- Main Wrapper -->


                          <div class="page-footer">
                              <p>2019 &copy; stacks</p>
                          </div>
                      </div><!-- /Page Inner -->

                  </div><!-- /Page Content -->
              </div><!-- /Page Container -->
              <script src="<?= $asset ?>firebase/crypto-js/crypto-js.js"></script>
              <script src="https://www.gstatic.com/firebasejs/7.2.2/firebase-app.js"></script>
              <script src="https://www.gstatic.com/firebasejs/7.2.2/firebase-database.js"></script>
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
              <script type="text/javascript" src="<?= $asset ?>firebase/detail_layanan.js"></script>