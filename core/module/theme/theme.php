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
 * @copyright  :  Frédéric Tempez <frederic.tempez@outlook.com>
 * @copyright Copyright (C) 2018-2019, Frédéric Tempez
 */

class theme extends common {

	public static $actions = [
		'advanced' => self::GROUP_ADMIN,
		'body' => self::GROUP_ADMIN,
		'footer' => self::GROUP_ADMIN,
		'header' => self::GROUP_ADMIN,
		'index' => self::GROUP_ADMIN,
		'menu' => self::GROUP_ADMIN,
		'reset' => self::GROUP_ADMIN,
		'site' => self::GROUP_ADMIN,
		'manage' => self::GROUP_ADMIN,
		'export' => self::GROUP_ADMIN,
		'save' => self::GROUP_ADMIN
	];
	public static $aligns = [
		'left' => 'À gauche',
		'center' => 'Au centre',
		'right' => 'À droite'
	];
	public static $attachments = [
		'scroll' => 'Standard',
		'fixed' => 'Fixe'
	];
	public static $fonts = [
		'Abril+Fatface' => 'Abril Fatface',
		'Arimo' => 'Arimo',
		'Arvo' => 'Arvo',
		'Berkshire+Swash' => 'Berkshire Swash',
		'Cabin' => 'Cabin',
		'Dancing+Script' => 'Dancing Script',
		'Droid+Sans' => 'Droid Sans',
		'Droid+Serif' => 'Droid Serif',
		'Fira+Sans' => 'Fira Sans',
		'Inconsolata' => 'Inconsolata',
		'Indie+Flower' => 'Indie Flower',
		'Josefin+Slab' => 'Josefin Slab',
		'Lobster' => 'Lobster',
		'Lora' => 'Lora',
		'Lato' => 'Lato',
		'Marvel' => 'Marvel',
		'Old+Standard+TT' => 'Old Standard TT',
		'Open+Sans' => 'Open Sans',
		'Oswald' => 'Oswald',
		'PT+Mono' => 'PT Mono',
		'PT+Serif' => 'PT Serif',
		'Raleway' => 'Raleway',
		'Rancho' => 'Rancho',
		'Roboto' => 'Roboto',
		'Signika' => 'Signika',
		'Ubuntu' => 'Ubuntu',
		'Vollkorn' => 'Vollkorn'
	];
	public static $footerblocks = [
		'hide' => 'Masqué',
		'left' => 'Bloc Gauche',
		'center' => 'Bloc Central',
		'right' => 'Bloc Droite'
	];
	public static $fontWeights = [
		'normal' => 'Maigre',
		'bold' => 'Gras'
	];
	public static $footerHeights = [
		'5px' => 'Très petite (5 pixels)',
		'10px' => 'Petite (10 pixels)',
		'20px' => 'Moyenne (20 pixels)',
		'35px' => 'Grande (35 pixels)',
		'40px' => 'Très grande (40 pixels)'
	];
	public static $footerPositions = [
		'hide' => 'Cachée',
		'site' => 'Dans le site',
		'body' => 'En dessous du site'
	];
	public static $footerFontSizes = [
		'.5em' => 'Microscopique (50%)',
		'.6em' => 'Minuscule (60%)',
		'.7em' => 'Infime (70%)',
		'.8em' => 'Très petite (80%)',
		'.9em' => 'Petite (90%)',
		'1em' => 'Standard (100%)',
	];	
	public static $headerFontSizes = [
		'1.6em' => 'Très petite (160%)',
		'1.8em' => 'Petite (180%)',
		'2em' => 'Moyenne (200%)',
		'2.2em' => 'Grande (220%)',
		'2.4vmax' => 'Très grande (240%)'
	];
	public static $headerHeights = [
		'100px' => 'Très petite (100 pixels)',
		'150px' => 'Petite (150 pixels)',
		'200px' => 'Moyenne (200 pixels)',
		'300px' => 'Grande (300 pixels)',
		'400px' => 'Très grande (400 pixels)'
	];
	public static $headerPositions = [
		'body' => 'Au dessus du site',
		'site' => 'Dans le site',
		'hide' => 'Cachée'
	];
	public static $imagePositions = [
		'top left' => 'En haut à gauche',
		'top center' => 'En haut au centre',
		'top right' => 'En haut à droite',
		'center left' => 'Au milieu à gauche',
		'center center' => 'Au milieu au centre',
		'center right' => 'Au milieu à droite',
		'bottom left' => 'En bas à gauche',
		'bottom center' => 'En bas au centre',
		'bottom right' => 'En bas à droite'
	];
	public static $menuFontSizes = [
		'.8em' => 'Très petite (80%)',
		'.9em' => 'Petite (90%)',
		'1em' => 'Standard (100%)',
		'1.1em' => 'Moyenne (110%)',
		'1.2em' => 'Grande (120%)',
		'1.3em' => 'Très grande (130%)'
	];
	public static $menuHeights = [
		'5px 10px' => 'Très petite (5 pixels)',
		'10px' => 'Petite (10 pixels)',
		'15px 10px' => 'Moyenne (15 pixels)',
		'20px 15px' => 'Grande (20 pixels)',
		'25px 15px' => 'Très grande (25 pixels)'
	];
	public static $menuPositionsSite = [
		'top' => 'En-dehors du site',		
		'site-first' => 'Avant la bannière',
		'site-second' => 'Après la bannière',
		'hide' => 'Caché'
	];
	public static $menuPositionsBody = [
		'top' => 'En-dehors du site',
		'body-first' => 'Avant la bannière',
		'body-second' => 'Après la bannière',
		'site' => 'Dans le site',
		'hide' => 'Caché'
	];
	public static $radius = [
		'0' => 'Aucun',
		'5px' => 'Très léger',
		'10px' => 'Léger',
		'15px' => 'Moyen',
		'25px' => 'Important',
		'50px' => 'Très important'
	];
	public static $repeats = [
		'no-repeat' => 'Ne pas répéter',
		'repeat-x' => 'Sur l\'axe horizontal',
		'repeat-y' => 'Sur l\'axe vertical',
		'repeat' => 'Sur les deux axes'
	];
	public static $shadows = [
		'0' => 'Aucune',
		'1px 1px 5px' => 'Très légère',
		'1px 1px 10px' => 'Légère',
		'1px 1px 15px' => 'Moyenne',
		'1px 1px 25px' => 'Importante',
		'1px 1px 50px' => 'Très importante'
	];
	public static $siteFontSizes = [
		'12px' => '12 pixels',
		'13px' => '13 pixels',
		'14px' => '14 pixels',
		'15px' => '15 pixels',
		'16px' => '16 pixels'
	];
	public static $sizes = [
		'auto' => 'Automatique',
		'cover' => 'Responsive',
		'100% 100%' => 'Image étirée'		
	];
	public static $textTransforms = [
		'none' => 'Standard',
		'lowercase' => 'Minuscules',
		'uppercase' => 'Majuscules',
		'capitalize' => 'Majuscule à chaque mot'		
	];
	public static $widths = [
		'750px' => 'Petite (750 pixels)',
		'960px' => 'Moyenne (960 pixels)',
		'1170px' => 'Grande (1170 pixels)',
		'100%' => 'Fluide (100%)'
	];
	public static $headerWide = [	
		'auto auto' => 'Automatique',
		//'contain' => 'Responsive (contain)',		
		'cover' => 'Responsive',
		'100% 100%' => 'Image étirée',
	];


