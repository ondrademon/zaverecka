<?php

namespace App\Presenters;

use Nette;
use Nette\Database\Context;
use Tracy\Debugger;
use Nette\Application\UI;


class ArticlePresenter extends Nette\Application\UI\Presenter
{

	private $database;

	public function __construct(Context $database)
	{
		$this->database = $database;
	}


	public function renderDefault($id) {
		$article = $this->database->table("articles")->get($id);

		if ($article) {
			$this->template->article = $article;
		}
		else {
			Debugger::dump("Article not found");
			die();
		}
	}

	public function renderAdd() {
	}


	private $update_id;
	public function renderUpdate($id){
			$this->update_id = $id;

			$article = $this->database->table("articles")->get($id);

			if ($article) {
				$this->template->article = $article;
			}
			else {
				Debugger::dump("Article not found");
				die();
			}
	}

	public function actionDelete($id) {
		$this->database->table("articles")->get($id)->delete();
		$this->flashMessage("Článek úspěšně smazán.");
		$this->redirect("Homepage:");
	}

	protected function createComponentAddArticleForm()
	{
		$form = new UI\Form;
		$form->addText('title', 'Nadpis:');
		$form->addTextArea('content', 'Obsah:');
		$form->addSubmit('send', "Odeslat");
		$form->onSuccess[] = [$this, 'addArticleFormSucceeded'];
		return $form;
	}

	public function addArticleFormSucceeded(UI\Form $form, $values)
	{

		$this->database->table("articles")->insert([
			'title' => $values->title,
			'content' => $values->content
		]);

		$this->flashMessage('Článek byl úspěšně přidán.');
		$this->redirect('Homepage:');
	}

	protected function createComponentUpdateArticleForm()
	{
		$article = $this->database->table("articles")->get($this->update_id);

		$form = new UI\Form;
		$form->addText('title', 'Nadpis');
		$form->addTextArea('content', 'Obsah:');
		$form->addSubmit('update', 'Upravit');
		$form->onSuccess[] = [$this, 'updateArticleFormSucceeded'];
		return $form;
	}

	public function updateArticleFormSucceeded(UI\Form $form, $values)
	{
		$this->database->table('articles')
		->where('id', $this->update_id)
		->update([
			'title' => $values->title,
			'content' => $values->content
		]);

		$this->flashMessage('Článek byl úspěšně změněn.');
		$this->redirect('Homepage:');
	}
}
