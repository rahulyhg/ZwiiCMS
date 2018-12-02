<?php

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
class plugins extends common {

    public static $actions = [
        'add' => self::GROUP_ADMIN,
        'deploy' => self::GROUP_ADMIN,
        'deploySteps' => self::GROUP_ADMIN,
        'delete' => self::GROUP_ADMIN,
        'activate' => self::GROUP_ADMIN,
        'activateSteps' => self::GROUP_ADMIN,
        'undeploy' => self::GROUP_ADMIN,
        'undeploySteps' => self::GROUP_ADMIN,
        'index' => self::GROUP_ADMIN
    ];
    public $ihmPlugins = [];
    public $deployedPlugins = [];
    public $notDeployedPlugins = [];    
    public $targetPluginId;

    /**
     * Liste des plugins
     */
    public function index() {
        // récupérer la liste des plugins déployés
        $this->deployedPlugins = helper::arrayCollumn($this->getData(['plugins']), 'name');
        ksort($this->deployedPlugins);
        foreach ($this->deployedPlugins as $pluginId => $pluginName) {
            $status = $this->getData(['plugins', $pluginId, 'status']);
            switch ($status) {
                case self::PLUGIN_ERROR:
                    $statusText = template::label("", "En erreur", [
                                'class' => 'colorRed'
                    ]);
                    $specificAction = template::button('pluginsDeactivate' . $pluginId, [
                                'class' => 'userDelete buttonOrange',
                                'href' => helper::baseUrl() . 'plugins/undeploy/' . $pluginId,
                                'value' => template::ico('fa-power-off')
                    ]);
                    $deleteAction = "";
                    break;

                case self::PLUGIN_NOT_APPLICABLE:
                    //exclamation-triangle 
                    $statusText = template::label("", "Non applicable", [
                                'class' => 'colorGrey'
                    ]);
                    $specificAction = "";
                    
                    $deleteAction = template::button('pluginDelete' . $pluginId, [
                        'class' => 'pluginDelete buttonRed',
                        'href' => helper::baseUrl() . 'plugins/delete/' . $pluginId,
                        'value' => template::ico('cancel')
                    ]);
                    break;

                case self::PLUGIN_DEACTIVATE:
                    $statusText = template::label("", "Désactivé", [
                                'class' => 'colorOrange'
                    ]);
                    $specificAction = template::button('pluginsActivate' . $pluginId, [
                                'class' => 'userDelete buttonGreen',
                                'href' => helper::baseUrl() . 'plugins/activate/' . $pluginId,
                                'value' => template::ico('fa-power-off"')
                    ]);
                    $deleteAction = template::button('pluginDelete' . $pluginId, [
                        'class' => 'pluginDelete buttonRed',
                        'href' => helper::baseUrl() . 'plugins/delete/' . $pluginId,
                        'value' => template::ico('cancel')
                    ]);
                    break;

                case self::PLUGIN_ACTIVATE:
                    $statusText = template::label("", "Activé", [
                                'class' => 'colorGreen'
                    ]);
                    $specificAction = template::button('pluginsDeactivate' . $pluginId, [
                                'class' => 'userDelete buttonOrange',
                                'href' => helper::baseUrl() . 'plugins/undeploy/' . $pluginId,
                                'value' => template::ico('fa-power-off')
                    ]);
                    $deleteAction = "";
                    break;

                default :
                    $specificAction = " - ";
            }

            $this->ihmPlugins[] = [
                $pluginName,
                $this->getData(['plugins', $pluginId, 'description']),
                $this->getData(['plugins', $pluginId, 'version']),
                $statusText,
                $specificAction,
                $deleteAction
            ];
        }

        // Valeurs en sortie
        $this->addOutput([
            'title' => 'Bibliothèque de vos plugins',
            'view' => 'index'
        ]);
    }

    /**
     * Ajout
     */
    public function add() {

        // TODO - Récupération des plugins disponibles sur le partage et non encore déployés
        $this->notDeployedPlugins = array();

        // Valeurs en sortie
        $this->addOutput([
            'title' => 'Sélectionnez le plugin à ajouter à votre bibliothèque',
            'view' => 'add'
        ]);
    }

