<div class="row">
    <div class="col2">
        <?php echo template::button('pluginAddBack', [
            'class' => 'buttonGrey',
            'href' => helper::baseUrl() . 'pluginManager',
            'ico' => 'caret-left',
            'value' => 'Retour'
        ]); ?>
    </div>
    <div class="col2 offset8">
        <?php echo template::formOpen('directUploadForm'); ?>
            <?php echo template::button('directUploadButton', [
                'ico' => 'plus',
                'value' => 'Archive locale',
                'help'  => 'Uploader une archive pour déployer directement un plugin.'
            ]); ?>
            <input type="file" style="display:none;" id="directUpload" name="directUpload" size="1048576"> <!--max 1048576 octets = 1 Mo-->
        <?php echo template::formClose(); ?>
    </div>
</div>
<?php echo template::table([1, 1, 5, 1, 1], $module->notDeployedPlugins, ['Nom', 'Auteur', 'Description', 'Version', '']); ?>
