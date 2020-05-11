<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <li class="nav-item">
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
                    <li class="nav-item active">
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
                    <li class="breadcrumb-item active">Data Penyewa & Scooter</li>
                </ol>
                <?= $this->session->flashdata('message'); ?>

                <!-- looping into a table -->
                <form class="card mb-4" action="<?= base_url('operator/formB') ?>" method="POST">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Data User</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id Scooter</th>
                                        <th>Warna</th>
                                        <th>Nama</th>
                                        <th>Waktu Awal</th>
                                        <th>Waktu Kembali</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Biaya Tambahan</th>
                                        <th>Rating</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orang as $m) : ?>
                                        <?php
                                        $waktuKembali = strtotime($m['waktuKembali']) / 3600;
                                        $waktuPinjam =   strtotime($m['waktuPinjam']) / 3600;
                                        $tarif = ($waktuKembali - $waktuPinjam);
                                        if ($tarif <= 0) {
                                            $tarif = 0;
                                        } else if ($tarif <= 1 && $tarif > 0) {
                                            $tarif = 0;
                                        } else {
                                            $tarif = $tarif - 1;
                                            $tarif = $tarif * $m['tarif'];
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $m['noMesin'] ?></td>
                                            <td><?= $m['warna'] ?></td>
                                            <td><?= $m['username'] ?></td>
                                            <td><?= $m['waktuPinjam'] ?></td>
                                            <td><?= $m['waktuKembali'] ?></td>
                                            <td><?= $m['tanggalPinjam'] ?></td>
                                            <td><?= $tarif ?></td>
                                            <td><?= $m['rating'] ?></td>
                                            <?php
                                            if ($m['status'] == 0) {
                                                $nama = 'Sudah Bayar';
                                            }
                                            if ($m['status'] == 1) {
                                                $nama = 'Belum Bayar';
                                            }

                                            ?>
                                            <td><button class="btn btn-primary" type="submit" name="btn" id="btn" value="<?php
                                                                                                                            if ($nama == 'Sudah Bayar') {
                                                                                                                                echo '0';
                                                                                                                            } else {
                                                                                                                                echo $m['noTransaksi'];
                                                                                                                            }
                                                                                                                            ?>">
                                                    <?= $nama ?>

                                                </button></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </form>
                <form method="POST" action="<?= base_url('operator/add') ?>">
                    <br>
                    <a class="btn btn-primary mb-3 col-3" href="<?= base_url('operator/add') ?>"><i class="fas fa-fw fa-user-plus"></i> Sewa Scooter</a>
                </form>

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