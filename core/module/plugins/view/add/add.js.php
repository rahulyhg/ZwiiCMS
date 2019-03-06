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

$(document).ready(function() {
    if($("#directUploadButton")){
        $("#directUploadButton")
            .click(function() {
                $('#directUpload').trigger('click');
            });
    }

    if($("#directUpload")){
        $("#directUpload")
            .change(function() {
                uploadFile();
            });
    }
});

function uploadFile() {
    var form = $('form').get(0);
    var formData = new FormData(form);// get the form data

    $.ajax({
        type: "POST",
        url: "<?php echo helper::baseUrl(false); ?>?plugins/upload",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,
        beforeSend: function() {
            if($("#directUploadButton")) $("#directUploadButton").append('<span id="uploadSpinner">&nbsp;&nbsp;<?php echo template::ico('spinner', '', true); ?></span>');
        },
        success: function(result) {
            if($("#uploadSpinner")) $("#uploadSpinner").remove();
            if(result){
                if(result.success == false){
                    location.href="<?php echo helper::baseUrl(false); ?>?plugins/add";
                } else {
                    location.href="<?php echo helper::baseUrl(false); ?>?plugins/action/upload/"+result.data;
                }
            }
        },
        error: function(xhr, status){
            if($("#uploadSpinner")) $("#uploadSpinner").remove();
            location.href="<?php echo helper::baseUrl(false); ?>?plugins/add";
        }
    });
}