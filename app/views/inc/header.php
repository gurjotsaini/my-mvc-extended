<?php if (!isset($pageTitle)) {
    $pageTitle = 'MyMVC Extended';
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">

    <title><?= $pageTitle; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= URL_ROOT; ?>/public/assets/css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="<?= URL_ROOT; ?>/public/assets/css/style.css" rel="stylesheet">
</head>
<body>
