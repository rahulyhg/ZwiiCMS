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

class pluginManager extends plugin {

    public $pluginClass;
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
    public $actionType;
    public $targetPluginId;

    /**
     * Liste des plugins
     */
    public function index() {
        // Si le répertoire plugin n'existe pas, le créer
        if (!file_exists(self::PLUGIN_DIR))
            mkdir(self::PLUGIN_DIR, 0755, true);

        // récupérer la liste des plugins déployés
        $deployedPlugins = helper::arrayColumn(self::getData(['plugins']), 'name', 'KEY_SORT_ASC');
        foreach ($deployedPlugins as $pluginId => $pluginName) {
            $status = self::getData(['plugins', $pluginId, 'status']);
            switch ($status) {
                case Plugin::ON_ERROR:
                    $statusText = template::label("", "En erreur", [
                                'class' => 'colorRed'
                    ]);
                    $specificAction = template::button('pluginsDeactivate' . $pluginId, [
                                'class' => 'userDelete buttonOrange',
                                'href' => helper::baseUrl() . 'pluginManager/action/undeploy/' . $pluginId,
                                'value' => template::ico('power-off')
                    ]);
                    $deleteAction = "";
                    break;

                case Plugin::IS_NOT_APPLICABLE:
                    $statusText = template::label("", "Non applicable", [
                                'class' => 'colorGrey'
                    ]);
                    $specificAction = "";

                    $deleteAction = template::button('pluginDelete' . $pluginId, [
                                'class' => 'pluginDelete buttonRed',
                                'href' => helper::baseUrl() . 'pluginManager/delete/' . $pluginId,
                                'value' => template::ico('times')
                    ]);
                    break;

                case Plugin::IS_DEACTIVATE:
                    $statusText = template::label("", "Désactivé", [
                                'class' => 'colorOrange'
                    ]);
                    $specificAction = template::button('pluginsActivate' . $pluginId, [
                                'class' => 'userDelete buttonGreen',
                                'href' => helper::baseUrl() . 'pluginManager/action/activate/' . $pluginId,
                                'value' => template::ico('power-off"')
                    ]);
                    $deleteAction = template::button('pluginDelete' . $pluginId, [
                                'class' => 'pluginDelete buttonRed',
                                'href' => helper::baseUrl() . 'pluginManager/delete/' . $pluginId,
                                'value' => template::ico('times')
                    ]);
                    break;

                case Plugin::IS_ACTIVATE:
                    $statusText = template::label("", "Activé", [
                                'class' => 'colorGreen'
                    ]);
                    $specificAction = template::button('pluginsDeactivate' . $pluginId, [
                                'class' => 'userDelete buttonOrange',
                                'href' => helper::baseUrl() . 'pluginManager/action/undeploy/' . $pluginId,
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
            'title' => 'Bibliothèque de vos plugins',
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
                        'href' => helper::baseUrl() . 'pluginManager/action/deploy/' . $pluginId,
                        'value' => template::ico('cloud-download-alt')
                    ])
                        )
                );
            }
        }

        // Valeurs en sortie
        self::addOutput([
            'title' => 'Téléchargez le plugin à ajouter à votre bibliothèque',
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
                    // Effectuer une sauvegarde des fichiers modifier
                    $path_parts = pathinfo($originalFile);

                    foreach (glob($path_parts['dirname'] . '/' . $this->targetPluginId . '_' . $path_parts['filename'] . '_*_*.bck') as $filename) {
                        helper::rm_recursive($filename);
                    }
                }

                // Suppression des fichiers du plugin
                helper::rm_recursive(self::PLUGIN_DIR . $this->targetPluginId);

                // Suppression en base du plugin
                self::deleteData(['plugins', $this->targetPluginId]);

                // Valeurs en sortie
                self::addOutput([
                    'redirect' => helper::baseUrl() . 'pluginManager',
                    'notification' => 'Plugin supprimé',
                    'state' => true
                ]);
            } else {
                self::addOutput([
                    'redirect' => helper::baseUrl() . 'pluginManager'
                ]);
            }
        }
    }

    /**
     * Déploiement : New; Add; Activate; Deactivate
     */
    public function action() {
        $this->actionType = self::getUrl(2);
        $this->targetPluginId = self::getUrl(3);

        switch ($this->actionType) {
            case 'activate':
                // **** Cas de l'activation d'un plugin déjà déployé
                $titre = "Activation du plugin";
                break;

            case 'undeploy':
                // **** Cas de la désactivation d'un plugin actif
                $titre = "Désactivation du plugin";
                break;

            default:
                // **** Cas de l'ajout d'un plugin via la bibliothèque (deploy) ou via une archive locale (upload)
                $titre = "Déploiement du plugin";
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

        // Effectuer les différents contrôle sur le fichier (extension, taille, etc...)
        $success = true;
        $errorMsg = "";
        if ($uploadedFile['error'] != UPLOAD_ERR_OK) {
            $success = false;
            $errorMsg = "Erreur lors du transfert de l'archive";
        } else {
            if ($uploadedFile['size'] == 0) {
                $success = false;
                $errorMsg = "L'archive n'a pa sété uploadée.";
            } else {
                if ($uploadedFile['size'] > self::ARCHIVE_MAX_SIZE) {
                    $success = false;
                    $errorMsg = "L'archive a une taille trop imortante.";
                } else {
                    $extensions_valides = array('zip', 'tar', 'gz');
                    //1. strrchr renvoie l'extension avec le point (« . »).
                    //2. substr(chaine,1) ignore le premier caractère de chaine.
                    //3. strtolower met l'extension en minuscules.
                    $extension_upload = strtolower(substr(strrchr($uploadedFile['name'], '.'), 1));
                    if (!in_array($extension_upload, $extensions_valides)) {
                        $success = false;
                        $errorMsg = "L'extension du fichier n'est pas correcte";
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
                                        ValidateJson::check($manifest_json, 'core/module/pluginManager/schema.json');
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
                                                $errorMsg = "Votre version de Zwii n'est pas compatible avec ce plugin";
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
                                                        $errorMsg = "Erreur lors du renommage de l'archive";
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        $success = false;
                                        $errorMsg = "Le fichier MANIFEST.json n'a pas été trouvé dans l'archive";
                                    }
                                } else {
                                    $success = false;
                                    $errorMsg = "L'archive ne contient aucun fichier";
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
            switch (self::getInput('step', helper::FILTER_INT)) {
                // Etape 1
                case 1:
                    $success = true;
                    $errorMsg = "";

                    switch ($this->actionType) {
                        case 'activate':
                            // **** Cas de l'activation d'un plugin déjà déployé
                            // Vérifier la syntaxe des fichiers .php
                            $success = self::checkPhpFiles($this->targetPluginId, 'activate', $errorMsg);
                            break;

                        case 'undeploy':
                            // **** Cas de la désactivation d'un plugin actif
                            // Vérifier la syntaxe des fichiers .php
                            $success = self::checkPhpFiles($this->targetPluginId, 'undeploy', $errorMsg);
                            break;

                        default:
                            // **** Cas de l'ajout d'un plugin via la bibliothèque (deploy) ou via une archive locale (upload)
                            if ($this->actionType === 'deploy') {
                                // Nettoyage des fichiers temporaires; à faire uniquement dans le cas du deploy
                                foreach (glob(self::TEMP_DIR . $this->targetPluginId . ".*") as $filename) {
                                    helper::rm_recursive($filename);
                                }
                            }

                            // Suppression du répertoire du plugin si existant
                            $dirPlugin = self::PLUGIN_DIR . $this->targetPluginId;
                            if (file_exists($dirPlugin))
                                helper::rm_recursive($dirPlugin);
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
                        case 'activate':
                            // **** Cas de l'activation d'un plugin déjà déployé
                            $success = self::checkBefore($this->targetPluginId, 'activate', $errorMsg);
                            break;

                        case 'undeploy':
                            // **** Cas de la désactivation d'un plugin actif
                            $success = self::checkBefore($this->targetPluginId, 'undeploy', $errorMsg);
                            break;

                        default:
                            // **** Cas de l'ajout d'un plugin via la bibliothèque (deploy) ou via une archive locale (upload)
                            if ($this->actionType === 'deploy') {
                                // TODO - Téléchargement de l'archive du plugin depuis le serveur de Zwii dans le cas du deploy
                                $urlPlugin = ""; // A DEFINIR
                                $success = (file_put_contents(self::TEMP_DIR . $this->targetPluginId . '.tar.gz', file_get_contents($urlPlugin)) !== false);
                            }

                            if ($success) {
                                try {
                                    // Décompression dans le dossier de plugins
                                    // Normalement il ne doit y avoir qu'un seul fichier correspondant au plugin
                                    $list = glob(self::TEMP_DIR . $this->targetPluginId . ".*");
                                    if (count($list) === 1) {
                                        $file = $list[0];

                                        // Récupération de l'extension du fichier
                                        //1. strrchr renvoie l'extension avec le point (« . »).
                                        //2. substr(chaine,1) ignore le premier caractère de chaine.
                                        //3. strtolower met l'extension en minuscules.
                                        $extension = strtolower(substr(strrchr($file, '.'), 1));
                                        $targetDir = self::PLUGIN_DIR . $this->targetPluginId . '/';

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
                                $success = self::checkPluginStructure($this->targetPluginId, $errorMsg);
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

                // Etape 3
                case 3:
                    $success = true;
                    $errorMsg = "";

                    switch ($this->actionType) {
                        case 'activate':
                            // **** Cas de l'activation d'un plugin déjà déployé
                            $success = self::backup($this->targetPluginId, "activate");
                            break;

                        case 'undeploy':
                            // **** Cas de la désactivation d'un plugin actif
                            $success = self::backup($this->targetPluginId, "undeploy");
                            break;

                        default:
                            // **** Cas de l'ajout d'un plugin via la bibliothèque (deploy) ou via une archive locale (upload)
                            $success = self::checkBefore($this->targetPluginId, 'deploy', $errorMsg);

                            if ($success) {
                                try {
                                    // Lire le fichier MANIFEST.json
                                    $manifest_json = file_get_contents(self::PLUGIN_DIR . $this->targetPluginId . '/MANIFEST.json');
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

                                    // Ajout du plugin en base eavec status Désactivé
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
                                                'status' => self::IS_DEACTIVATE
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
                        case 'activate':
                            // **** Cas de l'activation d'un plugin déjà déployé
                            $success = self::execute($this->targetPluginId, 'activate', $errorMsg);

                            // Changement statut du plugin
                            if ($success) {
                                // --> Activé
                                $status = self::IS_ACTIVATE;
                            } else {
                                // --> Erreur
                                $status = self::ON_ERROR;
                            }
                            self::changePluginStatus($this->targetPluginId, $status);
                            break;

                        case 'undeploy':
                            // **** Cas de la désactivation d'un plugin actif
                            $success = self::execute($this->targetPluginId, 'undeploy', $errorMsg);

                            // Changement statut du plugin
                            if ($success) {
                                // --> Désactivé
                                $status = self::IS_DEACTIVATE;
                            } else {
                                // --> Erreur
                                $status = self::ON_ERROR;
                            }
                            self::changePluginStatus($this->targetPluginId, $status);
                            break;

                        default:
                            // **** Cas de l'ajout d'un plugin via la bibliothèque (deploy) ou via une archive locale (upload)
                            $success = self::backup($this->targetPluginId, "deploy");
                            $errorMsg = "Erreur lors de la sauvegarde des fichiers";
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
                        case 'activate':
                            // **** Cas de l'activation d'un plugin déjà déployé
                            break;

                        case 'undeploy':
                            // **** Cas de la désactivation d'un plugin actif
                            break;

                        default:
                            // **** Cas de l'ajout d'un plugin via la bibliothèque (deploy) ou via une archive locale (upload)
                            $success = self::execute($this->targetPluginId, 'deploy', $errorMsg);

                            // Changement statut du plugin
                            if ($success) {
                                // --> Activé
                                $status = self::IS_ACTIVATE;
                            } else {
                                // --> Erreur
                                $status = self::ON_ERROR;
                            }
                            self::changePluginStatus($this->targetPluginId, $status);
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
                    'data' => "Identifiant du plugin non indiqué"
                ]
            ]);
        }
    }

}
