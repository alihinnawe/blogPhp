<?php require 'functions/database.php';
$id = $_GET['id'];
$post = fetch_post($id); ?>

<?php include 'parts/header.php'; ?>
<h1>Eintrag</h1>

<div class="container-fluid py-5">
    <h1 class="display-5 fw-bold"><?= $post['title'] ?></h1>
    <p class="col-md-8 fs-4"><?= $post['content'] ?></p>
    <button class="btn btn-primary btn-lg" type="button">Example button</button>
</div>

<?php include 'parts/footer.php'; ?>