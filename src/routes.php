<?php

return [
    '~^articles/(\d+)/$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit/$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add/$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^users/register/$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
	'~^users/$~' => [\MyProject\Controllers\UsersController::class, 'listUsers'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/login/$~' => [\MyProject\Controllers\UsersController::class, 'login'],
	'~^users/logOut/~' => [\MyProject\Controllers\UsersController::class, 'logOut'],
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
	'~^articles/$~' => [\MyProject\Controllers\MainController::class, 'articles_str'],
	'~^users/(\d+)/$~' => [\MyProject\Controllers\UsersController::class, 'profile'],
];

?>