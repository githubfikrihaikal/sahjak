              <!-- Page Container -->
              <div class="page-container">
                  <!-- Page Sidebar -->
                  <div class="page-sidebar">

                  </div><!-- /Page Sidebar -->

                  <!-- Page Content -->
                  <div class="page-content">
                      <?php $this->load->view('style/admin_sidebarmenu'); ?>
                      <!-- Page Header -->
                      <?php $this->load->view('style/admin_header_r'); ?>
                      <!-- Page Inner -->
                      <div class="page-inner no-page-title">
                          <div id="main-wrapper">
                              <div class="content-header">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb breadcrumb-style-1">
                                          <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Data Layanan</li>
                                      </ol>
                                  </nav>
                                  <h1 class="page-title">Data Layanan</h1>
                              </div>
                              <div class="row">
                                  <div class="col-xl">
                                      <div class="card">
                                          <div class="card-body">
                                              <button type="button" class="btn btn-success float-right" onclick="goTambah()" style="margin-bottom:1px">+Tambah</button>
                                              <table class="table table-striped" id="tabel">
                                                  <thead class="thead-dark">
                                                      <tr>
                                                          <th scope="col">#</th>
                                                          <th scope="col" class="text-center">Nama</th>
                                                          <th scope="col" class="text-center">Action</th>
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
              <script type="text/javascript" src="<?= $asset ?>firebase/layanan.js"></script>