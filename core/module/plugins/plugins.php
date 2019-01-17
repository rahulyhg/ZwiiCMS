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
// Inclusion de la classe spécifique à la gestion des plugins
require_once 'core/core-plugins.php';

class plugins extends common {

    public static $actions = [
        'add' => self::GROUP_ADMIN,
        'action' => self::GROUP_ADMIN,
        'actionSteps' => self::GROUP_ADMIN,
        'delete' => self::GROUP_ADMIN,
        'upload' => self::GROUP_ADMIN,
        'index' => self::GROUP_ADMIN
    ];
    public $ihmPlugins = [];
    public $notDeployedPlugins = [];
    public $actionType = "";
    public $targetPluginId = "";

    /**
     * Liste des plugins
     */
    public function index() {
        // Si le répertoire plugin n'existe pas, le créer
        if (!file_exists(CorePlugins::PLUGIN_DIR))
            mkdir(CorePlugins::PLUGIN_DIR, 0755, true);

        // récupérer la liste des plugins déployés
        $deployedPlugins = helper::arrayColumn(self::getData(['plugins']), 'name', 'KEY_SORT_ASC');
        foreach ($deployedPlugins as $pluginId => $pluginName) {
            $status = self::getData(['plugins', $pluginId, 'status']);
            switch ($status) {
                case CorePlugins::ON_ERROR:
                    $statusText = template::label("", "En erreur", [
                                'class' => 'colorRed'
                    ]);
                    $specificAction = template::button('pluginsDeactivate' . $pluginId, [
                                'class' => 'userDelete buttonOrange',
                                'href' => helper::baseUrl() . 'plugins/action/undeploy/' . $pluginId,
                                'value' => template::ico('power-off')
                    ]);
                    $deleteAction = template::button('pluginDelete' . $pluginId, [
                                'class' => 'pluginDelete buttonRed',
                                'href' => helper::baseUrl() . 'plugins/delete/' . $pluginId,
                                'value' => template::ico('times')
                    ]);
                    break;

                case CorePlugins::IS_NOT_APPLICABLE:
                    $statusText = template::label("", "Non applicable", [
                                'class' => 'colorGrey'
                    ]);
                    $specificAction = "";

                    $deleteAction = template::button('pluginDelete' . $pluginId, [
                                'class' => 'pluginDelete buttonRed',
                                'href' => helper::baseUrl() . 'plugins/delete/' . $pluginId,
                                'value' => template::ico('times')
                    ]);
                    break;

                case CorePlugins::IS_DEACTIVATE:
                    $statusText = template::label("", "Désinstallé", [
                                'class' => 'colorOrange'
                    ]);
                    $specificAction = template::button('pluginsActivate' . $pluginId, [
                                'class' => 'userDelete buttonGreen',
                                'href' => helper::baseUrl() . 'plugins/action/activate/' . $pluginId,
                                'value' => template::ico('power-off"')
                    ]);
                    $deleteAction = template::button('pluginDelete' . $pluginId, [
                                'class' => 'pluginDelete buttonRed',
                                'href' => helper::baseUrl() . 'plugins/delete/' . $pluginId,
                                'value' => template::ico('times')
                    ]);
                    break;

                case CorePlugins::IS_ACTIVATE:
                    $statusText = template::label("", "Installé", [
                                'class' => 'colorGreen'
                    ]);
                    $specificAction = template::button('pluginsDeactivate' . $pluginId, [
                                'class' => 'userDelete buttonOrange',
                                'href' => helper::baseUrl() . 'plugins/action/undeploy/' . $pluginId,
                                'value' => template::ico('power-off')
                    ]);
                    $deleteAction = "";
                    break;

                default :
                    $specificAction = " - ";
            }

            $this->ihmPlugins[] = [
                $pluginName,
                self::getData(['plugins', $pluginId, 'description']),
                self::getData(['plugins', $pluginId, 'version']),
                $statusText,
                $specificAction,
                $deleteAction
            ];
        }

        // Valeurs en sortie
        self::addOutput([
            'title' => 'Plugins',
            'view' => 'index'
        ]);
    }

