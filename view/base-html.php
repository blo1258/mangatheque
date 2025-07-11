<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/mangatheque/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <?php
    if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error'] ?>
        </div>
        <?php
        unset($_SESSION['error']); 
        ?>
    <?php endif; ?>
        <?php
    if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
        </div>
        <?php
        unset($_SESSION['success']); 
        ?>
    <?php endif; ?>


    <?= $content ?? 'Pas de contenu' ?>
</body>
</html>