    /**
     * Suppression
     */
    public function delete() {
        // Accès refusé
        if (
        // Le plugin n'existe pas
                $this->getData(['plugins', $this->getUrl(2)]) === null
                // Groupe insuffisant
                AND ( $this->getUrl('group') < self::GROUP_ADMIN)
        ) {
            // Valeurs en sortie
            $this->addOutput([
                'access' => false
            ]);
        }
        // Suppression
        else {
            if (strlen($this->getUrl(2)) > 0){
                // Suppression en base du plugin
                $this->deleteData(['plugins', $this->getUrl(2)]);
            
                // Suppression des fichiers du plugin
                helper::rmdir_recursive('site/plugins/'.$this->getUrl(2));

                // Valeurs en sortie
                $this->addOutput([
                    'redirect' => helper::baseUrl() . 'plugins',
                    'notification' => 'Plugin supprimé',
                    'state' => true
                ]);
            } else {
                $this->addOutput([
                    'redirect' => helper::baseUrl() . 'plugins'                    
                ]);
            }
        }
    }

    /**
     * Déploiement
     */
    public function deploy() {
        $this->targetPluginId = $this->getUrl(2);
        // Valeurs en sortie
        $this->addOutput([
            'display' => self::DISPLAY_LAYOUT_LIGHT,
            'title' => 'Déploiement du plugin',
            'view' => 'deploy'
        ]);
    }

    /**
     * Étapes de déploiement
     */
    public function deploySteps() {
        $this->targetPluginId = $this->getUrl(2);
        if(strlen($this->targetPluginId) > 0){
            switch ($this->getInput('step', helper::FILTER_INT)) {
                // Préparation : suppression des fichiers
                case 1:
                    $success = true;

                    // Nettoyage des fichiers temporaires               
                    if (file_exists('site/tmp/'.$this->targetPluginId.'.tar.gz')) {
                        $success = unlink('site/tmp/'.$this->targetPluginId.'.tar.gz');
                    }
                    if (file_exists('site/tmp/'.$this->targetPluginId.'.tar')) {
                        $success = unlink('site/tmp/'.$this->targetPluginId.'.tar');
                    }

                    // Suppression du répertoire si existant
                    $dirPlugin = 'site/plugins/'.$this->targetPluginId;
                    if (file_exists($dirPlugin)) helper::rmdir_recursive($dirPlugin);
                    
                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => null
                        ]
                    ]);
                    break;

                // Téléchargement
                case 2:
                    $success = true;
                    $errorMsg = "";

                    // TODO - Téléchargement de l'archive du plugin depuis le serveur de Zwii
                    $urlPlugin = ""; // A DEFINIR
                    $success = (file_put_contents('site/tmp/'.$this->targetPluginId.'.tar.gz', file_get_contents($urlPlugin)) !== false);

                    if ($success) {
                        // Décompression
                        try {
                            // Décompression dans le dossier de plugins
                            $gz = new PharData('site/tmp/'.$this->targetPluginId.'.tar.gz');
                            $gz->decompress();
                            $tar = new PharData('site/tmp/'.$this->targetPluginId.'.tar');
                            $tar->extractTo('site/plugins/' . $this->targetPluginId . '/', null, true);
                        } catch (Exception $e) {
                            $errorMsg = $e->getMessage();
                            $success = false;
                        }
                    }


