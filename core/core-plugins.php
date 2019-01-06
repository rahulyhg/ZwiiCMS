<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class plugin extends common {
    
    const PLUGIN_DIR = 'site/plugins/';
    const ON_ERROR = -1;
    const IS_NOT_APPLICABLE = 0;
    const IS_ACTIVATE = 1;
    const IS_DEACTIVATE = 2;
    const ARCHIVE_MAX_SIZE = 1048576; // Max 1048576 octets = 1 Mo        

    /**
     * Vérifie si la structure du plugin est conforme
     * @param string $json contenu du fichier Json à contrôler
     * @param string $schema chemin du fichier correspond au schéma de référence
    */
    public function checkPluginStructure($idPlugin, &$errorMsg)
    {
        // Vérifier que le plugin est bien constitué
        $success = true;
        $manifestFile = self::PLUGIN_DIR.$idPlugin.'/MANIFEST.json';
        $deployFile = self::PLUGIN_DIR.$idPlugin.'/deploy/deploy.php';
        $undeployFile = self::PLUGIN_DIR.$idPlugin.'/undeploy/undeploy.php';

        // 1- contient un fichier MANIFEST.json (valide) à la racine
        if (!file_exists($manifestFile)){
            $success = false;
            $errorMsg = "Fichier `MANIFEST.json` non trouvé";
        } else {
            // Vérification de la structure du fichier json            
            $manifest_json = file_get_contents($manifestFile);
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
            }
        }
        
        // 2- contient un répertoire `deploy` avec un fichier `deploy.php`
        if ($success && !file_exists($deployFile)){
            $success = false;
            $errorMsg = "Fichier `deploy/deploy.php` non trouvé";
        }

        if($success){
            $contentDeployFile = file_get_contents($deployFile);

            // a- le fichier `deploy.php` contient une fonction `checkBeforeDeploy` avec 3 paramètres passés par référence
            $pattern = '/^[private|protected|public]*\s*function checkBeforeDeploy\(&\$.*, &\$.*, &\$.*\)/m';
            if (preg_match($pattern, $contentDeployFile) !== 1) {
                $success = false;
                $errorMsg = "[deploy/deploy.php] Fonction `checkBeforeDeploy` non présente ou non standard";
            }

            if($success){
                // b- le fichier `deploy.php` contient une fonction `deploy` avec 3 paramètres passés par référence
                $pattern = '/^[private|protected|public]*\s*function deploy\(&\$.*, &\$.*, &\$.*\)/m';
                if (preg_match($pattern, $contentDeployFile) !== 1) {
                    $success = false;
                    $errorMsg = "[deploy/deploy.php] Fonction `deploy` non présente ou non standard";
                }
            }
        }

        // 3- contient un répertoire `undeploy` avec un fichier `undeploy.php`
        if ($success && !file_exists($undeployFile)){
            $success = false;
            $errorMsg = "Fichier `undeploy/undeploy.php` non trouvé";
        }
        if($success){
            $contentUndeployFile = file_get_contents($undeployFile);

            // a- le fichier `undeploy.php` contient une fonction `checkBeforeUndeploy` avec 3 paramètres passés par référence
            $pattern = '/^[private|protected|public]*\s*function checkBeforeUndeploy\(&\$.*, &\$.*, &\$.*\)/m';
            if (preg_match($pattern, $contentUndeployFile) !== 1) {
                $success = false;
                $errorMsg = "[undeploy/undeploy.php] Fonction `checkBeforeUndeploy` non présente ou non standard";
            }

            if($success){
                // b- le fichier `undeploy.php` contient une fonction `undeploy` avec 3 paramètres passés par référence
                $pattern = '/^[private|protected|public]*\s*function undeploy\(&\$.*, &\$.*, &\$.*\)/m';
                if (preg_match($pattern, $contentUndeployFile) !== 1) {
                    $success = false;
                    $errorMsg = "[undeploy/undeploy.php] Fonction `undeploy` non présente ou non standard";
                }
            }
        }

        if($success){
            // Vérifier la syntaxe des fichiers .php
            $success = self::checkPhpFiles($idPlugin, 'deploy', $errorMsg);
        }
        
        
        return $success;
    }
    
    
    /*
     * Function d'appel des contrôles à effectuer pour les actions du plugin
     * @param string $pluginId Identifiant du plugin
     * @param string $actionType Type de l'action en cours (deploy, undeploy, activate)
     * @param string $errorMsg Erreur de retour (par référence)
     * @return boolean
     */
    public function checkBefore($pluginId, $actionType, &$errorMsg) {
        $success = true;
        if ($actionType === 'activate') $actionType = 'deploy'; // dans le cas de l'activation, même contôler que pour 'deploy'

        include_once self::PLUGIN_DIR . $pluginId . '/' . $actionType . '/' . $actionType . '.php';
        call_user_func_array('checkBefore' . ucfirst($actionType), array(&$this, &$success, &$errorMsg));

        return $success;
    }
    
    /*
     * Fonction de vérification de la syntaxe des fichiers php du plugin
     * @param string $pluginId Identifiant du plugin
     * @param string $actionType Type de l'action en cours (deploy, undeploy, activate)
     * @param string $errorMsg Erreur de retour (par référence)
     * @param string $dir Répertoire fils (pour la récursivité)
     * @return boolean
     */
    public function checkPhpFiles($pluginId, $actionType, &$errorMsg, $dir=null) {
        $success = true;
        $pluginDir = self::PLUGIN_DIR.$pluginId;
        $pluginDir = ($dir ? $pluginDir . '/' . $dir : $pluginDir);
        if(file_exists($pluginDir)){
            $objects = scandir($pluginDir);
            foreach ($objects as $key => $value){
                if (!in_array($value,array(".","..")))
                {
                    if (is_dir($pluginDir . '/' . $value))
                    {
                      $newDir = ($dir ? $dir . '/' . $value : $value);
                      $success = self::checkPhpFiles($pluginId, $actionType, $errorMsg, $newDir);
                    }else{
                        $path = $pluginDir.'/'.$value;
                        $path_parts = pathinfo($path);
                        if(strtolower($path_parts['extension']) == 'php'){
                            // Contrôler le fichier
                            exec("php -l ".$path, $output, $ret);
                            if ($ret == -1){
                                $success = false;
                                $errorMsg = $output[1];
                            }
                        }
                    }
                }
                if(!$success) break;
            }
        } else $success = false;
        return $success;
    }
    
    /*
     * Fonction de sauvegarde des données et des fichiers modifiés
     * @param string $pluginId Identifiant du plugin
     * @param string $actionType Type de l'action en cours (deploy, undeploy, activate)
     * @return boolean
     */
    public function backup($pluginId, $actionType) {
        // Avant la sauvegarde, on supprime les précédents pour éviter de cumuler trop de fichiers backup
        foreach (glob(self::BACKUP_DIR . $pluginId . '_*_' . $actionType . '.json') as $filename) {
            helper::rm_recursive($filename);            
        }
        
        // Copie du fichier de données
        $success = copy(self::DATA_DIR.'data.json', self::BACKUP_DIR . $pluginId . '_' . date('Y-m-d_H-i-s', time()) . '_' . $actionType . '.json');

        // Effectuer une sauvegarde des fichiers qui vont être modifiés
        $updatedFiles = self::getData(['plugins', $pluginId, 'updated_files']);
        foreach ($updatedFiles as $originalFile) {
            // Effectuer une sauvegarde des fichiers modifier
            $path_parts = pathinfo($originalFile);
            
            // Avant la sauvegarde, on supprime les précédents pour éviter de cumuler trop de fichiers backup
            foreach (glob($path_parts['dirname'].'/'.$pluginId.'_'.$path_parts['filename'].'_*_' . $actionType . '.bck') as $filename) {
                helper::rm_recursive($filename);            
            }
        
            $backupFile = $path_parts['dirname'].'/'.$pluginId.'_'.$path_parts['filename'].'_' . date('Y-m-d_H-i-s', time()) . '_' . $actionType . '.bck';
            $success = copy ($originalFile, $backupFile);
            if(!$success){
                break;
            }
        }
                
        return $success;
    }
    
    /*
     * Function d'appel des actions à effectuer pour le plugin
     * @param string $pluginId Identifiant du plugin
     * @param string $actionType Type de l'action en cours (deploy, undeploy, activate)
     * @param string $errorMsg Erreur de retour (par référence)
     * @return boolean
     */
    public function execute($pluginId, $actionType, &$errorMsg) {
        $success = true;

        if ($actionType === 'activate') $actionType = 'deploy';   // dans le cas de l'activation, même actions que pour 'deploy'

        $actionFile = self::PLUGIN_DIR . $pluginId . '/' . $actionType . '/' . $actionType . '.php';
        if(file_exists($actionFile)){
            include_once $actionFile;
            call_user_func_array($actionType, array(&$this, &$success, &$errorMsg));
        } else {
            $success = false;
            $errorMsg = "Le fichier {".$actionFile."} n'existe pas.";                   
        }
        return $success;
    }
    
    /*
     * Fonction de changement d'état d'un plugin
     * @param string $pluginId Identifiant du plugin
     * @param string $newStatus Nouveau status du plugin
     * @return null
     */
    public function changePluginStatus($pluginId, $newStatus) {
        self::setData([
            'plugins',
            $pluginId,
            [
                'origin' => self::getData(['plugins', $pluginId, 'origin']),
                'name' => self::getData(['plugins', $pluginId, 'name']),
                'author' => self::getData(['plugins', $pluginId, 'author']),
                'version' => self::getData(['plugins', $pluginId, 'version']),
                'version_date' => self::getData(['plugins', $pluginId, 'version_date']),
                'description' => self::getData(['plugins', $pluginId, 'description']),
                'support_url' => self::getData(['plugins', $pluginId, 'support_url']),
                'zwii_version' => self::getData(['plugins', $pluginId, 'zwii_version']),
                'updated_files' => self::getData(['plugins', $pluginId, 'updated_files']),
                'added_files' => self::getData(['plugins', $pluginId, 'added_files']),
                'updated_datas' => self::getData(['plugins', $pluginId, 'updated_datas']),
                'added_datas' => self::getData(['plugins', $pluginId, 'added_datas']),
                'status' => $newStatus
            ]
        ]);
        
        self::saveData();
    }
}