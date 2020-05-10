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
                    <li class="nav-item active">
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
                    <li class="breadcrumb-item active">Data Penyewa & Scooter</li>
                </ol>

                <!-- looping into a table -->
                <form action="<?= base_url('operator/insert'); ?>" method="POST">
                    <div class="form-row">
                        <div class="col-md">
                            <div class="form-group"><label class="small mb-1" for="inputFirstName">No KTP</label>
                                <input class="form-control py-4" id="noKtp" name="noKtp" type="text" placeholder="Enter No KTP" />
                                <small class="text-danger"><?= form_error('noKtp'); ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Name</label>
                        <input class="form-control py-4" id="name" name="name" type="text" aria-describedby="emailHelp" placeholder="Enter Name" />
                        <small class="text-danger"><?= form_error('name'); ?></small>
                    </div>
                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">No Telepon</label>
                        <input class="form-control py-4" id="number" name="number" type="text" aria-describedby="emailHelp" placeholder="Enter Your Number" />
                        <small class="text-danger"><?= form_error('number'); ?></small>
                    </div>
                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Address</label>
                        <input class="form-control py-4" id="alamat" name="alamat" type="text" aria-describedby="emailHelp" placeholder="Enter Your Address" />
                        <small class="text-danger"><?= form_error('alamat'); ?></small>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Pilih Scooter</label>
                        </div>
                        <select class="custom-select" id="ch" name="ch" required>
                            <option selected>Choose...</option>
                            <?php foreach ($orang as $m) : ?>
                                <option value="<?= $m['noMesin'] ?>"><?= $m['warna'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Bayar</button></div>
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