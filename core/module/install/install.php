<?php

/**
 * This file is part of Zwii.
 *
 * For full copyright and license information, please see the LICENSE
 * file that was distributed with this source code.
 *
 * @author Rémi Jean <remi.jean@outlook.com>
 * @copyright Copyright (C) 2008-2018, Rémi Jean
 * @license GNU General Public License, version 3
 * @link http://zwiicms.com/
 */

// Inclusion de la classe spécifique à la gestion des plugins
require_once 'core/core-plugins.php';

class install extends common {

	public static $actions = [
		'index' => self::GROUP_VISITOR,
		'steps' => self::GROUP_ADMIN,
		'update' => self::GROUP_ADMIN
	];

	public static $newVersion;

	/**
	 * Installation
	 */
	public function index() {
		// Accès refusé
		if($this->getData(['user']) !== []) {
			// Valeurs en sortie
			$this->addOutput([
				'access' => false
			]);
		}
		// Accès autorisé
		else {
			// Soumission du formulaire
			if($this->isPost()) {
				// Double vérification pour le mot de passe
				if($this->getInput('installPassword', helper::FILTER_STRING_SHORT, true) !== $this->getInput('installConfirmPassword', helper::FILTER_STRING_SHORT, true)) {
					self::$inputNotices['installConfirmPassword'] = 'Incorrect';
				}
				// Crée l'utilisateur
				$userFirstname = $this->getInput('installFirstname', helper::FILTER_STRING_SHORT, true);
				$userLastname = $this->getInput('installLastname', helper::FILTER_STRING_SHORT, true);
				$userMail = $this->getInput('installMail', helper::FILTER_MAIL, true);
				$userId = $this->getInput('installId', helper::FILTER_ID, true);
				$this->setData([
					'user',
					$userId,
					[
						'firstname' => $userFirstname,
						'forgot' => 0,
						'group' => self::GROUP_ADMIN,
						'lastname' => $userLastname,
						'mail' => $userMail,
						'password' => $this->getInput('installPassword', helper::FILTER_PASSWORD, true)
					]
				]);
				// Configure certaines données par défaut
				$this->setData(['module', 'blog', 'mon-premier-article', 'userId', $userId]);
				$this->setData(['module', 'blog', 'mon-deuxieme-article', 'userId', $userId]);
				$this->setData(['module', 'blog', 'mon-troisieme-article', 'userId', $userId]);
				// Envoi le mail
				$sent = $this->sendMail(
					$userMail,
					'Installation de votre site',
					'Bonjour' . ' <strong>' . $userFirstname . ' ' . $userLastname . '</strong>,<br><br>' .
					'Vous trouverez ci-dessous les détails de votre installation.<br><br>' .
					'<strong>URL du site :</strong> <a href="' . helper::baseUrl(false) . '" target="_blank">' . helper::baseUrl(false) . '</a><br>' .
					'<strong>Identifiant du compte :</strong> ' . $this->getInput('installId') . '<br>' .
					'<strong>Mot de passe du compte :</strong> ' . $this->getInput('installPassword')
				);
				// Valeurs en sortie
				$this->addOutput([
					'redirect' => helper::baseUrl(false),
					'notification' => ($sent === true ? 'Installation terminée' : $sent),
					'state' => ($sent === true ? true : null)
				]);
			}
			// Valeurs en sortie
			$this->addOutput([
				'display' => self::DISPLAY_LAYOUT_LIGHT,
				'title' => 'Installation',
				'view' => 'index'
			]);
		}
	}

