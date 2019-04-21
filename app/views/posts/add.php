<?php $pageTitle = $data['page_title']; ?>
<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php require APP_ROOT . '/views/inc/nav.php';  ?>
    <div class="container">
        <a href="<?= URL_ROOT; ?>/posts" class="btn btn-light">
            <i class="fa fa-backward"></i> Back
        </a>
        <div class="card card-body bg-light mt-5">
            <h2>Add Post</h2>
            <p>Create a post with this form</p>
            <form action="<?= URL_ROOT; ?>/posts/add" method="post">
                <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" name="title" value="<?= $data['title']; ?>" class="form-control form-control-lg <?= (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?= $data['title_error']; ?></span>
                </div>

                <div class="form-group">
                    <label for="body">Body: <sup>*</sup></label>
                    <textarea name="body" class="form-control form-control-lg <?= (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"><?= $data['body']; ?></textarea>
                    <span class="invalid-feedback"><?= $data['body_error']; ?></span>
                </div>

                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>