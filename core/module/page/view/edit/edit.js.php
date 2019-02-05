/**
 * This file is part of Zwii.
 *
 * For full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 *
 * @author Rémi Jean <remi.jean@outlook.com>
 * @copyright Copyright (C) 2008-2018, Rémi Jean
 * @license GNU General Public License, version 3
 * @link http://zwiicms.com/
 */

/**
 * Confirmation de suppression
 */
$("#pageEditDelete").on("click", function() {
	var _this = $(this);
	return core.confirm("Êtes-vous sûr de vouloir supprimer cette page ?", function() {
		$(location).attr("href", _this.attr("href"));
	});
});

/**
 * Bloque/Débloque le bouton de configuration au changement de module
 * Affiche ou masque la position du module selon le call_user_func
 */
var pageEditModuleIdDOM = $("#pageEditModuleId");
pageEditModuleIdDOM.on("change", function() {
	if($(this).val() === "") {
		$("#pageEditModuleConfig").addClass("disabled");
		$("#pageEditContentContainer").slideDown();		 
	}
	else {
		$("#pageEditModuleConfig").removeClass("disabled");
		$("#pageEditContentContainer").slideUp();	
	}
});

/**
 * Masquer et affiche le contenu pour les modules form et gallery
 */
var pageEditModuleIdDOM = $("#pageEditModuleId");
pageEditModuleIdDOM.on("change", function() {
	if($(this).val() === "form" ||
	   $(this).val() === "gallery") {
		$("#configModulePositionWrapper").addClass("disabled");
		$("#configModulePositionWrapper").slideDown();	
	}
	else {
		$("#configModulePositionWrapper").removeClass("disabled");
 		$("#configModulePositionWrapper").slideUp();			
	}
});


/**
 * Masquer et démasquer le contenu pour les modules code et redirection
 */
var pageEditModuleIdDOM = $("#pageEditModuleId");
pageEditModuleIdDOM.on("change", function() {
	if($(this).val() === "code" ||
	   $(this).val() === "redirection") {
		$("#pageEditContentWrapper").removeClass("disabled");
		$("#pageEditContentWrapper").slideUp();
	}
	else {
		$("#pageEditContentWrapper").addClass("disabled");
		$("#pageEditContentWrapper").slideDown();		
	}
});


/**
 * Masquer et démasquer le masquage du titre pour le module redirection
 */
var pageEditModuleIdDOM = $("#pageEditModuleId");
pageEditModuleIdDOM.on("change", function() {
	if($(this).val() === "redirection" ||
	   $(this).val() === "code") {
		$("#pageEditHideTitleWrapper").removeClass("disabled");
		$("#pageEditHideTitleWrapper").slideUp();	
	}
	else {	
		$("#pageEditHideTitleWrapper").addClass("disabled");
		$("#pageEditHideTitleWrapper").slideDown();
	}
});


 
var pageEditBlockDOM = $("#pageEditBlock");
pageEditBlockDOM.on("change", function() {
	switch ($(this).val()) {
		case "bar":						
		case "12":
			$("#pageEditBarLeftWrapper").removeClass("disabled");
			$("#pageEditBarLeftWrapper").slideUp();
			$("#pageEditBarRightWrapper").removeClass("disabled");
			$("#pageEditBarRightWrapper").slideUp();				
			break;
		case "3-9":
		case "4-8":
			$("#pageEditBarLeftWrapper").addClass("disabled");
			$("#pageEditBarLeftWrapper").slideDown();
			$("#pageEditBarRightWrapper").removeClass("disabled");
			$("#pageEditBarRightWrapper").slideUp();					
			break;
		case "9-3":
		case "8-4":
			$("#pageEditBarLeftWrapper").removeClass("disabled");
			$("#pageEditBarLeftWrapper").slideUp();	
			$("#pageEditBarRightWrapper").addClass("disabled");
			$("#pageEditBarRightWrapper").slideDown();				
			break;
		case "3-6-3":
			$("#pageEditBarLeftWrapper").addClass("disabled");
			$("#pageEditBarLeftWrapper").slideDown();
			$("#pageEditBarRightWrapper").addClass("disabled");
			$("#pageEditBarRightWrapper").slideDown();				
			break;	
	}
	if ($(this).val() === "bar") {
			$("#pageEditPositionWrapper").removeClass("disabled");
			$("#pageEditPositionWrapper").slideUp();
			$("#pageEditTargetBlank").removeClass("disabled");
			$("#pageEditTargetBlank").slideUp();
			$("#pageDisableWrapper").removeClass("disabled");
			$("#pageDisableWrapper").slideUp();	
			$("#pageEditTargetBlankWrapper").removeClass("disabled");
			$("#pageEditTargetBlankWrapper").slideUp();
	} else {
			$("#pageEditPositionWrapper").addClass("disabled");
			$("#pageEditPositionWrapper").slideDown();
			$("#pageEditTargetBlank").addClass("disabled");
			$("#pageEditTargetBlank").slideDown();
			$("#pageDisableWrapper").addClass("disabled");
			$("#pageDisableWrapper").slideDown();	
			$("#pageEditTargetBlankWrapper").addClass("disabled");
			$("#pageEditTargetBlankWrapper").slideDown();
	}	
});

	
/**
 * Masquer ou afficher le chemin de fer
 */

