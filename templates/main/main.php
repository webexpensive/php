<?php include __DIR__ . '/../header.php'; ?>

<?php foreach ($articles as $article): ?>
	
	<div class="card_space">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title"><a href="/articles/<?= $article->getId() ?>/"><?= $article->getName() ?></a></h5>
			<p class="card-text"><?= $article->getText() ?></p>
		  </div>
		  <ul class="list-group list-group-flush">
			<li class="list-group-item">Автор: <?= $article->getAuthor()->getLogin() ?></li>
		  </ul>
		</div>
	</div>
	
<?php endforeach; ?>

<?php include __DIR__ . '/../footer.php'; ?>
