/**
 * Initialisation de Tippy
 */
$(document).ready(function() {
    var el = document.getElementById("foo"); 
    
	// Tooltip des aides
	tippy(".helpButton", {
		arrow: true,
		placement: "right",
        content(reference) {            
            return reference.title;
        }
	});
	// Tooltip des attributs title
	tippy("[title]", {
		arrow: true,
        content(reference) {            
            return reference.title;
        }
	});
});