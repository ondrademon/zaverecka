<?php
// source: F:\xampp\htdocs\sandbox\app\presenters/templates/Article/default.latte

use Latte\Runtime as LR;

class Template677306f51b extends Latte\Runtime\Template
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
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<div class="container">
    <div class="row">
        <div class="col py-4">

            <div class="article-detail">
                <h3><?php echo LR\Filters::escapeHtmlText($article->title) /* line 7 */ ?></h3>
                <a class="btn btn-sm btn-danger" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Article:delete", [$article->id])) ?>">Smazat</a>
                <div class="article-content py-4">
                    <?php echo LR\Filters::escapeHtmlText($article->content) /* line 10 */ ?>

                </div>
            </div>

        </div>
    </div>
</div>
<?php
	}

}
