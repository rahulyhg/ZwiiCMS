<div class="row">
	<div class="col2">
		<?php echo template::button('formDataBack', [
			'class' => 'buttonGrey',
			'href' => helper::baseUrl() . $this->getUrl(0) . '/config',
			'ico' => 'left',
			'value' => 'Retour'
		]); ?>
	</div>
	<div class="col2 offset8">
	<?php echo template::button('formDataBack', [
			'class' => 'buttonBlue',
			'href' => helper::baseUrl() . $this->getUrl(0) . '/export2csv',
			'ico' => 'download',			
			'value' => 'Export CSV'
		]); ?>
	</div>
</div>
<?php echo template::table([11, 1], $module::$data, ['Données', '']); ?>
<?php echo $module::$pagination; ?>