                    if ($success) {                        
                        // Vérifier que le plugin est bien constitué :
                        // 1- contient un fichier MANIFEST.json à la racine
                        if (!file_exists('site/plugins/'.$this->targetPluginId.'/MANIFEST.json')){
                            $success = false;
                            $errorMsg = "Fichier `MANIFEST.json` non trouvé";
                        }
                        // 2- contient un répertoire `deploy` avec un fichier `deploy.php`
                        if ($success && !file_exists('site/plugins/'.$this->targetPluginId.'/deploy/deploy.php')){
                            $success = false;
                            $errorMsg = "Fichier `deploy/deploy.php` non trouvé";
                        } 
                        
                        if($success){
                            $deployFile = file_get_contents('site/plugins/'.$this->targetPluginId.'/deploy/deploy.php');
                            
                            // a- le fichier `deploy.php` contient une fonction `checkBeforeDeploy` avec 3 paramètres passés par référence
                            $pattern = '/^[private|protected|public]*\s*function checkBeforeDeploy\(&\$.*, &\$.*, &\$.*\)/m';
                            if (preg_match($pattern, $deployFile) !== 1) {
                                $success = false;
                                $errorMsg = "[deploy/deploy.php] Fonction `checkBeforeDeploy` non présente ou non standard";                                                                
                            }
                            
                            if($success){
                                // b- le fichier `deploy.php` contient une fonction `deploy` avec 3 paramètres passés par référence
                                $pattern = '/^[private|protected|public]*\s*function deploy\(&\$.*, &\$.*, &\$.*\)/m';
                                if (preg_match($pattern, $deployFile) !== 1) {
                                    $success = false;
                                    $errorMsg = "[deploy/deploy.php] Fonction `deploy` non présente ou non standard";                                                                
                                }
                            }
                        }
                            
                        // 3- contient un répertoire `undeploy` avec un fichier `undeploy.php`
                        if ($success && !file_exists('site/plugins/'.$this->targetPluginId.'/undeploy/undeploy.php')){
                            $success = false;
                            $errorMsg = "Fichier `undeploy/undeploy.php` non trouvé";
                        }
                        if($success){
                            $undeployFile = file_get_contents('site/plugins/'.$this->targetPluginId.'/undeploy/undeploy.php');
                            
                            // a- le fichier `undeploy.php` contient une fonction `checkBeforeUndeploy` avec 3 paramètres passés par référence
                            $pattern = '/^[private|protected|public]*\s*function checkBeforeUndeploy\(&\$.*, &\$.*, &\$.*\)/m';
                            if (preg_match($pattern, $undeployFile) !== 1) {
                                $success = false;
                                $errorMsg = "[undeploy/undeploy.php] Fonction `checkBeforeUndeploy` non présente ou non standard";                                                                
                            }
                            
                            if($success){
                                // b- le fichier `undeploy.php` contient une fonction `undeploy` avec 3 paramètres passés par référence
                                $pattern = '/^[private|protected|public]*\s*function undeploy\(&\$.*, &\$.*, &\$.*\)/m';
                                if (preg_match($pattern, $undeployFile) !== 1) {
                                    $success = false;
                                    $errorMsg = "[undeploy/undeploy.php] Fonction `undeploy` non présente ou non standard";                                                                
                                }
                            }                            
                        }
                    }                    
                    
                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Contrôle
                case 3:                                
                    $errorMsg = "";
                    $success = $this->checkBefore($this->targetPluginId, 'deploy', $errorMsg);

