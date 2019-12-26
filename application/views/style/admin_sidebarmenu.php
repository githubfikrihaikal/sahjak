<div class="secondary-sidebar">
    <div class="secondary-sidebar-menu">
        <div class="secondary-sidebar-bar">
            <a href="#" class="logo-box"><?php echo $_SESSION['loggedin']['username'] ?></a>
        </div>
        <ul class="accordion-menu">
            <li class="active-page">
                <a href="<?= site_url('admin/') ?>">
                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                </a>
            </li>
            <?php
            if ($_SESSION['loggedin']['role'] == 'manajer') {
                ?>
                <li class="active-page">
                    <a href="<?= site_url('admin/pegawai') ?>">
                        <i class="menu-icon icon-person"></i><span>Daftar Karyawan</span>
                    </a>
                </li>
                <li class="active-page">
                    <a href="<?= site_url('admin/manajer') ?>">
                        <i class="menu-icon icon-person"></i><span>Daftar Manajer</span>
                    </a>
                </li>
            <?php
            }
            ?>
            <li class="active-page">
                <a href="<?= site_url('admin/layanan') ?>">
                    <i class="menu-icon icon-list-numbered"></i><span>Layanan Antrian</span>
                </a>
            </li>
            <li class="active-page">
                <a href="<?= site_url('antrian') ?>">
                    <i class="menu-icon icon-bell"></i><span>Daftar Antrian</span>
                </a>
            </li>
            <li class="active-page">
                <a href="<?= site_url('mesin') ?>">
                    <i class="menu-icon icon-bell"></i><span>Tampilan Mesin</span>
                </a>
            </li>

        </ul>
    </div>
</div>