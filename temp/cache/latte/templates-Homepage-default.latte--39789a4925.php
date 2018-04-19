<?php
// source: F:\xampp\htdocs\sandbox\app\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template39789a4925 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['article'])) trigger_error('Variable $article overwritten in foreach on line 7');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">


<?php
		$iterations = 0;
		foreach ($articles as $article) {
?>
                <div class="row">

                    <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title"><?php echo LR\Filters::escapeHtmlText($article->title) /* line 13 */ ?></h3>
                                    <p id="vlastnosti"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->truncate, call_user_func($this->filters->striphtml, $article->content), 160)) /* line 14 */ ?></p>
                                    <a class="btn btn-info pull-right" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Article:update", [$article->id])) ?>">Upravit</a>
                                    <a class="btn btn-info pull-right" id="right-panel-link" href="<?php
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Article:default", [$article->id])) ?>">Zobrazit celý článek</a>
                                </div>
                            </div>
                    </div>
                </div>
<?php
			$iterations++;
		}
?>
    <div class="paginator-centered">

        <div class="footer-text">

            <nav class="homepage-pagination">
                <ul class="pagination" style="list-style-type:none">
                    <li class="page-item">
                        <a class="page-link" aria-label="Previous" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", [$page - 1])) ?>">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
<?php
		for ($i = 1;
		$i <= $paginator->getPageCount();
		$i++) {
			?>                        <li class="page-item"><a class="page-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", [$i])) ?>"><?php
			echo LR\Filters::escapeHtmlText($i) /* line 35 */ ?></a></li>
<?php
		}
?>
                    <li class="page-item">
                        <a class="page-link" aria-label="Next" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default", [$page + 1])) ?>">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </div>

</div>
<?php
	}

}
