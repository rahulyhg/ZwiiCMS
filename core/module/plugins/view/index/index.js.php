/**
 * This file is part of Zwii.
 *
 * For full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 *
 * @author JBR69
 * @copyright Copyright (C) 2008-2018, 
 * @license GNU General Public License, version 3
 * @link http://zwiicms.com/
 */

/**
 * Confirmation de suppression
 */
$(".pluginDelete").on("click", function() {
	var _this = $(this);
	return core.confirm("Êtes-vous sûr de vouloir supprimer définitivement ce plugin ?", function() {
		$(location).attr("href", _this.attr("href"));
	});
});