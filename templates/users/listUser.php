<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($users as $user): ?>
    <h2><a href="/users/<?= $user->getIdUser() ?>/"><?= $user->getLogin() ?></a></h2>
    <p><?= $user->getEmail() ?></p>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>
