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
            <!-- looping into a table -->
            <form class="card mb-4" method="POST" action="<?= base_url('admin/editS') ?>">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Data User</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>NoMesin</th>
                                    <th>Jenis</th>
                                    <th>Warna</th>
                                    <th>Tarif Sewa/Jam</th>
                                    <th>Rating</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $ct = 1 ?>
                                <?php foreach ($query as $m) : ?>
                                    <tr>
                                        <td><img src="../asset/image/<?= $m['gambar'] ?>" class="img-thumbnail" style="width: 100px; height: 50"></img> </td>
                                        <td><?= $m['noMesin'] ?></td>
                                        <td><?= $m['jenis'] ?></td>
                                        <td><?= $m['warna'] ?></td>
                                        <td><?= $m['tarif'] ?></td>
                                        <td><?= $m['rating'] ?></td>
                                        <td><button class="btn" name="id" value="<?= $m['noMesin'] ?>" type="submit"><i class="fas fa-fw fa-user-edit"></i>Edit</button></td>
                                        <td><button class="btn" name="delete" value="<?= $m['noMesin'] ?>" type="submit"><i class="fas fa-fw fa-user-edit"></i>Delete</button></td>

                                    </tr>
                                    <?php $ct++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a class="btn btn-primary mb-3 col-2" href="<?= base_url('auth/registration') ?>"><i class="fas fa-fw fa-user-plus"></i> Add New Scooter</a>
                </div>
            </form>

        </main>