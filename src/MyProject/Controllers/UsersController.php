<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Users\User;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Models\Pages\FeaturesPageService;

class UsersController extends AbstractController
{
    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                echo json_encode(array('error' => $e->getMessage()));
                return;
            }

            if ($user instanceof User) {
				echo json_encode(array('error' => 0));
                return;
            }
        }
		if ( !empty( $this->user ) ) {
			header('Location: /');
            exit();
		}
		
		$page = FeaturesPageService::postDataPage(array('title' => 'Регистрация' , 'description' => 'Регистрация нового пользователя', 'key' => 'Ключевые, слова, страницы, регистрации'));
        $this->view->renderHtml('users/signUp.php', [
            'features_page' => $page	
        ]);
    }

    public function login()
    {
		
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                echo json_encode(array('error' => 0));
                exit();
            } catch (InvalidArgumentException $e) {
				echo json_encode(array('error' => $e->getMessage()));
                return;
            }
        }
		if ( !empty( $this->user ) ) {
			header('Location: /');
            exit();
		}
		
		$page = FeaturesPageService::postDataPage(array('title' => 'Авторизация' , 'description' => 'Авторизация в блоге', 'key' => 'Ключевые, слова, страницы, авторизации'));
        $this->view->renderHtml('users/login.php', [
            'features_page' => $page	
        ]);
    }
	
	public function logOut()
    {
        setcookie('token', '', -1, '/', '', false, true);
        header('Location: /');
    }
	
	public function listUsers()
    {
        if ( empty( $this->user ) ) {
			header('Location: /');
            exit();
		}
		$users = User::findAll();
		$page = FeaturesPageService::postDataPage(array('title' => 'Список пользователей' , 'description' => 'Пользователи блога', 'key' => 'Ключевые, слова, страницы, списка, пользователей'));
		$this->view->renderHtml('users/listUser.php', [
            'users' => $users, 'features_page' => $page
        ]);
    }
	
	public function profile(int $userId): void
    {
        if ( empty( $this->user ) ) {
			header('Location: /');
            exit();
		}
		
		$users = User::getById($userId);

        if ($users === null) {
            throw new NotFoundException();
        }
		
		$page = FeaturesPageService::postDataPage(array('title' => $users->getLogin() , 'description' => 'Пользователь блога', 'key' => 'Ключевые, слова, страницы, пользователя'));
		$this->view->renderHtml('users/profileUser.php', [
            'users' => $users, 'features_page' => $page
        ]);
    }
	
}

?>