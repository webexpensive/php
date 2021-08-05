<?php

namespace MyProject\Models\Users;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
	/** @var string */
    protected $id;
	
    /** @var string */
    protected $login;

    /** @var string */
    protected $email;

    /** @var string */
    protected $role;

    /** @var string */
    protected $passwordHash;

    /** @var string */
    protected $authToken;

    /** @var string */
    protected $createdAt;

	/**
     * @return string
     */
    public function getIdUser(): int
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAuthToken(): string
    {
        return $this->authToken;
    }

    /**
     * @return string
     */
    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }
	
	public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public static function signUp(array $userData)
    {
        if (empty($userData['login'])) {
            throw new InvalidArgumentException('Не передан login');
        }

        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['login'])) {
            throw new InvalidArgumentException('login может состоять только из символов латинского алфавита и цифр');
        }

        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email некорректен');
        }

        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }

        if (mb_strlen($userData['password']) < 8) {
            throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');
        }

        if (static::findOneByColumn('login', $userData['login']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким login уже существует');
        }

        if (static::findOneByColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким email уже существует');
        }

        $user = new User();
        $user->login = htmlspecialchars ($userData['login'], ENT_QUOTES );
        $user->email = htmlspecialchars ($userData['email'], ENT_QUOTES );
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->role = 'user';
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();

        return $user;
    }

    public static function login(array $loginData): User
    {
        if (empty($loginData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }

        if (empty($loginData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }

        $user = User::findOneByColumn('email', $loginData['email']);
        if ($user === null) {
            throw new InvalidArgumentException('Нет пользователя с таким email');
        }

        if (!password_verify($loginData['password'], $user->getPasswordHash())) {
            throw new InvalidArgumentException('Неправильный пароль');
        }

        $user->refreshAuthToken();
        $user->save();

        return $user;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

    private function refreshAuthToken()
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }
}

?>
