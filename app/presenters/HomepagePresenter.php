<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;
use Nette\Utils\Paginator;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	private $database;


	public function __construct(Context $database)
	{
		$this->database = $database;
	}

	public function renderDefault($page = 1) {

		$paginator = new Paginator;

		$articlesCount  = $this->database->table("articles")->count();

		$paginator->setItemsPerPage(5);
		$paginator->setItemCount($articlesCount);
		$paginator->setPage($page);


		$articles = $this->database->table("articles")
			->limit($paginator->getItemsPerPage(), $paginator->getOffset());

		$this->template->page = $page;
		$this->template->paginator = $paginator;
		$this->template->articles = $articles;
	}
}
