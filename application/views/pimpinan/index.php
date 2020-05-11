<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <li class="nav-item">
                        <div class="sb-sidenav-menu-heading">Profile</div>
                        <a class="nav-link" href="<?= base_url('pimpinan') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                            Pimpinan
                        </a>
                    </li>
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-columns"></i></div>
                        Data Scooter
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book-open"></i></div>
                        Transaksi Penyewaan Berdasarkan Scooter
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book-open"></i></div>
                        Transaksi Penyewaan Berdasarkan Penyewa
                    </a>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-chart-line"></i></div>
                        Statistik
                    </a>
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
                    <li class="breadcrumb-item active">Dashboard</li>
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
            </div>
        </main>