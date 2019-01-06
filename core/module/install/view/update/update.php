<p><strong>Mise à jour de Zwii <?php echo self::ZWII_VERSION; ?> vers Zwii <?php echo $module::$newVersion; ?>.</strong></p>
<p>Afin d'assurer le bon fonctionnement de Zwii, veuillez ne pas fermer cette page avant la fin de l'opération.</p>
<div class="row">
	<div class="col9 verticalAlignMiddle">
		<div id="installUpdateProgress">
			<?php echo template::ico('spinner', '', true); ?>
			<span class="installUpdateProgressText" data-id="1">1/5 : Préparation...</span>
			<span class="installUpdateProgressText displayNone" data-id="2">2/5 : Téléchargement...</span>
			<span class="installUpdateProgressText displayNone" data-id="3">3/5 : Installation...</span>
			<span class="installUpdateProgressText displayNone" data-id="4">4/5 : Configuration...</span>
                        <span class="installUpdateProgressText displayNone" data-id="5">5/5 : Déploiement des plugins...</span>
		</div>
		<div id="installUpdateError" class="colorRed displayNone">
			<?php echo template::ico('times', ''); ?>
			Une erreur est survenue lors de l'étape <span id="installUpdateErrorStep"></span>.
		</div>
		<div id="installUpdateSuccess" class="colorGreen displayNone">
			<?php echo template::ico('check', ''); ?>
			Mise à jour terminée avec succès.
		</div>
	</div>
	<div class="col3 verticalAlignMiddle">
		<?php echo template::button('installUpdateEnd', [
			'value' => 'Terminer',
			'href' => helper::baseUrl() . 'config',
			'ico' => 'check',
			'class' => 'disabled'
		]); ?>
	</div>
</div>