	/**
	 * Mode avancé
	 */
	public function advanced() {
		// Soumission du formulaire
		if($this->isPost()) {
			// Enregistre le CSS
			file_put_contents(self::DATA_DIR.'custom.css', $this->getInput('themeAdvancedCss', null));
			// Valeurs en sortie
			$this->addOutput([
				'notification' => 'Modifications enregistrées',
				'redirect' => helper::baseUrl() . 'theme/advanced',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Éditeur CSS',
			'vendor' => [
				'codemirror'
			],
			'view' => 'advanced'
		]);
	}

	/**
	 * Options de l'arrière plan
	 */
	public function body() {
		// Soumission du formulaire
		if($this->isPost()) {
			$this->setData(['theme', 'body', [
				'backgroundColor' => $this->getInput('themeBodyBackgroundColor'),
				'image' => $this->getInput('themeBodyImage'),
				'imageAttachment' => $this->getInput('themeBodyImageAttachment'),
				'imagePosition' => $this->getInput('themeBodyImagePosition'),
				'imageRepeat' => $this->getInput('themeBodyImageRepeat'),
				'imageSize' => $this->getInput('themeBodyImageSize')
			]]);
			// Valeurs en sortie
			$this->addOutput([
				'notification' => 'Modifications enregistrées',
				'redirect' => helper::baseUrl() . 'theme',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Personnalisation de l\'arrière plan',
			'vendor' => [
				'tinycolorpicker'
			],
			'view' => 'body'
		]);
	}

	/**
	 * Options du pied de page
	 */
	public function footer() {
		// Soumission du formulaire
		if($this->isPost()) {
			$this->setData(['theme', 'footer', [
				'backgroundColor' => $this->getInput('themeFooterBackgroundColor'),
				'copyrightAlign' => $this->getInput('themeFooterCopyrightAlign'),
				'height' => $this->getInput('themeFooterHeight'),
				'loginLink' => $this->getInput('themeFooterLoginLink'),
				'margin' => $this->getInput('themeFooterMargin', helper::FILTER_BOOLEAN),
				'position' => $this->getInput('themeFooterPosition'),
				'socialsAlign' => $this->getInput('themeFooterSocialsAlign'),
				'text' => $this->getInput('themeFooterText', null),
				'textAlign' => $this->getInput('themeFooterTextAlign'),
				'textColor' => $this->getInput('themeFooterTextColor'),
				'copyrightPosition' => $this->getInput('themeFooterCopyrightPosition'),
				'textPosition' => $this->getInput('themeFooterTextPosition'),
				'socialsPosition' => $this->getInput('themeFooterSocialsPosition'),
				'textTransform' => $this->getInput('themeFooterTextTransform'),						
				'font' => $this->getInput('themeFooterFont'),
				'fontSize' => $this->getInput('themeFooterFontSize'),
				'fontWeight' => $this->getInput('themeFooterFontWeight')
			]]);
			// Valeurs en sortie
			$this->addOutput([
				'notification' => 'Modifications enregistrées',
				'redirect' => helper::baseUrl() . 'theme',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Personnalisation du pied de page',
			'vendor' => [
				'tinycolorpicker'
			],
			'view' => 'footer'
		]);
	}

	/**
	 * Options de la bannière
	 */
	public function header() {
		// Soumission du formulaire
		if($this->isPost()) {
			// Si une image est positionnée, l'arrière en transparent.
			$this->setData(['theme', 'header', [
				'backgroundColor' => $this->getInput('themeHeaderBackgroundColor'),					
				'font' => $this->getInput('themeHeaderFont'),
				'fontSize' => $this->getInput('themeHeaderFontSize'),
				'fontWeight' => $this->getInput('themeHeaderFontWeight'),
				'height' => $this->getInput('themeHeaderHeight'),
				'image' => $this->getInput('themeHeaderImage'),
				'imagePosition' => $this->getInput('themeHeaderImagePosition'),
				'imageRepeat' => $this->getInput('themeHeaderImageRepeat'),
				'margin' => $this->getInput('themeHeaderMargin', helper::FILTER_BOOLEAN),
				'position' => $this->getInput('themeHeaderPosition'),
				'textAlign' => $this->getInput('themeHeaderTextAlign'),
				'textColor' => $this->getInput('themeHeaderTextColor'),
				'textHide' => $this->getInput('themeHeaderTextHide', helper::FILTER_BOOLEAN),
				'textTransform' => $this->getInput('themeHeaderTextTransform'),
				'textHide' => $this->getInput('themeHeaderTextHide', helper::FILTER_BOOLEAN),		
				'linkHome' => $this->getInput('themeHeaderlinkHome',helper::FILTER_BOOLEAN),
				'imageContainer' => $this->getInput('themeHeaderImageContainer')
			]]);
			// Modification de la position du menu selon la position de la bannière
			switch ($this->getInput('themeHeaderPosition')) {
				case 'site' :
					$position = str_replace ('body','site',$this->getData(['theme','menu','position']));					
				break;
				case 'body' :
					$position = str_replace ('site','body',$this->getData(['theme','menu','position']));
				break;
				default:
					$position = $this->getData(['theme','menu','position']);					
			}
			$this->setData(['theme', 'menu', [
				'backgroundColor' => $this->getData(['theme', 'menu', 'backgroundColor']),
				'font' => $this->getData(['theme', 'menu', 'font']),				
				'fontSize' => $this->getData(['theme', 'menu', 'fontSize']),
				'fontWeight' => $this->getData(['theme', 'menu', 'fontWeight']),
				'height' => $this->getData(['theme', 'menu', 'height']),
				'loginLink' => $this->getData(['theme', 'menu', 'loginLink']),
				'margin' => $this->getData(['theme', 'menu', 'margin']),
				'position' => $position,
				'textAlign' => $this->getData(['theme', 'menu', 'textAlign']),
				'textColor' => $this->getData(['theme', 'menu', 'textColor']),
				'textTransform' => $this->getData(['theme','menu','textTransform']),
				'fixed' => $this->getData(['theme','menu','fixed'])	
			]]);
			// Valeurs en sortie
			$this->addOutput([
				'notification' => 'Modifications enregistrées',
				'redirect' => helper::baseUrl() . 'theme',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Personnalisation de la bannière',
			'vendor' => [
				'tinycolorpicker'
			],
			'view' => 'header'
		]);
	}

	/**
	 * Accueil de la personnalisation
	 */
	public function index() {
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Personnalisation du thème',
			'view' => 'index'
		]);
	}

	/**
	 * Options du menu
	 */
	public function menu() {
		// Soumission du formulaire
		if($this->isPost()) {
			$this->setData(['theme', 'menu', [
				'backgroundColor' => $this->getInput('themeMenuBackgroundColor'),
				'font' => $this->getInput('themeMenuFont'),
				'fontSize' => $this->getInput('themeMenuFontSize'),
				'fontWeight' => $this->getInput('themeMenuFontWeight'),
				'height' => $this->getInput('themeMenuHeight'),
				'loginLink' => $this->getInput('themeMenuLoginLink', helper::FILTER_BOOLEAN),
				'margin' => $this->getInput('themeMenuMargin', helper::FILTER_BOOLEAN),
				'position' => $this->getInput('themeMenuPosition'),
				'textAlign' => $this->getInput('themeMenuTextAlign'),
				'textColor' => $this->getInput('themeMenuTextColor'),
				'textTransform' => $this->getInput('themeMenuTextTransform'),
				'fixed' => $this->getInput('themeMenuFixed', helper::FILTER_BOOLEAN)
			]]);
			// Valeurs en sortie
			$this->addOutput([
				'notification' => 'Modifications enregistrées',
				'redirect' => helper::baseUrl() . 'theme',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Personnalisation du menu',
			'vendor' => [
				'tinycolorpicker'
			],
			'view' => 'menu'
		]);
	}

	/**
	 * Réinitialisation de la personnalisation avancée
	 */
	public function reset() {
		// Supprime le fichier de personnalisation avancée
		unlink(self::DATA_DIR.'custom.css');
		// Valeurs en sortie
		$this->addOutput([
			'notification' => 'Personnalisation avancée réinitialisée',
			'redirect' => helper::baseUrl() . 'theme/advanced',
			'state' => true
		]);
	}

	/**
	 * Options du site
	 */
	public function site() {
		// Soumission du formulaire
		if($this->isPost()) {
			$this->setData(['theme', 'title', [
				'font' => $this->getInput('themeTitleFont'),
				'textColor' => $this->getInput('themeTitleTextColor'),
				'fontWeight' => $this->getInput('themeTitleFontWeight'),
				'textTransform' => $this->getInput('themeTitleTextTransform')
			]]);
			$this->setData(['theme', 'button', 'backgroundColor', $this->getInput('themeButtonBackgroundColor')]);
			$this->setData(['theme', 'link', 'textColor', $this->getInput('themeLinkTextColor')]);
			$this->setData(['theme', 'text', [
				'font' => $this->getInput('themeTextFont'),
				'fontSize' => $this->getInput('themeTextFontSize'),
				'textColor' => $this->getInput('themeTextTextColor'),
			]]);
			$this->setData(['theme', 'site', [
				'backgroundColor' => $this->getInput('themeSiteBackgroundColor'),
				'radius' => $this->getInput('themeSiteRadius'),
				'shadow' => $this->getInput('themeSiteShadow'),
				'width' => $this->getInput('themeSiteWidth')
			]]);
			// Valeurs en sortie
			$this->addOutput([
				'notification' => 'Modifications enregistrées',
				'redirect' => helper::baseUrl() . 'theme',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Personnalisation du site',
			'vendor' => [
				'tinycolorpicker',
				'tinymce'
			],
			'view' => 'site'
		]);
	}

	/**
	 * Import du thème
	 */
	public function manage() {
		if($this->isPost() ) {
			$zipFilename =	$this->getInput('themeManageImport', helper::FILTER_STRING_SHORT, true);
			$zip = new ZipArchive();
			if ($zip->open(self::FILE_DIR.'source/'.$zipFilename) === TRUE) {
				$zip->extractTo('.');
				$zip->close();
			// Valeurs en sortie
			$this->addOutput([
				'redirect' => helper::baseUrl() . 'theme'
			]);
			} else {
				$this->addOutput([
					'notification' => 'Erreur avec le thème <b>'.$zipFilename.'</b>',
					'redirect' => helper::baseUrl() . 'theme/manage'
				]);
			}
		}
	
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Gestion des thèmes',
			'view' => 'manage'
		]);
	}


	/**
	 * Export du thème
	 */
	public function export() {
		// Make zip
			$zipFilename = $this->makezip();
			// Téléchargement du ZIP
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Transfer-Encoding: binary');
			header('Content-Disposition: attachment; filename="' . $zipFilename . '"');
			header('Content-Length: ' . filesize(self::TEMP_DIR . $zipFilename));
			readfile(self::TEMP_DIR . $zipFilename);
			// Nettoyage du dossier
			unlink (self::TEMP_DIR . $zipFilename);
			die();
	}

	/**
	 * Export du thème
	 */
	public function save() {
		// Make zip
		$zipFilename = $this->makezip();
		// Téléchargement du ZIP
		mkdir(self::FILE_DIR.'source/theme');
		copy (self::TEMP_DIR . $zipFilename , self::FILE_DIR.'source/theme/' . $zipFilename);
		// Nettoyage du dossier
		unlink (self::TEMP_DIR . $zipFilename);
		// Valeurs en sortie
		$this->addOutput([
			'notification' => 'Archive <b>'.$zipFilename.'</b> sauvegardée dans fichiers',
			'redirect' => helper::baseUrl() . 'theme/manage',
			'state' => true
		]);
	}

	/**
	 * construction du zip
	 */
	public function makezip() {
		// Creation du dossier
		// $zipFilename  =  'theme-'.date('dmY').'-'.date('hm').'-'.rand(10,99).'.zip';
		$zipFilename  =  'theme  '.date('d m Y').'  '.date('H i s ').'.zip';
		$zip = new ZipArchive();
		if ($zip->open('site/tmp/' . $zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE ) === TRUE) {
			$zip->addFile(self::DATA_DIR.'theme.json','site/data/theme.json');
			$zip->addFile(self::DATA_DIR.'theme.json','site/data/theme.css');
			$zip->addFile(self::DATA_DIR.'theme.json','site/data/custom.css');
			if ($this->getData(['theme','body','image']) !== '' ) {
			$zip->addFile(self::FILE_DIR.'source/'.$this->getData(['theme','body','image']),
						self::FILE_DIR.'source/'.$this->getData(['theme','body','image'])
						);
			}
			if ($this->getData(['theme','header','image']) !== '' ) {
			$zip->addFile(self::FILE_DIR.'source/'.$this->getData(['theme','header','image']),
						  self::FILE_DIR.'source/'.$this->getData(['theme','header','image'])
						);
			}
			$ret = $zip->close();
		}
		return ($zipFilename);
	}
}