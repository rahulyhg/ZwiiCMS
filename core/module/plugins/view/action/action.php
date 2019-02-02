<?php
$actionType = $module->actionType;
$pluginId = $module->targetPluginId;

$actionsList = [];
switch ($actionType) {
    case 'activate':
        $titre = "Installation du plugin " . $module->targetPluginId . ".";
        $ssTitre = "la bonne installation";
        $successMsg = "Installation terminée avec succès.";

        // Liste de sactions à réaliser
        $actionsList[] = "Vérification de la procédure";
        $actionsList[] = "Contrôle";
        $actionsList[] = "Sauvegarde";
	$actionsList[] = "Installation";
        break;

    case 'undeploy':
        $titre = "Désinstallation du plugin " . $module->targetPluginId . ".";
        $ssTitre = "la bonne désinstallation";
        $successMsg = "Désinstallation du plugin terminée avec succès.";

        // Liste de sactions à réaliser
        $actionsList[] = "Vérification de la procédure";
        $actionsList[] = "Contrôle";
        $actionsList[] = "Sauvegarde";
        $actionsList[] = "Désinstallation";
        break;

    default:
        // Cas du action/deploy et action/upload
        $titre = "Installation du plugin " . $module->targetPluginId . ".";
        $ssTitre = "la bonnne installation";
        $successMsg = "Installation terminée avec succès.";

        // Liste de sactions à réaliser
        $actionsList[] = "Préparation";
        $actionsList[] = "Téléchargement";
        $actionsList[] = "Contrôle";
        $actionsList[] = "Sauvegarde";
        $actionsList[] = "Installation";
        break;
}
?>
<p><strong><?php echo $titre; ?></strong></p>
<p>Afin d'assurer <?php echo $ssTitre;?> du plugin, veuillez ne pas fermer cette page avant la fin de l'opération.</p>
<div class="row">
	<div class="col9 verticalAlignMiddle">
		<div id="actionPluginProgress">
			<?php echo template::ico('spinner', '', true); ?>
                        <?php
                        $step = 0;
                        $nbSteps = count($actionsList);
                        $showClass = "";
                        foreach ($actionsList as $action) {
                            $step++;
                            if($step > 1) $showClass = " displayNone";
                            echo '<span class="actionPluginProgressText'.$showClass.'" data-id="'.$step.'">'.$step.'/'.$nbSteps.' : '.$action.'...</span>';
                        }
                        ?>
		</div>
		<div id="actionPluginError" class="displayNone">
                    <span class="colorRed"><?php echo template::ico('times', ''); ?></span>
                    Une erreur est survenue lors de l'étape <span id="actionPluginErrorStep" class="colorRed"></span>.<br/>
                    <span id="actionPluginDetailErrorStep" class="smallText colorRed"></span>
		</div>
		<div id="actionPluginSuccess" class="colorGreen displayNone">
			<?php echo template::ico('check', ''); ?>
			<?php echo $successMsg; ?>
		</div>
                <div id="actionPluginWarning" class="displayNone">
                    <span id="actionPluginDetailWarning" class="smallText colorOrange"></span>
		</div>
	</div>
	<div class="col3 verticalAlignMiddle">
		<?php echo template::button('actionPluginEnd', [
			'value' => 'Terminer',
			'href' => helper::baseUrl() . 'plugins/add',
			'ico' => 'check',
			'class' => 'disabled'
		]); ?>
	</div>
</div>