<?php include __DIR__ . '/../header.php'; ?>
    <h2><a href="/users/<?= $users->getIdUser() ?>/"><?= $users->getLogin() ?></a></h2>
    <p><?= $users->getEmail() ?></p>
    <hr>
<?php include __DIR__ . '/../footer.php'; ?>