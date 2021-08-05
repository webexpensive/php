<?php

namespace MyProject\Models\Articles;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param User $user
     */
    public function setAuthor(User $user): void
    {
        $this->authorId = $user->getId();
    }

    protected static function getTableName(): string
    {
        return 'articles';
    }
	
	public static function createFromArray(array $fields, User $author): Article
	{
		if (empty($fields['name'])) {
			throw new InvalidArgumentException('Не передано название статьи');
		}

		if (empty($fields['text'])) {
			throw new InvalidArgumentException('Не передан текст статьи');
		}

		$article = new Article();

		$article->setAuthor($author);
		$article->setName(htmlspecialchars ($fields['name'], ENT_QUOTES ));
		$article->setText(htmlspecialchars ($fields['text'], ENT_QUOTES ));

		$article->save();

		return $article;
	}
	
	public function updateFromArray(array $fields): Article
	{
		if (empty($fields['name'])) {
			throw new InvalidArgumentException('Не передано название статьи');
		}

		if (empty($fields['text'])) {
			throw new InvalidArgumentException('Не передан текст статьи');
		}

		$this->setName(htmlspecialchars ($fields['name'], ENT_QUOTES ));
		$this->setText(htmlspecialchars ($fields['text'], ENT_QUOTES ));

		$this->save();

		return $this;
	}
}

?>
