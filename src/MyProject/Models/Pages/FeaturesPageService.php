<?php

namespace MyProject\Models\Pages;

class FeaturesPageService
{
	/** @var string */
    protected $title = 'Мой тестовый блог';
	
    /** @var string */
    protected $description = 'Описание тестового блога';

    /** @var string */
    protected $key = 'Ключевые, слова, тестового, блога';

	public function getTitle(): string
    {
        return $this->title;
    }
	
	public function getDescription(): string
    {
        return $this->description;
    }
	
	public function getKeywords(): string
    {
        return $this->key;
    }

	public static function getFeaturesPage()
    {
		$page = new FeaturesPageService();

        return $page;
    }
	
	public static function postDataPage(array $pageData): ? self
    {
        $page = new FeaturesPageService();
        $page->title = $pageData['title'];
		    $page->description = $pageData['description'];
		    $page->key = $pageData['key'];

        return $page;
    }

}

?>
