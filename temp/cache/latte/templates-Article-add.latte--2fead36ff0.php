<?php
// source: F:\xampp\htdocs\sandbox\app\presenters/templates/Article/add.latte

use Latte\Runtime as LR;

class Template2fead36ff0 extends Latte\Runtime\Template
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
            <?php
		/* line 7 */
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $this->global->formsStack[] = $this->global->uiControl["addArticleForm"], []);
?>

                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text"<?php
		$_input = end($this->global->formsStack)["title"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'type' => NULL,
		))->attributes() ?>>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="3"<?php
		$_input = end($this->global->formsStack)["content"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'rows' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="Přidat" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["send"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                </div>
            <?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
?>

        </div>
    </div>
</div>
<?php
	}

}
