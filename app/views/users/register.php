<?php $pageTitle = $data['page_title']; ?>
<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php require APP_ROOT . '/views/inc/nav.php';  ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2 class="text-center">Create An Account</h2>
                    <p class="text-center">Please fill out this form to register</p>
                    <form action="<?= URL_ROOT; ?>/users/register" method="post">
                        <div class="form-group">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control form-control-lg <?= (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?= $data['name_error']; ?></span>
                        </div>

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

                        <div class="form-group">
                            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm_password" value="<?= $data['name']; ?>" class="form-control form-control-lg <?= (!empty($data['con_password_error'])) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?= $data['con_password_error']; ?></span>
                        </div>

                        <div class="row">
                            <div class="col">
                                <input type="submit" value="Register" class="btn btn-success btn-block">
                            </div>

                            <div class="col">
                                <div class="row pl-lg-4">
                                    Have an account?&nbsp;<a href="<?= URL_ROOT; ?>/users/login" class="btn-link"> Login</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>