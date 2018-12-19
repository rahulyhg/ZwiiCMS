<?php
$actionType = $module->actionType;

switch ($actionType) {
    case 'activate':
        $nbSteps = 4;
        break;

    case 'undeploy':
        $nbSteps = 4;
        break;

    default:
        // Cas du action/deploy et action/upload
        $nbSteps = 5;
        break;
}
?>
/**
 * Exécution des différentes étapes de l'action sur le plugin (deploy, undeploy, activate, upload)
 */
function step(i, data) {
	// Affiche le texte de progression
	$(".actionPluginProgressText").hide();
	$(".actionPluginProgressText[data-id=" + i + "]").show();

	// Requête ajax
	$.ajax({
		type: "POST",
		url: "<?php echo helper::baseUrl(false); ?>?plugins/actionSteps/<?php echo ($module->actionType).'/'.($module->targetPluginId); ?>",
		data: {
			step: i,
			data: data
		},
		// Succès de la requête
		success: function(result) {                    
			setTimeout(function() {
				// Succès
				if(result.success === true) {
					// Fin de l'action
					if(i === <?php echo $nbSteps; ?>) {
						// Affiche le message de succès
						$("#actionPluginSuccess").show();
						// Déverrouille le bouton "Terminer"
						$("#actionPluginEnd").removeClass("disabled");
						// Cache le texte de progression
						$("#actionPluginProgress").hide();
					}
					// Prochaine étape
					else {
						step(i + 1, result.data);
					}
				}
				// Échec
				else {
					// Affiche le message d'erreur
                                        $("#actionPluginErrorStep").text(i);
                                        if(result.data != undefined){
                                            $("#actionPluginDetailErrorStep").text(result.data);
                                        }                                        
					$("#actionPluginError").show();
					// Déverrouille le bouton "Terminer"
					$("#actionPluginEnd").removeClass("disabled");
					// Cache le texte de progression
					$("#actionPluginProgress").hide();
					// Affiche le résultat dans la console
					console.error(result);
				}
			}, 2000);
		},
		// Échec de la requête
		error: function(xhr) {
			// Affiche le message d'erreur
			$("#actionPluginErrorStep").text(-1);
                        $("#actionPluginDetailErrorStep").text("Échec de la requête Ajax");
			$("#actionPluginError").show();
			// Déverrouille le bouton "Terminer"
			$("#actionPluginEnd").removeClass("disabled");
			// Cache le texte de progression
			$("#actionPluginProgress").hide();
			// Affiche l'erreur dans la console
			console.error(xhr);
		}
	});
}
$(window).on("load", step(1, null));
