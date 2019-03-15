/**
 * Initialisation de Tippy
 */
$(document).ready(function() {
    // Toute les infobulles auront une flèche
    tippy.setDefaults({
        arrow: true,
    });
    
    // Pour les infobulles d'aide, le texte est positionné à droite
    tippy(".helpButton", {
        placement: "right"
    });

    // Pour les images map, pas de flèche, bulle haut suivant le curseur
    tippy("#image-map", {
        placement: "top",
        followCursor: true
    });


    // afficher les infobules si l'attribut data-tippy-content est présent
    tippy('[data-tippy-content]');
});
