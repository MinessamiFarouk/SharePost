<?php require APP_ROOT . '/views/inc/header.php'; ?>
    <div class="container-fluid bg-light p-5 text-center text-center">
        <h1><?php echo $data['tittle']; ?></h1>
        <p><?php echo $data['description']; ?></p>
        <p>Version: <strong><?php echo APP_VERSION; ?></strong></p>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
