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
        <!-- menu sidebar disini -->

        <?php $this->load->view('style/admin_sidebarmenu'); ?>

        <!-- Page Header -->
        <!-- header disini -->
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
                            <a class="logo-box" href="index.html"><span>Nama</span></a>
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
                        <!-- notification -->
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
                                <li><a href="<?php echo site_url('admin/logout')?>">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.container-fluid -->
            </nav>
        </div><!-- /Page Header -->
        <!-- Page Inner -->
        <div class="page-inner no-page-title">
            <div id="main-wrapper">
                <!-- Titlenya disini -->
                <div class="content-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style-1">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h1 class="page-title">Dashboard</h1>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Monthly Earnings</h5>
                                <div id="apex1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Trending Services</h5>
                                <div class="trending-services">
                                    <ul class="list-unstyled slimscroll">
                                        <li>Social Network<div class="text-success float-right">32%<i class="fa fa-level-up"></i></div>
                                        </li>
                                        <li>File Management<div class="text-success float-right">25%<i class="fa fa-level-up"></i></div>
                                        </li>
                                        <li>Search Engine<div class="text-success float-right">16%<i class="fa fa-level-up"></i></div>
                                        </li>
                                        <li>Calendar<div class="text-danger float-right">4%<i class="fa fa-level-down"></i></div>
                                        </li>
                                        <li>Todo App<div class="text-danger float-right">17%<i class="fa fa-level-down"></i></div>
                                        </li>
                                        <li>Mailbox<div class="text-success float-right">14%<i class="fa fa-level-up"></i></div>
                                        </li>
                                        <li>Travel Guide<div class="text-danger float-right">9%<i class="fa fa-level-down"></i></div>
                                        </li>
                                        <li>Finances App<div class="text-danger float-right">27%<i class="fa fa-level-down"></i></div>
                                        </li>
                                        <li>Online Wallet<div class="text-success float-right">16%<i class="fa fa-level-up"></i></div>
                                        </li>
                                        <li>Others<div class="text-success float-right">9%<i class="fa fa-level-up"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissible fade show m-b-md" role="alert">
                            Activity reports have been updated 2 days ago. <a href="#" class="alert-link">Click here</a> to see the old data.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <div class="info-card">
                                    <h4 class="info-title">Sales Today<span class="info-stats">45.6k</span></h4>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <div class="info-card">
                                    <h4 class="info-title">Support Questions<span class="info-stats">1.2k</span></h4>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <div class="info-card">
                                    <h4 class="info-title">New Members<span class="info-stats">2.4k</span></h4>
                                    <div class="progress" style="height: 3px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Last Orders</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">07809</th>
                                                <td>Alpha - Angular 8</td>
                                                <td>Chritopher Palmer</td>
                                                <td>Dec 15, 2019</td>
                                                <td><span class="badge badge-info">In Progress</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">07068</th>
                                                <td>Modern - PSD</td>
                                                <td>Stuart Woodley</td>
                                                <td>Nov 29, 2019</td>
                                                <td><span class="badge badge-info">In Progress</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">08392</th>
                                                <td>Mobile App Theme</td>
                                                <td>Murphy Cartwright</td>
                                                <td>Nov 12, 2019</td>
                                                <td><span class="badge badge-success">Finished</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">09415</th>
                                                <td>CRM Application</td>
                                                <td>Gurpreet Holder</td>
                                                <td>Jul 8, 2019</td>
                                                <td><span class="badge badge-danger">Canceled</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">08678</th>
                                                <td>Crypto Exchange</td>
                                                <td>Marshall Wheeler</td>
                                                <td>Feb 17, 2019</td>
                                                <td><span class="badge badge-danger">Canceled</span></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">08446</th>
                                                <td>Alpha - Bootstrap Version</td>
                                                <td>Nikki Blanchard</td>
                                                <td>Dec 26, 2018</td>
                                                <td><span class="badge badge-success">Finished</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Main Wrapper -->
        </div><!-- /Page Inner -->
    </div><!-- /Page Content -->
</div><!-- /Page Container -->