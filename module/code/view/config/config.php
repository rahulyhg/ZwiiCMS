<?php echo template::formOpen('codeConfig'); ?>
	<div class="row">
		<div class="col2">
			<?php echo template::button('codeConfigBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'page/edit/' . $this->getUrl(0),
				'ico' => 'left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('codeConfigSubmit'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<div class="block">
				<h4>Fichier de code</h4>
				<?php echo template::file('codeConfigFile', [
					'label' => 'Fichier de code :',
					'placeholder' => helper::baseUrl() . 'site/file/source/',
					'value' =>  $this->getData(['module', $this->getUrl(0), 'file'])
				]); ?>
			</div>
		</div>
		<div class="col6">
			<div class="block">
				<h4>Statistiques</h4>
				<?php echo template::text('codeConfigCount', [
					'disabled' => true,
					'label' => 'Nombre de redirections',
					'value' => helper::filter($this->getData(['module', $this->getUrl(0), 'count']), helper::FILTER_INT)
				]); ?>
			</div>
		</div>
	</div>
<?php echo template::formClose(); ?>