<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Pages\FeaturesPageService;

class MainController extends AbstractController
{
    public function main()
    {
        $articles = Article::findMany();
		
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
        ]);
    }
	
	public function articles_str()
    {
        $articles = Article::findAll();
		
		$page = FeaturesPageService::postDataPage(array('title' => 'Статьи' , 'description' => 'Описание статей', 'key' => 'Ключевые, слова, статей'));
		
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles, 'features_page' => $page
			
        ]);
    }
}

?>