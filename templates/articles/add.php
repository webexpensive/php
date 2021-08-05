<?php include __DIR__ . '/../header.php'; ?>
    <h1>Создание новой статьи</h1>

<div class="form-article">	
<form method="post" name="formElemArticle" id="formElemArticle">
  <div class="form-group">
    <label for="name">Название статьи</label>
    <input type="text" class="form-control" name="name" id="name" placeholder="" required>
  </div>
  <div class="form-group">
    <label for="text">Текст статьи</label>
    <textarea class="form-control" name="text" id="text" rows="3" required></textarea>
  </div>
  <div class="but_article"><button class="w-100 btn btn-lg btn-primary" type="submit">Добавить статью</button></div>
<div id="FormAlertArticle"></div>
</form>
</div>
	
	
<?php include __DIR__ . '/../footer.php'; ?>
