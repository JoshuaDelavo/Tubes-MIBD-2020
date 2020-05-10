<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Profile</div>
                    <a class="nav-link" href="index.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                        Admin
                    </a>
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="<?= base_url('admin/dataUser') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-user"></i></div>
                            Data User
                        </a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link collapsed" href="<?= base_url('admin/dataScooter') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-edit"></i></div>
                            Data & Tarif Scooter
                        </a>
                    </li>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $user['name']; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Scooter</li>
            </ol>

            <!-- query data User -->
            <?= $this->session->flashdata('message'); ?>
            <!-- form data table -->
            <?= form_open_multipart('admin/updateS'); ?>
            <input type="hidden" name="data" value="<?= $dataS['noMesin'] ?>">
            <div class="form-group row col-7">
                <label for="inputEmail3" class="col-sm-2 col-form-label">No Mesin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mesin" id="mesin" value="<?= $dataS['noMesin'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row col-7">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="jenis" id="jenis" value="<?= $dataS['jenis'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row col-7">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Warna</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="warna" id="warna" value="<?= $dataS['warna'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row col-7">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tarif</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="tarif" id="tarif" value="<?= $dataS['tarif'] ?>">
                </div>
            </div>
            <div class="form-group row col-7">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('asset/image/') . $dataS['gambar'] ?>" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row col-7">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Change</button>
                </div>
            </div>
            </form>
            <form action="<?= base_url('admin/deleteS') ?>" method="POST">
                <div class="form-group row col-7">
                    <div class="col-sm-10">
                        <button type="submit" name="delete" id="delete" value="<?= $dataS['noMesin'] ?>" class="btn btn-primary">Delete</button>
                    </div>
                </div>
            </form>
        </main>