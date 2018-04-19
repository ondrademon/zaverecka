<?php
// source: F:\xampp\htdocs\sandbox\app\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template6c6a6fdc02 extends Latte\Runtime\Template
{
	public $blocks = [
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> | <?php
		}
?>NoName Blog</title>

	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 9 */ ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */ ?>/css/stylos.css">

</head>

<body>

<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>	<div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>>
		<div class="alert alert-primary" role="alert"><?php echo LR\Filters::escapeHtmlText($flash->message) /* line 17 */ ?></div>
	</div>
<?php
			$iterations++;
		}
?>
	<div class="header-container">
		<div class="row">
			<div class="col">
                <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:")) ?>">
                    <h1>NoName Blog</h1>
			</div>
		</div>
		<div class="row">
			<div class="col py-2 text-center">
				<a class="btn btn-light" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>">Homepage</a>
				<a class="btn btn-light" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Article:add")) ?>">Přidat článek</a>
			</div>
		</div>
	</div>

<?php
		$this->renderBlock('content', $this->params, 'html');
?>

	<div class="container-fluid main-footer-container">
		<div class="row">
			<div class="col py-4">
				<footer class="main-footer text-center">
					<span>ssps &copy; 2018</span>
				</footer>
			</div>
		</div>
	</div>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('scripts', get_defined_vars());
?>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 16');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
		<script src="https://nette.github.io/resources/js/netteForms.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 50 */ ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<?php
	}

}
