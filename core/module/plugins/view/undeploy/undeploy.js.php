/**
 * Exécution des différentes étapes du undeploy du plugin
 */
function step(i, data) {
	// Affiche le texte de progression
	$(".undeployPluginProgressText").hide();
	$(".undeployPluginProgressText[data-id=" + i + "]").show();
        
	// Requête ajax
	$.ajax({
		type: "POST",
		url: "<?php echo helper::baseUrl(false); ?>?plugins/undeploySteps/<?php echo $module->targetPluginId;?>",
		data: {
			step: i,
			data: data
		},
		// Succès de la requête
		success: function(result) {                    
			setTimeout(function() {
				// Succès
				if(result.success === true) {
					// Fin de l'undeploy
					if(i === 4) {
						// Affiche le message de succès
						$("#undeployPluginSuccess").show();
						// Déverrouille le bouton "Terminer"
						$("#undeployPluginEnd").removeClass("disabled");
						// Cache le texte de progression
						$("#undeployPluginProgress").hide();
					}
					// Prochaine étape
					else {
						step(i + 1, result.data);
					}
				}
				// Échec
				else {
					// Affiche le message d'erreur
                                        $("#undeployPluginErrorStep").text(i);
                                        if(result.data != undefined){
                                            $("#undeployPluginDetailErrorStep").text(result.data);
                                        }                                        
					$("#undeployPluginError").show();
					// Déverrouille le bouton "Terminer"
					$("#undeployPluginEnd").removeClass("disabled");
					// Cache le texte de progression
					$("#undeployPluginProgress").hide();
					// Affiche le résultat dans la console
					console.error(result);
				}
			}, 2000);
		},
		// Échec de la requête
		error: function(xhr) {
			// Affiche le message d'erreur
			$("#undeployPluginErrorStep").text(-1);  
                        $("#undeployPluginDetailErrorStep").text("Échec de la requête Ajax");
			$("#undeployPluginError").show();
			// Déverrouille le bouton "Terminer"
			$("#undeployPluginEnd").removeClass("disabled");
			// Cache le texte de progression
			$("#undeployPluginProgress").hide();
			// Affiche l'erreur dans la console
			console.error(xhr);
		}
	});
}
$(window).on("load", step(1, null));
