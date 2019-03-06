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
$(".formDataDelete").on("click", function() {
	var _this = $(this);
	return core.confirm("Êtes-vous sûr de vouloir supprimer cette donnée ?", function() {
		$(location).attr("href", _this.attr("href"));
	});
});

/**
 * Confirmation de suppression de toutes les donénes
 */
$(".formDataDeleteAll").on("click", function() {
	var _this = $(this);
	return core.confirm("Êtes-vous sûr de vouloir supprimer toutes les données ?", function() {
		$(location).attr("href", _this.attr("href"));
	});
});