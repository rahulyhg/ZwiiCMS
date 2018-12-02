<div class="row">
        <div class="col2">
                <?php echo template::button('pluginAddBack', [
                        'class' => 'buttonGrey',
                        'href' => helper::baseUrl() . 'plugins',
                        'ico' => 'left',
                        'value' => 'Retour'
                ]); ?>
        </div>
</div>

<?php echo template::table([1, 1, 5, 1, 1], $module->notDeployedPlugins, ['Nom', 'Auteur', 'Description', 'Version', '']); ?>
