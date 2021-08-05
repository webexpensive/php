<?php
/**
 * @var \MyProject\Models\Articles\Article $article
 */
include __DIR__ . '/../header.php';
?>
    <h1>Редактирование статьи</h1>
	<div class="form-article">	
<form method="post" name="formElemArticleEdit" id="formElemArticleEdit">
  <div class="form-group">
    <label for="name">Название статьи</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="" value="<?= $_POST['name'] ?? $article->getName() ?>" required>
  </div>
  <div class="form-group">
    <label for="text">Текст статьи</label>
    <textarea class="form-control" name="text" id="text" rows="3" required><?= $_POST['text'] ?? $article->getText() ?></textarea>
  </div>
  <div class="but_article"><button class="w-100 btn btn-lg btn-primary" type="submit">Сохранить изменения</button></div>
<div id="FormAlertArticleEdit"></div>
</form>
</div>
	
<?php include __DIR__ . '/../footer.php'; ?>