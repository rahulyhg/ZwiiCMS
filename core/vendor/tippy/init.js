/**
 * Initialisation de Tippy
 */
$(document).ready(function() {
    // Toute les infobulles auront une flèche
    tippy.setDefaults({
        arrow: true,
    });
    
    // Pour les infobulles d'aide, le text est positionné à droite
    tippy(".helpButton", {
        placement: "right"
    });

    // afficher les infobules si l'attribut data-tippy-content est présent
    tippy('[data-tippy-content]');
});