                    if ($success) {                        
                        try {
                            // Lire le fichier MANIFEST.json
                            $manifest_json = file_get_contents('site/plugins/' . $this->targetPluginId . '/MANIFEST.json');
                            if(strlen($manifest_json) > 100){
                                $manifest_data = json_decode($manifest_json);

                                // Lire les infos dans le Json                    
                                $name = $manifest_data->plugin->name;
                                $author = $manifest_data->plugin->author;
                                $version = $manifest_data->plugin->version;
                                $version_date = $manifest_data->plugin->version_date;
                                $description = $manifest_data->plugin->description;
                                $zwiiVersion = $manifest_data->plugin->zwii_version;
                                $updaptedFiles = $manifest_data->plugin->updated_files;
                                $addedFiles = $manifest_data->plugin->added_files;
                                $updaptedDatas = $manifest_data->plugin->updated_datas;
                                $addedDatas = $manifest_data->plugin->added_datas;

                                // Ajout du plugin en base eavec status Désactivé
                                if ($this->getData(['plugins', $this->targetPluginId])) {
                                    $errorMsg = 'Un plugin avec l\'identifiant `' . $this->targetPluginId . '` existe déjà !';
                                    $success = false;
                                } else {
                                    $this->setData([
                                        'plugins',
                                        $this->targetPluginId,
                                        [
                                            'name' => $name,
                                            'author' => $author,
                                            'version' => $version,
                                            'version_date' => $version_date,
                                            'description' => $description,
                                            'zwii_version' => $zwiiVersion,
                                            'updated_files' => $updaptedFiles,
                                            'added_files' => $addedFiles,
                                            'updated_datas' => $updaptedDatas,
                                            'added_datas' => $addedDatas,
                                            'status' => self::PLUGIN_DEACTIVATE
                                        ]
                                    ]);
                                    $this->saveData();
                                }
                            } else {
                                $success = false;
                                $errorMsg = "Erreur dans le fichier MANIFEST.json";
                            }
                        } catch (Exception $e) {
                            $errorMsg = $e->getMessage();
                            $success = false;
                        }                      
                    }

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Sauvegarde
                case 4:                
                    $success = $this->backup($this->targetPluginId, "deploy");

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => null
                        ]
                    ]);
                    break;

                // Installation
                case 5:                
                    $errorMsg = "";
                    $success = $this->execute($this->targetPluginId, 'deploy', $errorMsg);

                    // Changement statut du plugin
                    if ($success) {
                        // --> Activé
                        $status = self::PLUGIN_ACTIVATE;
                    } else {
                        // --> Erreur
                        $status = self::PLUGIN_ERROR;
                    }
                    $this->changePluginStatus($this->targetPluginId, $status);

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;
            }
        } else {
            // Valeurs en sortie
            $this->addOutput([
                'display' => self::DISPLAY_JSON,
                'content' => [
                    'success' => false,
                    'data' => "Identifiant du plugin non indiqué"
                ]
            ]);
        }
    }

    /**
     * Undéploiement
     */
    public function undeploy() {
        $this->targetPluginId = $this->getUrl(2);
        // Valeurs en sortie
        $this->addOutput([
            'display' => self::DISPLAY_LAYOUT_LIGHT,
            'title' => 'Suppression du déploiement du plugin',
            'view' => 'undeploy'
        ]);
    }

    /**
     * Étapes de suppression du déploiement
     */
    public function undeploySteps() {
        $this->targetPluginId = $this->getUrl(2);
        if(strlen($this->targetPluginId) > 0){
            switch ($this->getInput('step', helper::FILTER_INT)) {
                // Contrôle
                case 1:
                    $errorMsg = "";
                    $success = $this->checkBefore($this->targetPluginId, 'undeploy', $errorMsg);

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Sauvegarde
                case 2:
                    $success = $this->backup($this->targetPluginId, "undeploy");

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => null
                        ]
                    ]);
                    break;

                // Undeploy
                case 3:
                    $errorMsg = "";
                    $success = $this->execute($this->targetPluginId, 'undeploy', $errorMsg);

                    // Changement statut du plugin
                    if ($success) {
                        // --> Désactivé
                        $status = self::PLUGIN_DEACTIVATE;
                    } else {
                        // --> Erreur
                        $status = self::PLUGIN_ERROR;
                    }                    
                    $this->changePluginStatus($this->targetPluginId, $status);

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;
            }
        } else {
            // Valeurs en sortie
            $this->addOutput([
                'display' => self::DISPLAY_JSON,
                'content' => [
                    'success' => false,
                    'data' => "Identifiant du plugin non indiqué"
                ]
            ]);
        }
    }

    /**
     * Activation plugin déjà téléchargé
     */
    public function activate() {
        $this->targetPluginId = $this->getUrl(2);
        // Valeurs en sortie
        $this->addOutput([
            'display' => self::DISPLAY_LAYOUT_LIGHT,
            'title' => 'Activation du plugin',
            'view' => 'activate'
        ]);
    }

    /**
     * Étapes de l'activation
     */
    public function activateSteps() {
        $this->targetPluginId = $this->getUrl(2);
        if(strlen($this->targetPluginId) > 0){
            switch ($this->getInput('step', helper::FILTER_INT)) {
                // Contrôle
                case 1:
                    $errorMsg = "";
                    $success = $this->checkBefore($this->targetPluginId, 'activate', $errorMsg);

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Sauvegarde
                case 2:
                    $success = $this->backup($this->targetPluginId, "activate");

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => null
                        ]
                    ]);
                    break;

                // Activation
                case 3:
                    $errorMsg = "";
                    $success = $this->execute($this->targetPluginId, 'activate', $errorMsg);

                    // Changement statut du plugin
                    if ($success) {
                        // --> Activé
                        $status = self::PLUGIN_ACTIVATE;
                    } else {
                        // --> Erreur
                        $status = self::PLUGIN_ERROR;
                    }
                    $this->changePluginStatus($this->targetPluginId, $status);

                    // Valeurs en sortie
                    $this->addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;
            }
        } else {
            // Valeurs en sortie
            $this->addOutput([
                'display' => self::DISPLAY_JSON,
                'content' => [
                    'success' => false,
                    'data' => "Identifiant du plugin non indiqué"
                ]
            ]);
        }
    }

    /* *********************************************************************** */
    /* Fonctions privées                                                       */
    /* *********************************************************************** */

    /*
     * Function d'appel des contrôles à effectuer pour les actions du plugin
     */
    private function checkBefore($pluginId, $actionType, &$errorMsg) {
        $success = true;

        if ($actionType === 'activate') $actionType = 'deploy'; // dans le cas de l'activation, même contôler que pour 'deploy'

        include_once 'site/plugins/' . $pluginId . '/' . $actionType . '/' . $actionType . '.php';
        call_user_func_array('checkBefore' . ucfirst($actionType), array(&$this, &$success, &$errorMsg));

        return $success;
    }

    /*
     * Function d'appel des actions à effectuer pour le plugin
     */
    private function execute($pluginId, $actionType, &$errorMsg) {
        $success = true;

        if ($actionType === 'activate') $actionType = 'deploy';   // dans le cas de l'activation, même actions que pour 'deploy'

        include_once 'site/plugins/' . $pluginId . '/' . $actionType . '/' . $actionType . '.php';
        call_user_func_array($actionType, array(&$this, &$success, &$errorMsg));

        return $success;
    }

    /*
     * Fonction de sauvegarde des données et des fichiers modifiés
     */
    private function backup($pluginId, $actionType) {
        // Copie du fichier de données
        $success = copy('site/data/data.json', 'site/backup/' . $pluginId . '_' . date('Y-m-d', time()) . '_' . $actionType . '.json');
        
        // TODO - Effectuer une sauvegarde des fichiers qui vont être modifiés

        return $success;
    }

    /*
     * Fonction de changement d'état d'un plugin
     */
    private function changePluginStatus($pluginId, $newStatus) {
        $this->setData([
            'plugins',
            $pluginId,
            [
                'name' => $this->getData(['plugins', $pluginId, 'name']),
                'author' => $this->getData(['plugins', $pluginId, 'author']),
                'version' => $this->getData(['plugins', $pluginId, 'version']),
                'version_date' => $this->getData(['plugins', $pluginId, 'version_date']),
                'description' => $this->getData(['plugins', $pluginId, 'description']),                                
                'zwii_version' => $this->getData(['plugins', $pluginId, 'zwii_version']),
                'updated_files' => $this->getData(['plugins', $pluginId, 'updated_files']),
                'added_files' => $this->getData(['plugins', $pluginId, 'added_files']),
                'updated_datas' => $this->getData(['plugins', $pluginId, 'updated_datas']),
                'added_datas' => $this->getData(['plugins', $pluginId, 'added_datas']),
                'status' => $newStatus
            ]
        ]);
        
        $this->saveData();
    }

}
