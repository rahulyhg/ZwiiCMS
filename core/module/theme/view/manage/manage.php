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
			<h4>Importer les données du thème</h4>
					<?php echo template::file('themeManageImport', [
							'label' => 'Archive à importer',
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
			<h4>Enregistrer les données du thème</h4>
			<div class="row">
				<div class="col5 offset1">
						<?php echo template::button('themeSave', [
							'href' => helper::baseUrl() . 'theme/save',
							'value' => 'Sauvegarder le thème dans les fichiers'
						]); ?>
				</div>
				<div class="col5">
					<?php echo template::button('themeExport', [
						'href' => helper::baseUrl() . 'theme/export',
						'value' => 'Télécharger une archive du thème'
					]); ?>
				</div>
			</div>
			L'archive ZIP contient la structure du thème avec l'arborescence complète à copier dans le dossier site. Les images sont comprises dans l'archive.	
			<p \>Le nom du thème est généré à partir du groupe date heure et d'un nombre aléatoire.
			</div>
		</div>
	</div>	
<?php echo template::formClose(); ?>
