<?php $pageTitle = $data['page_title']; ?>
<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php require APP_ROOT . '/views/inc/nav.php';  ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <?php flash('register_success'); ?>
                    <h2 class="text-center">Login</h2>
                    <p class="text-center">Please fill in your cerdentials to login</p>
                    <form action="<?= URL_ROOT; ?>/users/login" method="post">
                        <div class="form-group">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" value="<?= $data['email']; ?>" class="form-control form-control-lg <?= (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?= $data['email_error']; ?></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" value="<?= $data['password']; ?>" class="form-control form-control-lg <?= (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?= $data['password_error']; ?></span>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Login" class="btn btn-success btn-block">
                            </div>

                            <div class="col">
                                <div class="row pl-lg-5">
                                    No account?&nbsp;<a href="<?= URL_ROOT; ?>/users/register" class="btn-link">Register</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>