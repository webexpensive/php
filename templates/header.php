<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?=$features_page->getTitle()?></title>
	<meta name="description" content="<?=$features_page->getDescription()?>">
	<meta name="keywords" content="<?=$features_page->getKeywords()?>">
	<meta name="author" lang="ru" content="Александр">
	<meta name="generator" content="WebExp 0.1">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/styles.css">
</head>
<body>

	<nav class="py-2 bg-light border-bottom">
		<div class="container d-flex flex-wrap">
			<ul class="nav me-auto">
				<li class="nav-item"><a href="/" class="nav-link link-dark px-2 active" aria-current="page">Главная</a></li>
				<li class="nav-item"><a href="/articles/" class="nav-link link-dark px-2">Статьи</a></li>
				</ul>
				<ul class="nav">
				<?php if(!empty($user)): ?>
				<li class="nav-item"><a href="/users/" class="nav-link link-dark px-2">Все пользователи</a></li>
				<li class="nav-item"><a href="/users/logOut/" class="nav-link link-dark px-2">Выйти</a></li>
				<?php else: ?>
				<li class="nav-item"><a href="/users/login/" class="nav-link link-dark px-2">Войти</a></li>
				<li class="nav-item"><a href="/users/register/" class="nav-link link-dark px-2">Зарегистрироваться</a></li>
				<? endif; ?>
			</ul>
		</div>
	</nav>
	<header class="py-3 mb-4 border-bottom">
		<div class="container d-flex flex-wrap justify-content-center">
			<a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
				<span class="fs-4"><?=$features_page->getTitle()?></span>
			</a>
		</div>
	</header>

	<main role="main" class="container">
		<div class="main_index">
