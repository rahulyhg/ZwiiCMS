<?php

/**
 * This file is part of Zwii.
 *
 * For full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 *
 * @author EBS01
 * @copyright Copyright (C) 2008-2019
 * @license GNU General Public License, version 3
 * @link http://zwiicms.com/
 */
class CorePlugins {

    const PLUGIN_DIR = 'site/plugins/';
    const ON_ERROR = -1;
    const IS_NOT_APPLICABLE = 0;
    const IS_ACTIVATE = 1;
    const IS_DEACTIVATE = 2;
    const ARCHIVE_MAX_SIZE = 1048576; // Max 1048576 octets = 1 Mo        

    private $pluginManager;
    private $idPlugin;
    private $actionType;
    private $dataDir;
    private $backupDir;

    /**
     * Constructeur de la class
     * @param common $common objet appelant de class common
     */
    public function __construct($parent) {
        $this->pluginManager = $parent;
        $this->dataDir = $parent::DATA_DIR;
        $this->backupDir = $parent::BACKUP_DIR;
    }

    /*
     * Affecte l'identifiant du plugin sur lequel les actions dopivent être jouées
     * @param string $idPlugin identifiant du plugin
     */
    public function setIdPlugin($idPlugin){
        $this->idPlugin = $idPlugin;
    }

    /*
     * Affecte le type d'action en cours (deploy, upload, activate, deactivate)
     * @param string $actionType type de l'action
     */
    public function setActionType($actionType){
        $this->actionType = $actionType;
    }

    /**
     * Vérifie si la structure du plugin est conforme
     * @param string $schema chemin du fichier correspond au schéma de référence
     */
    public function checkPluginStructure(&$errorMsg) {
        // Vérifier que le plugin est bien constitué
        $success = true;
        $manifestFile = self::PLUGIN_DIR . $this->idPlugin . '/MANIFEST.json';
        $deployFile = self::PLUGIN_DIR . $this->idPlugin . '/deploy/deploy.php';
        $undeployFile = self::PLUGIN_DIR . $this->idPlugin . '/undeploy/undeploy.php';

        // 1- contient un fichier MANIFEST.json (valide) à la racine
        if (!file_exists($manifestFile)) {
            $success = false;
            $errorMsg = "Fichier `MANIFEST.json` non trouvé";
        } else {
            // Vérification de la structure du fichier json            
            $manifest_json = file_get_contents($manifestFile);
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
            }
        }

        // 2- contient un répertoire `deploy` avec un fichier `deploy.php`
        if ($success && !file_exists($deployFile)) {
            $success = false;
            $errorMsg = "Fichier `deploy/deploy.php` non trouvé";
        }

        if ($success) {
            $contentDeployFile = file_get_contents($deployFile);

            // a- le fichier `deploy.php` contient une fonction `checkBeforeDeploy` avec 3 paramètres passés par référence
            $pattern = '/^[private|protected|public]*\s*function checkBeforeDeploy\(&\$.*, &\$.*, &\$.*\)/m';
            if (preg_match($pattern, $contentDeployFile) !== 1) {
                $success = false;
                $errorMsg = "[deploy/deploy.php] Fonction `checkBeforeDeploy` non présente ou non standard";
            }

            if ($success) {
                // b- le fichier `deploy.php` contient une fonction `deploy` avec 3 paramètres passés par référence
                $pattern = '/^[private|protected|public]*\s*function deploy\(&\$.*, &\$.*, &\$.*\)/m';
                if (preg_match($pattern, $contentDeployFile) !== 1) {
                    $success = false;
                    $errorMsg = "[deploy/deploy.php] Fonction `deploy` non présente ou non standard";
                }
            }
        }

        // 3- contient un répertoire `undeploy` avec un fichier `undeploy.php`
        if ($success && !file_exists($undeployFile)) {
            $success = false;
            $errorMsg = "Fichier `undeploy/undeploy.php` non trouvé";
        }
        if ($success) {
            $contentUndeployFile = file_get_contents($undeployFile);

            // a- le fichier `undeploy.php` contient une fonction `checkBeforeUndeploy` avec 3 paramètres passés par référence
            $pattern = '/^[private|protected|public]*\s*function checkBeforeUndeploy\(&\$.*, &\$.*, &\$.*\)/m';
            if (preg_match($pattern, $contentUndeployFile) !== 1) {
                $success = false;
                $errorMsg = "[undeploy/undeploy.php] Fonction `checkBeforeUndeploy` non présente ou non standard";
            }

            if ($success) {
                // b- le fichier `undeploy.php` contient une fonction `undeploy` avec 3 paramètres passés par référence
                $pattern = '/^[private|protected|public]*\s*function undeploy\(&\$.*, &\$.*, &\$.*\)/m';
                if (preg_match($pattern, $contentUndeployFile) !== 1) {
                    $success = false;
                    $errorMsg = "[undeploy/undeploy.php] Fonction `undeploy` non présente ou non standard";
                }
            }
        }

        if ($success) {
            // Vérifier la syntaxe des fichiers .php
            $success = $this->checkPhpFiles($errorMsg);
        }