var pageEditHideTitleDOM = $("#pageEditHideTitle");
pageEditHideTitleDOM.on("change", function() {
	if ($(this).is(':checked')) {
			$("#pageEditIncludeParentWrapper").removeClass("disabled");
			$("#pageEditIncludeParentWrapper").slideUp();
	} else {
			$("#pageEditIncludeParentWrapper").addClass("disabled");
			$("#pageEditIncludeParentWrapper").slideDown();		
	}
});
var pageEditParentPageIdDOM = $("#pageEditParentPageId");
pageEditParentPageIdDOM.on("change", function() {
	if ($(this).val() === "") {
		console.log('true');
			$("#pageEditIncludeParentWrapper").removeClass("disabled");
			$("#pageEditIncludeParentWrapper").slideUp();
	} else {
		console.log('faux');
			$("#pageEditIncludeParentWrapper").addClass("disabled");
			$("#pageEditIncludeParentWrapper").slideDown();		
	}
});




/**
 * Soumission du formulaire pour éditer le module
 */
$("#pageEditModuleConfig").on("click", function() {
	$("#pageEditModuleRedirect").val(1);
	$("#pageEditForm").trigger("submit");
});

/**
 * Affiche les pages en fonction de la page parent dans le choix de la position
 */
var hierarchy = <?php echo json_encode($this->getHierarchy()); ?>;
var pages = <?php echo json_encode($this->getData(['page'])); ?>;
$("#pageEditParentPageId").on("change", function() {
	var positionDOM = $("#pageEditPosition");
	positionDOM.empty().append(
		$("<option>").val(0).text("Ne pas afficher"),
		$("<option>").val(1).text("Au début")
	);
	var parentSelected = $(this).val();
	var positionSelected = 0;
	var positionPrevious = 1;
	// Aucune page parent selectionnée
	if(parentSelected === "") {
		// Liste des pages sans parents
		for(var key in hierarchy) {
			if(hierarchy.hasOwnProperty(key)) {
				// Sélectionne la page avant si il s'agit de la page courante
				if(key === "<?php echo $this->getUrl(2); ?>") {
					positionSelected = positionPrevious;
				}
				// Sinon ajoute la page à la liste
				else {
					// Enregistre la position de cette page afin de la sélectionner si la prochaine page de la liste est la page courante
					positionPrevious++;
					// Ajout à la liste
					positionDOM.append(
						$("<option>").val(positionPrevious).text("Après \"" + pages[key].title + "\"")
					);
				}
			}
		}
	}
	// Un page parent est selectionnée
	else {
		// Liste des pages enfants de la page parent
		for(var i = 0; i < hierarchy[parentSelected].length; i++) {
			// Pour page courante sélectionne la page précédente (pas de - 1 à positionSelected à cause des options par défaut)
			if(hierarchy[parentSelected][i] === "<?php echo $this->getUrl(2); ?>") {
				positionSelected = positionPrevious;
			}
			// Sinon ajoute la page à la liste
			else {
				// Enregistre la position de cette page afin de la sélectionner si la prochaine page de la liste est la page courante
				positionPrevious++;
				// Ajout à la liste
				positionDOM.append(
					$("<option>").val(positionPrevious).text("Après \"" + pages[hierarchy[parentSelected][i]].title + "\"")
				);
			}
		}
	}
	// Sélectionne la bonne position
	positionDOM.val(positionSelected);
}).trigger("change");