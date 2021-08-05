<?php include __DIR__ . '/../header.php'; ?>

	<div class="card">
	  <div class="card-body">
		<h1 class="card-title"><?= $article->getName() ?></h1>
		<p class="card-text"><?= $article->getText() ?></p>
	  </div>
	  <ul class="list-group list-group-flush">
		<li class="list-group-item">Автор: <?= $article->getAuthor()->getLogin() ?></li>
	  </ul>
	</div>
	
<?php include __DIR__ . '/../footer.php'; ?>