    /**
     * Ajout
     */
    public function add() {
        // TODO - Récupération des plugins disponibles sur le partage et non encore déployés
        // solution envisagée, Pouvoir interroger le serveur (via une api) pour avoir la liste des plugins disponibles
        $sharedPlugins = array();
        /*
          $url = 'http://forum.zwiicms.com/index.php?/files/files.xml';
          //$pluginsList = file_get_contents($url);
          $items = simplexml_load_file($url);

          foreach ($items->channel->item as $item) {
          array_push($sharedPlugins,
          array(
          'id' => (string) $item->guid,
          'name' => (string) $item->title,
          'desc' => (string) $item->description,
          'link' => (string) $item->link
          )
          );
          }
         */

        foreach ($sharedPlugins as $plugin) {
            // TODO - Récupération des informations du plugin
            // Pour les tests
            /*
              $pluginName = $plugin["name"];
              $pluginId = $plugin["id"];
              $auteur = "PeterRabbit";
              $desc = $plugin["link"];
              $ver = "1.0.0";

              $origin = 'official';
              if($origin == 'official'){
              $ico = template::ico('award', '', false, '1em', 'colorGreen');
              } else {
              $ico = template::ico('blind', '', false, '1em', 'colorOrange');
              }
             */

            // Construction de la liste des plugins disponibles
            if (!self::getData(['plugins', $pluginId])) {
                array_push($this->notDeployedPlugins, array(
                    $ico . " " . $pluginName,
                    $auteur,
                    $desc,
                    $ver,
                    template::button('pluginDownload' . $pluginId, [
                        'href' => helper::baseUrl() . 'plugins/action/deploy/' . $pluginId,
                        'value' => template::ico('cloud-download-alt')
                    ])
                        )
                );
            }
        }

        // Valeurs en sortie
        self::addOutput([
            'title' => 'Installer un plugin',
            'view' => 'add'
        ]);
    }

    /**
     * Suppression
     */
    public function delete() {
        $this->targetPluginId = self::getUrl(2);

        // Accès refusé
        if (
        // Le plugin n'existe pas
                self::getData(['plugins', $this->targetPluginId]) === null
                // Groupe insuffisant
                AND ( self::getUrl('group') < self::GROUP_ADMIN)
        ) {
            // Valeurs en sortie
            self::addOutput([
                'access' => false
            ]);
        }
        // Suppression
        else {
            if (strlen($this->targetPluginId) > 0) {
                // Suppression des éventuels fichiers de sauvegarde générés par le plugin
                foreach (glob(self::BACKUP_DIR . $this->targetPluginId . '_*_*.json') as $filename) {
                    helper::rm_recursive($filename);
                }

                $updatedFiles = self::getData(['plugins', $this->targetPluginId, 'updated_files']);
                foreach ($updatedFiles as $originalFile) {
                    // Effectuer une sauvegarde des fichiers à modifier
                    $path_parts = pathinfo($originalFile);

                    foreach (glob($path_parts['dirname'] . '/' . $this->targetPluginId . '_' . $path_parts['filename'] . '_*_*.bck') as $filename) {
                        helper::rm_recursive($filename);
                    }
                }

                // Suppression des fichiers du plugin
                helper::rm_recursive(CorePlugins::PLUGIN_DIR . $this->targetPluginId);

                // Suppression en base du plugin
                self::deleteData(['plugins', $this->targetPluginId]);

                // Valeurs en sortie
                self::addOutput([
                    'redirect' => helper::baseUrl() . 'plugins',
                    'notification' => 'Plugin supprimé',
                    'state' => true
                ]);
            } else {
                self::addOutput([
                    'redirect' => helper::baseUrl() . 'plugins'
                ]);
            }
        }
    }

    /**
     * Déploiement : Deploy; Upload; Activate; Deactivate
     */
    public function action() {
        $this->actionType = self::getUrl(2);
        $this->targetPluginId = self::getUrl(3);

        switch ($this->actionType) {
            case 'activate':
                // **** Cas de l'activation d'un plugin déjà déployé
                $titre = "Installation du plugin";
                break;

            case 'undeploy':
                // **** Cas de la désactivation d'un plugin actif
                $titre = "Désinstallation du plugin";
                break;

            default:
                // **** Cas de l'ajout d'un plugin via la bibliothèque (deploy) ou via une archive locale (upload)
                $titre = "Installation du plugin";
        }
        // Valeurs en sortie
        self::addOutput([
            'display' => self::DISPLAY_LAYOUT_LIGHT,
            'title' => $titre,
            'view' => 'action'
        ]);
    }

