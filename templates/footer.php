		
		</div>
	</main>

	<footer class="text-center text-lg-start bg-light text-muted">
		<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
			© 2021 Copyright:
			<a class="text-reset fw-bold" href="/" title="Пример блога">Пример блога</a>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="/js/auth.js"></script>
	<?php if (!empty($user)): ?><?php if ($user->isAdmin()): ?><script src="/js/add.js"></script><?php endif; ?><?php endif; ?>
</body>
</html>
