<?php $pageTitle = $data['page_title']; ?>
<?php require APP_ROOT . '/views/inc/header.php';  ?>
<?php require APP_ROOT . '/views/inc/nav.php';  ?>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading"><?= $data['title']; ?></h1>
            <p>
                Version: <?= $data['app_version']; ?>
            </p>
            <p class="lead text-muted">
                <?= $data['description']; ?>
            </p>
        </div>
    </section>
<?php require APP_ROOT . '/views/inc/footer.php';  ?>