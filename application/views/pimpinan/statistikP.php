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
                    <li class="nav-item active">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link collapsed" href="<?= base_url('pimpinan/dataScooter') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-columns"></i></div>
                            Data Scooter
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="<?= base_url('pimpinan/transaksiS') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book-open"></i></div>
                            Transaksi Penyewaan Berdasarkan Scooter
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="<?= base_url('pimpinan/transaksiP') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-book-open"></i></div>
                            Transaksi Penyewaan Berdasarkan Penyewa
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link collapsed" href="<?= base_url('pimpinan/statistikP') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-chart-line"></i></div>
                            Statistik Penyewa
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="<?= base_url('pimpinan/statistikS') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-chart-line"></i></div>
                            Statistik Scooter
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
                    <li class="breadcrumb-item active">Statistik</li>
                </ol>

                <form class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Statistik Penyewa</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No Ktp</th>
                                        <th>Nama</th>
                                        <th>Jumlah Sewa </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($penyewa as $m) : ?>
                                        <tr>
                                            <td><?= $m['noKtp'] ?></td>
                                            <td><?= $m['username'] ?></td>
                                            <td><?= $m['ct'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </main>