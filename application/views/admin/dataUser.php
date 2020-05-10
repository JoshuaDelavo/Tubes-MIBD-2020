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
                    <li class="nav-item active">
                        <a class="nav-link collapsed" href="<?= base_url('admin/dataUser') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-user"></i></div>
                            Data User
                        </a>
                    </li>
                    <a class="nav-link collapsed" href="<?= base_url('admin/dataScooter') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-fw fa-edit"></i></div>
                        Data & Tarif Scooter
                    </a>
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
                <li class="breadcrumb-item active">Data User</li>
            </ol>
            <!-- query data User -->
            <?= $this->session->flashdata('message'); ?>
            <!-- looping into a table -->
            <form class="card mb-4" method="POST" action="<?= base_url('admin/edit') ?>">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Data User</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Position</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $ct = 1 ?>
                                <?php foreach ($query as $m) : ?>
                                    <?php
                                    if ($m['role_id'] == '2') {
                                        $jabatan = 'Pimpinan Taman';
                                    } else if ($m['role_id'] == '3') {
                                        $jabatan = 'Operator';
                                    }
                                    ?>
                                    <tr>
                                        <td><?= $ct ?></td>
                                        <td><?= $m['name'] ?></td>
                                        <td><?= $m['email'] ?></td>
                                        <td><?= $m['password'] ?></td>
                                        <td><?= $jabatan ?></td>
                                        <td><button class="btn" name="id" value="<?= $m['id'] ?>" type="submit"><i class="fas fa-fw fa-user-edit"></i>Edit</button></td>
                                        <td><button class="btn" name="delete" value="<?= $m['id'] ?>" type="submit"><i class="fas fa-fw fa-user-edit"></i>Delete</button></td>
                                    </tr>
                                    <?php $ct++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a class="btn btn-primary mb-3 col-2" href="<?= base_url('auth/registration') ?>"><i class="fas fa-fw fa-user-plus"></i> Add New User</a>
                </div>
            </form>

        </main>