<?php echo template::formOpen('themeManageForm'); ?>
	<div class="row">
		<div class="col2">
			<?php echo template::button('themeManageBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl() . 'theme',
				'ico' => 'left',
				'value' => 'Retour'
			]); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<div class="block">
			<h4>Importer</h4>
					<?php echo template::file('themeManageImport', [
							'label' => 'Archive',
							'type' => 2
					]); ?>
					<div class="col5 offset3">
						<?php echo template::submit('themeImportSubmit', [
							'value' => 'Importer'
						]); ?>
					</div>	
			</div>
		</div>
		<div class="col6">
			<div class="block">
			<h4>Exporter</h4>
			<div class="row">
				<div class="col5 offset1">
						<?php echo template::button('themeSave', [
							'href' => helper::baseUrl() . 'theme/save',
							'value' => 'Sauvegarder'
						]); ?>
				</div>
				<div class="col5">
					<?php echo template::button('themeExport', [
						'href' => helper::baseUrl() . 'theme/export',
						'value' => 'Télécharger'
					]); ?>
				</div>
			</div>
			L'archive ZIP contient un dossier "site" à copier à la racine du répertoire d'installation de ZwiiCMS. Il comprend les données du thème et les images qu'il utilise le cas échéant.
    		<p \>Le nom du thème est généré automatiquement à partir de la date et de l'heure de son enregistrement et d'un nombre aléatoire.
			</div>
		</div>
	</div>	
<?php echo template::formClose(); ?>
