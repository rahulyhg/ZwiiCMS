<p><strong>Activation du plugin <?php echo $module->targetPluginId; ?>.</strong></p>
<p>Afin d'assurer due la bonne activation du plugin, veuillez ne pas fermer cette page avant la fin de l'opération.</p>
<div class="row">
	<div class="col9 verticalAlignMiddle">
		<div id="activatePluginProgress">
			<?php echo template::ico('spinner', '', true); ?>
			<span class="activatePluginProgressText" data-id="1">1/3 : Contrôle...</span>
                        <span class="activatePluginProgressText displayNone" data-id="2">2/3 : Sauvegarde...</span>
			<span class="activatePluginProgressText displayNone" data-id="3">3/3 : Activation...</span>
		</div>
		<div id="activatePluginError" class="displayNone">
                    <span class="colorRed"><?php echo template::ico('times', ''); ?></span>
                    Une erreur est survenue lors de l'étape <span id="activatePluginErrorStep" class="colorRed"></span>.<br/>
                    <span id="activatePluginDetailErrorStep" class="smallText colorRed"></span>
		</div>
		<div id="activatePluginSuccess" class="colorGreen displayNone">
			<?php echo template::ico('check', ''); ?>
			Activation terminée avec succès.
		</div>
	</div>
	<div class="col3 verticalAlignMiddle">
		<?php echo template::button('activatePluginEnd', [
			'value' => 'Terminer',
			'href' => helper::baseUrl() . 'plugins',
			'ico' => 'check',
			'class' => 'disabled'
		]); ?>
	</div>
</div>