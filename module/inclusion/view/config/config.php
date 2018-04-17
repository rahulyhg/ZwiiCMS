<?php echo template::formOpen('inclusionConfig'); ?>
	<div class="row">
		<div class="col2">
			<?php echo template::button('inclusionConfigBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'page/edit/' . $this->getUrl(0),
				'ico' => 'left',
				'value' => 'Retour'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('inclusionConfigSubmit'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<div class="block">
				<h4>inclusion</h4>
				<?php echo template::file('inclusionConfigUrl', [
					'label' => 'Lien d\'inclusion',
					'placeholder' => helper::baseUrl() . 'site/file/source/',
					'value' =>  $this->getData(['module', $this->getUrl(0), 'url'])
				]); ?>
			</div>
		</div>
		<div class="col6">
			<div class="block">
				<h4>Statistiques</h4>
				<?php echo template::text('inclusionConfigCount', [
					'disabled' => true,
					'label' => 'Nombre de redirections',
					'value' => helper::filter($this->getData(['module', $this->getUrl(0), 'count']), helper::FILTER_INT)
				]); ?>
			</div>
		</div>
	</div>
<?php echo template::formClose(); ?>