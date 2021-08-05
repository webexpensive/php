<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Models\Pages\FeaturesPageService;

class ArticlesController extends AbstractController
{
    public function view(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

		$page = FeaturesPageService::postDataPage(array('title' => $article->getName() , 'description' => 'Описание страницы просмотра статьи', 'key' => 'Ключевые, слова, полного, просмотра'));

        $this->view->renderHtml('articles/view.php', [
            'article' => $article, 'features_page' => $page
        ]);
    }

    public function edit(int $articleId)
	{
		$article = Article::getById($articleId);

		if ($article === null) {
			throw new NotFoundException();
		}

		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if (!empty($_POST)) {
			try {
				$article->updateFromArray($_POST);
			} catch (InvalidArgumentException $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}

			echo json_encode(array('error' => 0));
			exit();
		}

		$this->view->renderHtml('articles/edit.php', ['article' => $article]);
	}

    public function add(): void
	{
		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if (!empty($_POST)) {
			try {
				$article = Article::createFromArray($_POST, $this->user);
			} catch (InvalidArgumentException $e) {
				echo json_encode(array('error' => $e->getMessage()));
				return;
			}

			echo json_encode(array('error' => 0));
			exit();
		}

		$this->view->renderHtml('articles/add.php');
	}
}

?>