<?php include __DIR__ . '/../header.php'; ?>

	<div class="form-signin">
		<form method="post" name="formElemLogin" id="formElemLogin">
			<h1 class="h3 mb-3 fw-normal">Пожалуйста, войдите</h1>

			<div class="form-floating">
				<input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
				<label for="floatingInput">Адрес эл. почты</label>
			</div>
			<div class="form-floating">
				<input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
				<label for="floatingPassword">Пароль</label>
			</div>
			<button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
			<div id="FormAlertLogin"></div>
		</form>
	</div>
  
<?php include __DIR__ . '/../footer.php'; ?>

