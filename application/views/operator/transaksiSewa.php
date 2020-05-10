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
        <?= $this->session->flashdata('message'); ?>
        <main>
            <div class="container-fluid">
                <h1 class="mt-4"> Welcome <?= $user['name']; ?></h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Data Penyewa & Scooter</li>
                </ol>

                <!-- looping into a table -->
                <form class="card mb-4" method="POST" action="<?= base_url('operator/add') ?>">
                    <div class="card-header"><i class="fas fa-table mr-1"></i>Data User</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No Mesin</th>
                                        <th>Warna</th>
                                        <th>Nama</th>
                                        <th>Waktu Awal</th>
                                        <th>Waktu Kembali</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Biaya Tambahan</th>
                                        <th>Rating</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orang as $m) : ?>
                                        <?php
                                        $waktuKembali = strtotime($m['waktuKembali']) / 3600;
                                        $waktuPinjam =   strtotime($m['waktuPinjam']) / 3600;
                                        $tarif = ($waktuKembali - $waktuPinjam)  - 1;
                                        $tarif = $tarif * $m['tarif'];

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

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <a class="btn btn-primary mb-3 col-3" href="<?= base_url('operator/add') ?>"><i class="fas fa-fw fa-user-plus"></i> Sewa Scooter</a>
                    </div>
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