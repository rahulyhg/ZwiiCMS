<p><strong>Suppression du déploiement du plugin <?php echo $module->targetPluginId; ?>.</strong></p>
<p>Afin d'assurer la bonne suppression du plugin, veuillez ne pas fermer cette page avant la fin de l'opération.</p>
<div class="row">
	<div class="col9 verticalAlignMiddle">
		<div id="undeployPluginProgress">
			<?php echo template::ico('spin', '', true); ?>
			<span class="undeployPluginProgressText" data-id="1">1/3 : Contrôle...</span>
                        <span class="undeployPluginProgressText displayNone" data-id="2">2/3 : Sauvegarde...</span>                        
			<span class="undeployPluginProgressText displayNone" data-id="3">3/3 : Supression du déploiement...</span>
		</div>
		<div id="undeployPluginError" class="displayNone">
                    <span class="colorRed"><?php echo template::ico('cancel', ''); ?></span>
                    Une erreur est survenue lors de l'étape <span id="undeployPluginErrorStep" class="colorRed"></span>.<br/>
                    <span id="undeployPluginDetailErrorStep" class="smallText colorRed"></span>
		</div>
		<div id="undeployPluginSuccess" class="colorGreen displayNone">
			<?php echo template::ico('check', ''); ?>
			Suppression du déploiement terminée avec succès.
		</div>
	</div>
	<div class="col3 verticalAlignMiddle">
		<?php echo template::button('undeployPluginEnd', [
			'value' => 'Terminer',
			'href' => helper::baseUrl() . 'plugins',
			'ico' => 'check',
			'class' => 'disabled'
		]); ?>
	</div>
</div>