<?php $pageTitle = $data['page_title']; ?>
<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php require APP_ROOT . '/views/inc/nav.php';  ?>
    <div class="container">
        <a href="<?= URL_ROOT; ?>/posts" class="btn btn-light">
            <i class="fa fa-backward"></i> Back
        </a>
        <h1 class="text-center"><?= $data['post']->title; ?></h1>
        <div class="p-2 mb-3 text-center">
            Written by: <?= $data['user']->name; ?> on <?= $data['post']->created_at; ?>
        </div>
        <p><?= $data['post']->body; ?></p>

        <?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
            <hr>
            <div class="row">
                <a href="<?= URL_ROOT; ?>/posts/edit/<?= $data['post']->id; ?>" class="btn btn-dark">Edit</a>

                <form class="pull-right" action="<?= URL_ROOT; ?>/posts/delete/<?= $data['post']->id; ?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
        <?php endif; ?>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>