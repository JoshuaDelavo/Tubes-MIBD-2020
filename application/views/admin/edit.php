<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Profile</div>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?= base_url('admin') ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                            Admin
                        </a>
                    </li>
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <li class="nav-item active">
                        <a class="nav-link collapsed" href="<?= base_url('admin/dataUser'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-user"></i></div>
                            Data User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?= base_url('admin/dataScooter'); ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-fw fa-user"></i></div>
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
                <li class="breadcrumb-item active">Data User</li>
            </ol>

            <!-- query data User -->

            <script>
                function update() {
                    var nama = document.getElementsByName('name').value;
                    var email = document.getElementsByName('email').value;
                    var password = document.getElementsByName('password').value;
                    var jabatan = document.getElementsByName('jabatan').value;
                }
            </script>
            <!-- form data -->
            <form method="POST" action="<?= base_url('admin/update') ?>">
                <input type="hidden" name="data" value="<?= $user['id'] ?>">
                <div class="form-group row col-7">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="<?= $user['name'] ?>">
                    </div>
                </div>
                <div class="form-group row col-7">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="email" value="<?= $user['email'] ?>">
                    </div>
                </div>
                <div class="form-group row col-7">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="password" value="<?= $user['password'] ?>">
                        <input type="hidden" class="form-control" name="password2" id="password" value="<?= $user['password'] ?>">
                    </div>
                </div>
                <div class="form-group row col-7">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jabatan" id="jabatan" value="<?php
                                                                                                    if ($user['role_id'] == '2') {
                                                                                                        echo 'Pimpinan Taman';
                                                                                                    } else if ($user['role_id'] == '3') {
                                                                                                        echo 'Operator';
                                                                                                    }

                                                                                                    ?>">
                    </div>
                </div>
                <div class="form-group row col-7">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </div>
            </form>
            <form action="<?= base_url('admin/delete') ?>" method="POST">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Delete</button>
                    <input type="hidden" name="idDelete" id="idDelete" value="<?= $user['id'] ?>">
                </div>

            </form>
        </main>