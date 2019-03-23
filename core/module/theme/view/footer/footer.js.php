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
 * @Author 23/9/18 Frédéric Tempez <frederic.tempez@outlook.com>
 */

/**
 * Aperçu en direct
 */
$("input, select").on("change", function() {
	// Import des polices de caractères
	var footerFont = $("#themeFooterFont").val();
	var css = "@import url('https://fonts.googleapis.com/css?family=" + footerFont + "');";	
	// Couleurs du pied de page
	var colors = core.colorVariants($("#themeFooterBackgroundColor").val());
	var textColor = $("#themeFooterTextColor").val();
	var css = "footer{background-color:" + colors.normal + ";color:" + textColor + "}";
	css += "footer a{color:" + textColor + "}";
	// Hauteur du pied de page
	css += "footer .container > div{margin:" + $("#themeFooterHeight").val() + " 0}";
	//css += "footer .container > div{padding:0}";
	css += "footer .container-large > div{margin:" + $("#themeFooterHeight").val() + " 0}";
	//css += "footer .container-large > div{padding:0}";
	// Alignement du contenu
	css += "#footerSocials{text-align:" + $("#themeFooterSocialsAlign").val() + "}";
	css += "#footerText{text-align:" + $("#themeFooterTextAlign").val() + "}";
	css += "#footerCopyright{text-align:" + $("#themeFooterCopyrightAlign").val() + "}";
	// Taille, couleur, épaisseur et capitalisation du titre de la bannière
	css += "footer span{color:" + $("#themeFooterTextColor").val() + ";font-family:'" + footerFont.replace(/\+/g, " ") + "',sans-serif;font-weight:" + $("#themeFooterFontWeight").val() + ";font-size:" + $("#themeFooterFontSize").val() + ";text-transform:" + $("#themeFooterTextTransform").val() + "}";
	// Marge
	if($("#themeFooterMargin").is(":checked")) {
		css += 'footer{margin:0 20px 20px}';
	}
	else {
		css += 'footer{margin:0}';
	}
	// Ajout du css au DOM
	$("#themePreview").remove();
	$("<style>")
		.attr("type", "text/css")
		.attr("id", "themePreview")
		.text(css)
		.appendTo("footer");
	// Position du pied de page
	switch($("#themeFooterPosition").val()) {
		case 'hide':
			$("footer").hide();
			break;
		case 'site':
			$("footer").show().appendTo("#site");
			break;
		case 'body':
			$("footer").show().appendTo("body");
			break;
	}
});

// Position dans les blocs
// Bloc texte personnalisé
$("#themeFooterForm").on("change",function() {
	switch($("#themeFooterTextPosition").val()) {
			case 'hide':
				$("#footerText").hide();
				break;
			case 'left':
				$("#footerText").show().appendTo("#footerbodyLeft");
				$("#footerText").show().appendTo("#footersiteLeft");
				break;
			case 'center':
				$("#footerText").show().appendTo("#footerbodyCenter");
				$("#footerText").show().appendTo("#footersiteCenter");
				break;
			case 'right':
				$("#footerText").show().appendTo("#footerbodyRight");
				$("#footerText").show().appendTo("#footersiteRight");
				break;
	}
	switch($("#themeFooterSocialsPosition").val()) {
			case 'hide':
				$("#footerSocials").hide();
				break;
			case 'left':
				$("#footerSocials").show().appendTo("#footerbodyLeft");
				$("#footerSocials").show().appendTo("#footersiteLeft");
				break;
			case 'center':
				$("#footerSocials").show().appendTo("#footerbodyCenter");
				$("#footerSocials").show().appendTo("#footersiteCenter");
				break;
			case 'right':
				$("#footerSocials").show().appendTo("#footerbodyRight");
				$("#footerSocials").show().appendTo("#footersiteRight");
				break;
	}
		switch($("#themeFooterCopyrightPosition").val()) {
			case 'hide':
				$("#footerCopyright").hide();
				break;
			case 'left':
				$("#footerCopyright").show().appendTo("#footerbodyLeft");
				$("#footerCopyright").show().appendTo("#footersiteLeft");
				break;
			case 'center':
				$("#footerCopyright").show().appendTo("#footerbodyCenter");
				$("#footerCopyright").show().appendTo("#footersiteCenter");
				break;
			case 'right':
				$("#footerCopyright").show().appendTo("#footerbodyRight");
				$("#footerCopyright").show().appendTo("#footersiteRight");
				break;
	}
}).trigger("change");
// Fin Position dans les blocs




// Lien de connexion
$("#themeFooterLoginLink").on("change", function() {
	if($(this).is(":checked")) {
		$("#footerLoginLink").show();
	}
	else {
		$("#footerLoginLink").hide();
	}
}).trigger("change");

// Aperçu du texte
$("#themeFooterText").on("change keydown keyup", function() {
	$("#footerText").html($(this).val());
});

// Affiche / Cache les options de la position
$("#themeFooterPosition").on("change", function() {
	if($(this).val() === 'site') {
		$("#themeFooterPositionOptions").slideDown();
	}
	else {
		$("#themeFooterPositionOptions").slideUp(function() {
			$("#themeFooterMargin").prop("checked", false).trigger("change");
		});
	}
}).trigger("change");