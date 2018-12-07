/**
 * Exécution des différentes étapes d'activation du plugin
 */
function step(i, data) {
	// Affiche le texte de progression
	$(".activatePluginProgressText").hide();
	$(".activatePluginProgressText[data-id=" + i + "]").show();
        
	// Requête ajax
	$.ajax({
		type: "POST",
		url: "<?php echo helper::baseUrl(false); ?>?plugins/activateSteps/<?php echo $module->targetPluginId;?>",
		data: {
			step: i,
			data: data
		},
		// Succès de la requête
		success: function(result) {                    
			setTimeout(function() {
				// Succès
				if(result.success === true) {
					// Fin du deploy
					if(i === 4) {
						// Affiche le message de succès
						$("#activatePluginSuccess").show();
						// Déverrouille le bouton "Terminer"
						$("#activatePluginEnd").removeClass("disabled");
						// Cache le texte de progression
						$("#activatePluginProgress").hide();
					}
					// Prochaine étape
					else {
						step(i + 1, result.data);
					}
				}
				// Échec
				else {
					// Affiche le message d'erreur
                                        $("#activatePluginErrorStep").text(i);
                                        if(result.data != undefined){
                                            $("#activatePluginDetailErrorStep").text(result.data);
                                        }                                        
					$("#activatePluginError").show();
					// Déverrouille le bouton "Terminer"
					$("#activatePluginEnd").removeClass("disabled");
					// Cache le texte de progression
					$("#activatePluginProgress").hide();
					// Affiche le résultat dans la console
					console.error(result);
				}
			}, 2000);
		},
		// Échec de la requête
		error: function(xhr) {
			// Affiche le message d'erreur
			$("#activatePluginErrorStep").text(-1);  
                        $("#activatePluginDetailErrorStep").text("Échec de la requête Ajax");
			$("#activatePluginError").show();
			// Déverrouille le bouton "Terminer"
			$("#activatePluginEnd").removeClass("disabled");
			// Cache le texte de progression
			$("#activatePluginProgress").hide();
			// Affiche l'erreur dans la console
			console.error(xhr);
		}
	});
}
$(window).on("load", step(1, null));