        return $success;
    }

    /*
     * Function d'appel des contrôles à effectuer pour les actions du plugin
     * @param string $errorMsg Erreur de retour (par référence)
     * @return boolean
     */
    public function checkBefore(&$errorMsg) {
        $success = true;

        // dans le cas de l'activation ou du chargement via une archive locale, même contôles que pour 'deploy'
        $action = ($this->actionType == 'activate' || $this->actionType == 'upload') ? 'deploy' : $this->actionType;

        include_once self::PLUGIN_DIR . $this->idPlugin . '/' . $action . '/' . $action . '.php';
        call_user_func_array('checkBefore' . ucfirst($action), array(&$this->pluginManager, &$success, &$errorMsg));

        return $success;
    }

    /*
     * Fonction de vérification de la syntaxe des fichiers php du plugin
     * @param string $errorMsg Erreur de retour (par référence)
     * @param string $dir Répertoire fils (pour la récursivité)
     * @return boolean
     */
    public function checkPhpFiles(&$errorMsg, $dir = null) {
        $success = true;
        if(helper::isFunctionEnabled("exec")){
            $pluginDir = self::PLUGIN_DIR . $this->idPlugin;
            $pluginDir = ($dir ? $pluginDir . '/' . $dir : $pluginDir);
            if (file_exists($pluginDir)) {
                $objects = scandir($pluginDir);
                foreach ($objects as $key => $value) {
                    if (!in_array($value, array(".", ".."))) {
                        if (is_dir($pluginDir . '/' . $value)) {
                            $newDir = ($dir ? $dir . '/' . $value : $value);
                            $success = $this->checkPhpFiles($errorMsg, $newDir);
                        } else {
                            $path = $pluginDir . '/' . $value;
                            $path_parts = pathinfo($path);
                            if (strtolower($path_parts['extension']) == 'php') {
                                // Contrôler le fichier
                                $output = "";
                                $ret = 0;
                                exec("php -l " . $path, $output, $ret);
                                if ($ret == -1) {
                                    $success = false;
                                    $errorMsg = $output[1];
                                }
                            }
                        }
                    }
                    if (!$success) {
                        break;
                    }
                }
            } else {
                $success = false;
            }
        }
        return $success;
    }

    /*
     * Fonction de sauvegarde des données et des fichiers modifiés
     * @return boolean
     */
    public function backup() {
        // dans le cas du chargement via une archive locale, même backup que pour 'deploy'
        $action = ($this->actionType == 'upload') ? 'deploy' : $this->actionType;

        // Avant la sauvegarde, on supprime les précédents pour éviter de cumuler trop de fichiers backup
        foreach (glob($this->backupDir . $this->idPlugin . '_*_' . $action . '.json') as $filename) {
            helper::rm_recursive($filename);
        }

        // Copie du fichier de données
        $success = copy($this->dataDir . 'data.json', $this->backupDir . $this->idPlugin . '_' . date('Y-m-d_H-i-s', time()) . '_' . $action . '.json');

        // Effectuer une sauvegarde des fichiers qui vont être modifiés
        $updatedFiles = $this->pluginManager->getData(['plugins', $this->idPlugin, 'updated_files']);
        foreach ($updatedFiles as $originalFile) {
            // Effectuer une sauvegarde des fichiers modifier
            $path_parts = pathinfo($originalFile);

            // Avant la sauvegarde, on supprime les précédents pour éviter de cumuler trop de fichiers backup
            foreach (glob($path_parts['dirname'] . '/' . $this->idPlugin . '_' . $path_parts['filename'] . '_*_' . $action . '.bck') as $filename) {
                helper::rm_recursive($filename);
            }

            $backupFile = $path_parts['dirname'] . '/' . $this->idPlugin . '_' . $path_parts['filename'] . '_' . date('Y-m-d_H-i-s', time()) . '_' . $action . '.bck';
            $success = copy($originalFile, $backupFile);
            if (!$success) {
                break;
            }
        }

        return $success;
    }

    /*
     * Function d'appel des actions à effectuer pour le plugin
     * @param string $errorMsg Erreur de retour (par référence)
     * @return boolean
     */
    public function execute(&$errorMsg) {
        $success = true;

        // dans le cas de l'activation ou du chargement via une archive locale, même actions que pour 'deploy'
        $action = ($this->actionType == 'activate' || $this->actionType == 'upload') ? 'deploy' : $this->actionType;

        $actionFile = self::PLUGIN_DIR . $this->idPlugin . '/' . $action . '/' . $action . '.php';
        if (file_exists($actionFile)) {
            include_once $actionFile;
            call_user_func_array($action, array(&$this->pluginManager, &$success, &$errorMsg));
        } else {
            $success = false;
            $errorMsg = "Le fichier {" . $actionFile . "} n'existe pas.";
        }
        return $success;
    }

    /*
     * Fonction de changement d'état d'un plugin
     * @param string $newStatus Nouveau status du plugin
     * @return null
     */
    public function changePluginStatus($newStatus) {
        $this->pluginManager->setData([
            'plugins',
            $this->idPlugin,
            [
                'origin' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'origin']),
                'name' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'name']),
                'author' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'author']),
                'version' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'version']),
                'version_date' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'version_date']),
                'description' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'description']),
                'support_url' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'support_url']),
                'zwii_version' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'zwii_version']),
                'updated_files' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'updated_files']),
                'added_files' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'added_files']),
                'updated_datas' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'updated_datas']),
                'added_datas' => $this->pluginManager->getData(['plugins', $this->idPlugin, 'added_datas']),
                'status' => $newStatus
            ]
        ]);

        $this->pluginManager->saveData();
    }
}
