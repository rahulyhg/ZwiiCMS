<div class="row">
    <div class="col2">
        <?php echo template::button('pluginBack', [
                'class' => 'buttonGrey',
                'href' => helper::baseUrl(false),
                'ico' => 'home',
                'value' => 'Accueil'
        ]); ?>
    </div>
    <div class="col2 offset8">
        <?php echo template::button('pluginAdd', [
                'href' => helper::baseUrl() . 'plugins/add',
                'ico' => 'plus',
                'value' => 'Plugin'
        ]); ?>
    </div>
</div>
<?php echo template::table([3, 4, 1, 1, 1, 1], $module->ihmPlugins, ['Nom', 'Description', 'Version', 'Statut', '', '']); ?>