	/**
	 * Étapes de mise à jour
	 */
	public function steps() {
		switch($this->getInput('step', helper::FILTER_INT)) {
			// Préparation
			case 1:
				$success = true;
				// Copie du fichier de données
				copy(self::DATA_DIR . 'core.json', self::BACKUP_DIR . date('Y-m-d', time()) . '-update.json');
				// Nettoyage des fichiers temporaires
				if(file_exists(self::TEMP_DIR . 'update.tar.gz')) {
					$success = unlink(self::TEMP_DIR . 'update.tar.gz');
				}
				if(file_exists(self::TEMP_DIR . 'update.tar')) {
					$success = unlink(self::TEMP_DIR . 'update.tar');
				}
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
				// Téléchargement depuis le serveur de Zwii
				$success = (file_put_contents(self::TEMP_DIR . 'update.tar.gz', file_get_contents('https://zwiicms.com/update/update.tar.gz')) !== false);
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
			case 3:
				$success = true;
				// Check la réécriture d'URL avant d'écraser les fichiers
				$rewrite = helper::checkRewrite();
				// Décompression et installation
				try {
					// Décompression dans le dossier de fichier temporaires
					$pharData = new PharData(self::TEMP_DIR . 'update.tar.gz');
					$pharData->decompress();
					// Installation
					$pharData->extractTo(__DIR__ . '/../../../', null, true);
				} catch (Exception $e) {
					$success = $e->getMessage();
				}
				// Valeurs en sortie
				$this->addOutput([
					'display' => self::DISPLAY_JSON,
					'content' => [
						'success' => $success,
						'data' => $rewrite
					]
				]);
				break;
			// Configuration
			case 4:
				$success = true;
				// Réécriture d'URL
				if($this->getInput('data', helper::FILTER_BOOLEAN)) {
					$success = (file_put_contents(
						'.htaccess',
						PHP_EOL .
						'<ifModule mod_rewrite.c>' . PHP_EOL .
						"\tRewriteEngine on" . PHP_EOL .
						"\tRewriteBase " . helper::baseUrl(false, false) . PHP_EOL .
						"\tRewriteCond %{REQUEST_FILENAME} !-f" . PHP_EOL .
						"\tRewriteCond %{REQUEST_FILENAME} !-d" . PHP_EOL .
						"\tRewriteRule ^(.*)$ index.php?$1 [L]" . PHP_EOL .
						'</ifModule>',
						FILE_APPEND
					) !== false);
				}
				// Valeurs en sortie
				$this->addOutput([
					'display' => self::DISPLAY_JSON,
					'content' => [
						'success' => $success,
						'data' => null
					]
				]);
				break;
                        // Re-déploiement des éventuels plugins
                        case 5:
                            $corePlugin = new CorePlugins($this);
                            $corePlugin->setActionType("deploy");
                            $errorMsg = "";

                            // Récupération des plugins qui étaient activés avant mise à jour
                            $deployedPlugins = helper::arrayColumn($this->getData(['plugins']), 'name', 'KEY_SORT_ASC');
                            foreach ($deployedPlugins as $pluginId => $pluginName) {
                                $corePlugin->setIdPlugin($pluginId);
                                $status = $this->getData(['plugins', $pluginId, 'status']);
                                if ($status == CorePlugins::IS_ACTIVATE) {
                                    // Il faut tenter de réinstaller le plugin
                                    $success = true;
                                    $status = "";

                                    // 1- Vérifier que le plugin est correctement constitué
                                    $success = $corePlugin->checkPluginStructure($msg);

                                    if ($success) {
                                        // 2- Vérifier que le plugin peut-être déployé
                                        $success = $corePlugin->checkBefore($msg);
                                    } else {
                                        $status = CorePlugins::IS_NOT_APPLICABLE;
                                    }

                                    if ($success) {
                                        // 3- Déployer le plugin
                                        $success = $corePlugin->backup();
                                        $success = $corePlugin->execute($msg);
                                        if (!$success) {
                                            $status = CorePlugins::ON_ERROR;
                                        }
                                    } else {
                                        $status = CorePlugins::IS_NOT_APPLICABLE;
                                    }

                                    if (!$success) {
                                        // Désactiver le plugin en base mais pas générer d'erreur, juste un warning
                                        $corePlugin->changePluginStatus(CorePlugins::IS_NOT_APPLICABLE);
                                        $errorMsg .= "Le plugin {" . $pluginId . "} ne peut pas être déployé sur cette nouvelle version. ";
                                        $success = true;
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
		}
	}

	/**
	 * Mise à jour
	 */
	public function update() {
		// Nouvelle version
		self::$newVersion = file_get_contents('http://zwiicms.com/update/version');
		// Valeurs en sortie
		$this->addOutput([
			'display' => self::DISPLAY_LAYOUT_LIGHT,
			'title' => 'Mise à jour',
			'view' => 'update'
		]);
	}

}