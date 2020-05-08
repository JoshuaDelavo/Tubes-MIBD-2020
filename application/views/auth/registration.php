<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg">
                        <div class="card shadow-lg border-0 rounded-lg mt-5 col-lg">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('auth/registration'); ?>" method="POST">
                                    <div class="form-row">
                                        <div class="col-md">
                                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Full Name</label>
                                                <input class="form-control py-4" id="name" name="name" type="text" placeholder="Enter Full name" value="<?= set_value('name'); ?>" />
                                                <small class="text-danger"><?= form_error('name'); ?></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input class="form-control py-4" id="email" name="email" type="text" aria-describedby="emailHelp" placeholder="Enter email address" value="<?= set_value('email'); ?>" />
                                        <small class="text-danger"><?= form_error('email'); ?></small>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="password1" name="password1" type="password" placeholder="Enter password" />
                                                <small class="text-danger"><?= form_error('password1'); ?></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input class="form-control py-4" id="password2" name="password2" type="password" placeholder="Confirm password" /></div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Choose Role</label>
                                        </div>
                                        <select class="custom-select" id="ch" name="ch">
                                            <option selected>Choose...</option>
                                            <option value="2">Pimpinan Taman</option>
                                            <option value="3">Operator Penyewa</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="<?= base_url('auth'); ?>">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
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