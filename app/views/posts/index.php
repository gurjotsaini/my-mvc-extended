<?php $pageTitle = $data['page_title']; ?>
<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php require APP_ROOT . '/views/inc/nav.php';  ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <h1>Posts</h1>
            </div>

            <div class="col-md-6 text-center">
                <a href="<?= URL_ROOT; ?>/posts/add" class="btn btn-primary pull-right">
                    <i class="fa fa-pencil"></i> Add Post
                </a>
            </div>
        </div>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>