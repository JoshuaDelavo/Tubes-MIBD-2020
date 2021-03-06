<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <li class="nav-item active">
                        <div class="sb-sidenav-menu-heading">Profile</div>
                        <a class="nav-link" href="<?= base_url('operator') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Operator
                        </a>
                    </li>
                    <li class="nav-item ">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link collapsed" href="<?= base_url('operator/penyewa') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-table"></i></div>
                            Record Data Penyewa Beserta Scotter
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="<?= base_url('operator/transaksi') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book-open"></i></div>
                            Record Transaksi Pengembalian Scooter
                        </a>
                    </li>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $user['name'] ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"> Welcome <?= $user['name']; ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Operator</li>
                </ol>


                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('asset/image/') . $user['image']; ?>" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $user['name']; ?></h5>
                                <p class="card-text"><?= $user['email']; ?></p>
                                <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2019</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>