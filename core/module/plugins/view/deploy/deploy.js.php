/**
 * Exécution des différentes étapes de deploy du plugin
 */
function step(i, data) {
	// Affiche le texte de progression
	$(".deployPluginProgressText").hide();
	$(".deployPluginProgressText[data-id=" + i + "]").show();
                
	// Requête ajax
	$.ajax({
		type: "POST",
		url: "<?php echo helper::baseUrl(false); ?>?plugins/deploySteps/<?php echo $module->targetPluginId;?>",
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
					if(i === 5) {
						// Affiche le message de succès
						$("#deployPluginSuccess").show();
						// Déverrouille le bouton "Terminer"
						$("#deployPluginEnd").removeClass("disabled");
						// Cache le texte de progression
						$("#deployPluginProgress").hide();
					}
					// Prochaine étape
					else {
						step(i + 1, result.data);
					}
				}
				// Échec
				else {
					// Affiche le message d'erreur
                                        $("#deployPluginErrorStep").text(i);
                                        if(result.data != undefined){
                                            $("#deployPluginDetailErrorStep").text(result.data);
                                        }                                        
					$("#deployPluginError").show();
					// Déverrouille le bouton "Terminer"
					$("#deployPluginEnd").removeClass("disabled");
					// Cache le texte de progression
					$("#deployPluginProgress").hide();
					// Affiche le résultat dans la console
					console.error(result);
				}
			}, 2000);
		},
		// Échec de la requête
		error: function(xhr) {
			// Affiche le message d'erreur
			$("#deployPluginErrorStep").text(-1);  
                        $("#deployPluginDetailErrorStep").text("Échec de la requête Ajax");
			$("#deployPluginError").show();
			// Déverrouille le bouton "Terminer"
			$("#deployPluginEnd").removeClass("disabled");
			// Cache le texte de progression
			$("#deployPluginProgress").hide();
			// Affiche l'erreur dans la console
			console.error(xhr);
		}
	});
}
$(window).on("load", step(1, null));
