	// Paramètres d'initialisation
	$(document).ready(function() {
			// Ajouter la classe Gallery afin de faire la liaison avec simplelightbox


		$("a[rel='gallery']").addClass(
			"gallery",""
		);
		$('.gallery').simpleLightbox({closeText:"&times;",captionsData:'alt'});
	});