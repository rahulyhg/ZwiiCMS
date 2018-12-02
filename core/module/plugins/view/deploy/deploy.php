<p><strong>Déploiement du plugin <?php echo $module->targetPluginId; ?>.</strong></p>
<p>Afin d'assurer du bon déploiement du plugin, veuillez ne pas fermer cette page avant la fin de l'opération.</p>
<div class="row">
	<div class="col9 verticalAlignMiddle">
		<div id="deployPluginProgress">
			<?php echo template::ico('spin', '', true); ?>
			<span class="deployPluginProgressText" data-id="1">1/5 : Préparation...</span>
                        <span class="deployPluginProgressText displayNone" data-id="2">2/5 : Téléchargement...</span>     
			<span class="deployPluginProgressText displayNone" data-id="3">3/5 : Contrôle...</span>                        
			<span class="deployPluginProgressText displayNone" data-id="4">4/5 : Sauvegarde...</span>
			<span class="deployPluginProgressText displayNone" data-id="5">5/5 : Installation...</span>
		</div>
		<div id="deployPluginError" class="displayNone">
                    <span class="colorRed"><?php echo template::ico('cancel', ''); ?></span>
                    Une erreur est survenue lors de l'étape <span id="deployPluginErrorStep" class="colorRed"></span>.<br/>
                    <span id="deployPluginDetailErrorStep" class="smallText colorRed"></span>
		</div>
		<div id="deployPluginSuccess" class="colorGreen displayNone">
			<?php echo template::ico('check', ''); ?>
			Déploiement terminé avec succès.
		</div>
	</div>
	<div class="col3 verticalAlignMiddle">
		<?php echo template::button('deployPluginEnd', [
			'value' => 'Terminer',
			'href' => helper::baseUrl() . 'plugins',
			'ico' => 'check',
			'class' => 'disabled'
		]); ?>
	</div>
</div>