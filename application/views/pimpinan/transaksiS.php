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
                    <li class="breadcrumb-item active">Transaksi Scooter</li>
                </ol>

                <form class="card mb-4">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Scooter</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Scooter</th>
                                        <th>Tanggal Akhir</th>
                                        <th>Tarif </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $hasil = 0;

                                    ?>
                                    <?php foreach ($query as $m) : ?>
                                        <?php
                                        $hasil +=  $m['tarif'] + 0;
                                        ?>
                                        <tr>
                                            <td><?= $m['noMesin'] ?></td>
                                            <td><?= $m['tanggalPinjam'] ?></td>
                                            <td><?= $m['tarif'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                            </div>
                            <div class="col-md-3 mb-3">
                            </div>
                            <div class="col-md-2 mb-3">
                            </div>
                            <div class="col-md-1 mb-2">
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom05">Total</label>
                                <input type="text" class="form-control" id="validationCustom05" value="<?= $hasil ?>" readonly>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>