    public function upload() {
        $this->targetPluginId = 'unkown';

        // 1- Récupération des info du fichier
        $uploadedFile = $_FILES['directUpload'];

        // Effectuer les différents contrôles sur le fichier (extension, taille, etc...)
        $success = true;
        $errorMsg = "";
        if ($uploadedFile['error'] != UPLOAD_ERR_OK) {
            $success = false;
            $errorMsg = "Erreur lors du transfert de l'archive.";
        } else {
            if ($uploadedFile['size'] == 0) {
                $success = false;
                $errorMsg = "L'archive n'a pas été uploadée.";
            } else {
                if ($uploadedFile['size'] > CorePlugins::ARCHIVE_MAX_SIZE) {
                    $success = false;
                    $errorMsg = "L'archive a une taille trop importante.";
                } else {
                    $extensions_valides = array('zip', 'tar', 'gz');
                    // Récupération de l'extension de l'archive
                    $extension_upload = strtolower(substr(strrchr($uploadedFile['name'], '.'), 1));
                    if (!in_array($extension_upload, $extensions_valides)) {
                        $success = false;
                        $errorMsg = "L'extension du fichier n'est pas correcte.";
                    } else {
                        helper::rm_recursive(self::TEMP_DIR . $uploadedFile['name']);
                        if (move_uploaded_file($uploadedFile['tmp_name'], self::TEMP_DIR . $uploadedFile['name'])) {
                            try {
                                // Lecture de l'archive pour récupérer le contenu du Manifest.json
                                $filesList = scandir('phar://' . self::TEMP_DIR . $uploadedFile['name']);
                                if (count($filesList) > 0) {
                                    $manifest_json = file_get_contents('phar://' . self::TEMP_DIR . $uploadedFile['name'] . '/MANIFEST.json');
                                    if ($manifest_json) {
                                        // Vérifier la validité du fichier json
                                        ValidateJson::check($manifest_json, 'core/module/plugins/schema.json');
                                        if (!ValidateJson::isValid()) {
                                            $success = false;
                                            $errorMsg = "Le fichier MANIFEST.json n'est pas au bon format.";
                                            $nbErrors = count(ValidateJson::getErrors());
                                            for ($i = 0; $i < $nbErrors; $i++) {
                                                if ($i === 0) {
                                                    $errorMsg .= " (";
                                                }
                                                $errorMsg .= ValidateJson::getErrors()[$i];
                                                if ($i === ($nbErrors - 1)) {
                                                    $errorMsg .= ").";
                                                } else {
                                                    $errorMsg .= $error . " / ";
                                                }
                                            }
                                        } else {
                                            // Lire les infos dans le Json
                                            $manifest_data = json_decode($manifest_json);
                                            $code = $manifest_data->code;
                                            $version = $manifest_data->version;
                                            $zwiiVersion = $manifest_data->zwii_version;

                                            // Vérifier si le plugin est déjà installé
                                            $deployedPlugins = helper::arrayColumn(self::getData(['plugins']), 'name', 'KEY_SORT_ASC');
                                            foreach ($deployedPlugins as $pluginId => $pluginName) {
                                                if ($pluginId === $code) {
                                                    if ($version == self::getData(['plugins', $pluginId, 'version'])) {
                                                        $success = false;
                                                        $errorMsg = "Le plugin `" . $pluginName . "` est déjà présent en version " . $version;
                                                    } else {
                                                        $success = false;
                                                        $errorMsg = "Veuillez désintaller le plugin `" . $pluginName . "` en version " . self::getData(['plugins', $pluginId, 'version']) . " avant d'installer cette archive.";
                                                    }
                                                    break;
                                                }
                                            }
                                        }
                                        if ($success) {
                                            // Vérifier que le plugin est compatible avec la version de Zwii
                                            foreach ($zwiiVersion as $compatibleVersion) {
                                                if (strpos(self::ZWII_VERSION, $compatibleVersion) === 0) {
                                                    // La version de Zwii est compatible
                                                    $success = true;
                                                    break;
                                                } else {
                                                    $success = false;
                                                }
                                            }
                                            if (!$success) {
                                                $errorMsg = "Ce plugin n'est pas compatible avec votre version de Zwii.";
                                            } else {
                                                $this->targetPluginId = $code;
                                                if ($extension_upload == 'gz') {
                                                    $compressedFileName = substr($uploadedFile['name'], 0, strrpos($uploadedFile['name'], '.', -1));
                                                    $ext = strtolower(substr(strrchr($compressedFileName, '.'), 1));
                                                    $extension_upload = $ext . "." . $extension_upload;
                                                }

                                                if (self::TEMP_DIR . $uploadedFile['name'] !== self::TEMP_DIR . $this->targetPluginId . '.' . $extension_upload) {
                                                    // Avant de renommer l'archive, vérifier qu'il n'y a pas déjà des fichiers pour le même plugin
                                                    // Nettoyage des fichiers temporaires; à faire uniquement dans le cas du deploy
                                                    foreach (glob(self::TEMP_DIR . $this->targetPluginId . ".*") as $filename) {
                                                        helper::rm_recursive($filename);
                                                    }

                                                    // Renommer l'archive afin que la suite du traitement soit identique au cas d'un plugin pris dans la bibliotèque
                                                    if (!rename(self::TEMP_DIR . $uploadedFile['name'], self::TEMP_DIR . $this->targetPluginId . '.' . $extension_upload)) {
                                                        $success = false;
                                                        $errorMsg = "Erreur lors du renommage de l'archive.";
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        $success = false;
                                        $errorMsg = "Le fichier MANIFEST.json n'a pas été trouvé dans l'archive.";
                                    }
                                } else {
                                    $success = false;
                                    $errorMsg = "L'archive ne contient aucun fichier.";
                                }
                            } catch (Exception $e) {
                                $errorMsg = $e->getMessage();
                                $success = false;
                            }
                        } else {
                            $success = false;
                            $errorMsg = "Une erreur est survenue lors de la récupération du fichier.";
                        }
                    }
                }
            }
        }

        // Valeurs en sortie
        $output = ($success) ? $this->targetPluginId : $errorMsg;
        self::addOutput([
            'display' => self::DISPLAY_JSON,
            'content' => [
                'success' => $success,
                'data' => $output
            ],
            'notification' => $errorMsg
        ]);
    }

    /**
     * Étapes de l'action : Deploy; Activate; Undeploy; Upload
     */
    public function actionSteps() {
        $this->actionType = self::getUrl(2);
        $this->targetPluginId = self::getUrl(3);

        if (strlen($this->targetPluginId) > 0) {
            $corePlugin = new CorePlugins($this);
            $corePlugin->setIdPlugin($this->targetPluginId);
            $corePlugin->setActionType($this->actionType);

            switch (self::getInput('step', helper::FILTER_INT)) {
                // Etape 1
                case 1:
                    $success = true;
                    $errorMsg = "";


                    switch ($this->actionType) {
                        case 'deploy':
                            // Nettoyage des fichiers temporaires; à faire uniquement dans le cas du deploy
                            foreach (glob(self::TEMP_DIR . $this->targetPluginId . ".*") as $filename) {
                                helper::rm_recursive($filename);
                            }
                        // Pas de "break", pour effectuer également le code de la partie "upload"

                        case 'upload':
                            // Suppression du répertoire du plugin si existant
                            $dirPlugin = CorePlugins::PLUGIN_DIR . $this->targetPluginId;
                            if (file_exists($dirPlugin)) {
                                helper::rm_recursive($dirPlugin);
                            }
                            break;

                        default:
                            // **** Cas de l'activation/désactivation d'un plugin déjà déployé
                            // Vérifier la syntaxe des fichiers .php
                            $success = $corePlugin->checkPhpFiles($errorMsg);
                    }

                    // Valeurs en sortie
                    self::addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Etape 2
                case 2:
                    $success = true;
                    $errorMsg = "";

                    switch ($this->actionType) {
                        case 'deploy':
                            // TODO - Téléchargement de l'archive du plugin depuis le serveur de Zwii dans le cas du deploy
                            $urlPlugin = ""; // A DEFINIR
                            $success = (file_put_contents(self::TEMP_DIR . $this->targetPluginId . '.tar.gz', file_get_contents($urlPlugin)) !== false);
                        // Pas de "break", pour effectuer également le code de la partie "upload"

                        case 'upload':
                            if ($success) { // Nécessaire dans le cas où on est dans une action "deploy"
                                try {
                                    // Décompression dans le dossier de plugins
                                    // Normalement il ne doit y avoir qu'un seul fichier correspondant au plugin
                                    $list = glob(self::TEMP_DIR . $this->targetPluginId . ".*");
                                    if (count($list) === 1) {
                                        $file = $list[0];

                                        // Récupération de l'extension du fichier
                                        $extension = strtolower(substr(strrchr($file, '.'), 1));
                                        $targetDir = CorePlugins::PLUGIN_DIR . $this->targetPluginId . '/';

                                        switch ($extension) {
                                            case 'gz':
                                                $compressedFileName = substr($file, 0, strrpos($file, '.', -1));
                                                helper::rm_recursive($compressedFileName);
                                                $ext = strtolower(substr(strrchr($compressedFileName, '.'), 1));
                                                if ($ext !== 'tar') {
                                                    $success = false;
                                                    $errorMsg = "L'extension {." . $ext . ".gz} n'est pas gérée, impossible de décompresser le fichier {" . $file . "}.";
                                                } else {
                                                    $gz = new PharData($file);
                                                    $gz->decompress();
                                                    unset($gz);
                                                    $tar = new PharData($compressedFileName);
                                                    $tar->extractTo($targetDir, null, true);
                                                    unset($tar);
                                                }
                                                break;

                                            case 'tar':
                                                $tar = new PharData($file);
                                                $tar->extractTo($targetDir, null, true);
                                                unset($tar);
                                                break;

                                            case 'zip':
                                                $zip = new ZipArchive;
                                                if ($zip->open($file) === TRUE) {
                                                    $zip->extractTo($targetDir);
                                                    $zip->close();
                                                } else {
                                                    $success = false;
                                                    $errorMsg = "Erreur lors de la décompression de l'archive {" . $file . "}.";
                                                }
                                                unset($zip);
                                                break;
                                        }
                                    } else {
                                        $success = false;
                                        $errorMsg = "[Nb = " . count($list) . "] Impossible de trouver la bonne archive correspond au plugin {" . $this->targetPluginId . "} dans le répertoire " . self::TEMP_DIR . ".";
                                    }
                                } catch (Exception $e) {
                                    $errorMsg = $e->getMessage();
                                    $success = false;
                                } finally {
                                    foreach (glob(self::TEMP_DIR . $this->targetPluginId . ".*") as $filename) {
                                        helper::rm_recursive($filename);
                                    }
                                }
                            }

                            if ($success) {
                                // Vérifier que le plugin est bien constitué :
                                $success = $corePlugin->checkPluginStructure($errorMsg);
                            }
                            break;


                        default:
                            // **** Cas de l'activation/désactivation d'un plugin déjà déployé
                            $success = $corePlugin->checkBefore($errorMsg);
                    }

                    // Valeurs en sortie
                    self::addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Etape 3
                case 3:
                    $success = true;
                    $errorMsg = "";

                    switch ($this->actionType) {
                        case 'deploy':
                        case 'upload':
                            $success = $corePlugin->checkBefore($errorMsg);

                            if ($success) {
                                try {
                                    // Lire le fichier MANIFEST.json
                                    $manifest_json = file_get_contents(CorePlugins::PLUGIN_DIR . $this->targetPluginId . '/MANIFEST.json');
                                    $manifest_data = json_decode($manifest_json);

                                    // Lire les infos dans le Json
                                    $name = $manifest_data->name;
                                    $author = $manifest_data->author;
                                    $version = $manifest_data->version;
                                    $version_date = $manifest_data->version_date;
                                    $description = $manifest_data->description;
                                    $support_url = $manifest_data->support_url;
                                    $zwiiVersion = $manifest_data->zwii_version;
                                    $updaptedFiles = $manifest_data->updated_files;
                                    $addedFiles = $manifest_data->added_files;
                                    $updaptedDatas = $manifest_data->updated_datas;
                                    $addedDatas = $manifest_data->added_datas;

                                    // Ajout du plugin en base avec status Désactivé
                                    if (self::getData(['plugins', $this->targetPluginId])) {
                                        $errorMsg = 'Un plugin avec l\'identifiant `' . $this->targetPluginId . '` existe déjà !';
                                        $success = false;
                                    } else {
                                        if ($this->actionType === 'deploy') {
                                            // Plugin provenant du site officiel
                                            $origin = "official";
                                        } else {
                                            // Plugin venant d'une archive chargée en direct
                                            $origin = "unknown";
                                        }
                                        self::setData([
                                            'plugins',
                                            $this->targetPluginId,
                                            [
                                                'origin' => $origin,
                                                'name' => $name,
                                                'author' => $author,
                                                'version' => $version,
                                                'version_date' => $version_date,
                                                'description' => $description,
                                                'support_url' => $support_url,
                                                'zwii_version' => $zwiiVersion,
                                                'updated_files' => $updaptedFiles,
                                                'added_files' => $addedFiles,
                                                'updated_datas' => $updaptedDatas,
                                                'added_datas' => $addedDatas,
                                                'status' => CorePlugins::IS_DEACTIVATE
                                            ]
                                        ]);
                                        self::saveData();
                                    }
                                    //}
                                } catch (Exception $e) {
                                    $errorMsg = $e->getMessage();
                                    $success = false;
                                }
                            }
                            break;


                        default:
                            // **** Cas de l'activation/désactivation d'un plugin déjà déployé
                            $success = $corePlugin->backup();
                    }

                    // Valeurs en sortie
                    self::addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Etape 4
                case 4:
                    $success = true;
                    $errorMsg = "";

                    switch ($this->actionType) {
                        case 'deploy':
                        case 'upload':
                            $success = $corePlugin->backup();
                            $errorMsg = "Erreur lors de la sauvegarde des fichiers.";
                            break;

                        default:
                            // **** Cas de l'activation/désactivation d'un plugin déjà déployé
                            $success = $corePlugin->execute($errorMsg);

                            // Changement statut du plugin
                            if ($success) {
                                $status = ($this->actionType === 'activate') ? CorePlugins::IS_ACTIVATE : CorePlugins::IS_DEACTIVATE;
                            } else {
                                // --> Erreur
                                $status = CorePlugins::ON_ERROR;
                            }
                            $corePlugin->changePluginStatus($status);

                            if($success && !helper::isFunctionEnabled("exec")){
                                $errorMsg = "La fonction 'exec' n'étant pas accessible sur l'hébergement, le contrôle des fichiers PHP n'a pas pu être effectué.";
                            }
                    }

                    // Valeurs en sortie
                    self::addOutput([
                        'display' => self::DISPLAY_JSON,
                        'content' => [
                            'success' => $success,
                            'data' => $errorMsg
                        ]
                    ]);
                    break;

                // Etape 5
                case 5:
                    $success = true;
                    $errorMsg = "";

                    switch ($this->actionType) {
                        case 'deploy':
                        case 'upload':
                            $success = $corePlugin->execute($errorMsg);

                            // Changement statut du plugin
                            if ($success) {
                                // --> Activé
                                $status = CorePlugins::IS_ACTIVATE;
                            } else {
                                // --> Erreur
                                $status = CorePlugins::ON_ERROR;
                            }
                            $corePlugin->changePluginStatus($status);

                            if($success && !helper::isFunctionEnabled("exec")){
                                $errorMsg = "La fonction 'exec' n'étant pas accessible sur l'hébergement, le contrôle des fichiers PHP n'a pas pu être effectué.";
                            }

                        default:
                        // **** Cas de l'activation/désactivation d'un plugin déjà déployé
                    }

                    // Valeurs en sortie
                    self::addOutput([
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
            self::addOutput([
                'display' => self::DISPLAY_JSON,
                'content' => [
                    'success' => false,
                    'data' => "Identifiant du plugin non indiqué."
                ]
            ]);
        }
    }

}
