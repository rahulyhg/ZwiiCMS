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
 * @author Frédéric Tempez <frederic.tempez@outlook.com>
 * @copyright Copyright (C) 2018-2019, Frédéric Tempez
 * @link http://zwiicms.com/
 */

class common {

	const DISPLAY_RAW = 0;
	const DISPLAY_JSON = 1;
	const DISPLAY_LAYOUT_BLANK = 2;
	const DISPLAY_LAYOUT_MAIN = 3;
	const DISPLAY_LAYOUT_LIGHT = 4;
	const GROUP_BANNED = -1;
	const GROUP_VISITOR = 0;
	const GROUP_MEMBER = 1;
	const GROUP_MODERATOR = 2;
	const GROUP_ADMIN = 3;
	// Numéro de version de développement :
	// Désactive l'update auto
	// const ZWII_VERSION = '9.0.00-dev27';
	// Numéro de version stable
	const ZWII_VERSION = '9.0.04';


	public static $actions = [];
	public static $coreModuleIds = [
		'config',
		'install',
		'maintenance',
		'page',
		'sitemap',
		'theme',
		'user'
	];
	private $data = [];
	private $defaultData = [
		'config' => [
			'analyticsId' => '',
			'autoBackup' => true,
			'cookieConsent' => true,
			'favicon' => 'favicon.ico',
			'homePageId' => 'accueil',
			'maintenance' => false,
			'metaDescription' => 'Zwii est un CMS sans base de données qui permet à ses utilisateurs de créer et gérer facilement un site web sans aucune connaissance en programmation.',
			'social' => [
				'facebookId' => 'ZwiiCMS',
				'instagramId' => '',
				'pinterestId' => '',
				'twitterId' => '',
				'youtubeId' => ''
			],
			'timezone' => 'Europe/Paris',
			'title' => 'Zwii, votre site en quelques clics !',
			'itemsperPage' => 10
		],
		'core' => [
			'dataVersion' => 0,
			'lastBackup' => 0,
			'lastClearTmp' => 0
		],
		'page' => [
			'accueil' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<h3>Bienvenue sur votre nouveau site Zwii !</h3>
							  <p><strong>Un email contenant le récapitulatif de votre installation vient de vous être envoyé.</strong></p>
							  <p>Connectez-vous dès maintenant à votre espace membre afin de créer un site à votre image ! Vous allez pouvoir personnaliser le thème, créer des pages, ajouter des utilisateurs et bien plus encore !</p>
							  <p>Si vous avez besoin d\'aide ou si vous cherchez des informations sur Zwii, n\'hésitez pas à jeter un œil à notre <a title="Forum" href="http://forum.zwiicms.com/">forum</a>.</p>',
				'hideTitle' => false,
				'breadCrumb' => false,
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => '',
				'modulePosition' => 'bottom',
				'parentPageId' => '',
				'position' => 1,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => false,
				'title' => 'Accueil',
				'block' => '12',
				'barLeft' => '',
				'barRight' => ''
			],
			'enfant' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<p>Vous pouvez assigner des parents à vos pages afin de mieux organiser votre menu !</p>
							<div class="row">
							  <div class="col4"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum, neque non vulputate hendrerit, arcu turpis dapibus nisl, id scelerisque metus lectus vitae nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec feugiat dolor et turpis finibus condimentum. Cras sit amet ligula sagittis justo.</p></div>
							  <div class="col4"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum, neque non vulputate hendrerit, arcu turpis dapibus nisl, id scelerisque metus lectus vitae nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec feugiat dolor et turpis finibus condimentum. Cras sit amet ligula sagittis justo.</p></div>
							  <div class="col4"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum, neque non vulputate hendrerit, arcu turpis dapibus nisl, id scelerisque metus lectus vitae nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec feugiat dolor et turpis finibus condimentum. Cras sit amet ligula sagittis justo.</p></div>
							</div>',
				'hideTitle' => false,
				'breadCrumb' => true,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => '',
				'modulePosition' => 'bottom',
				'parentPageId' => 'accueil',
				'position' => 1,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => false,
				'title' => 'Enfant',
				'block' => '12',
				'barLeft' => '',
				'barRight' => ''
			],
			'cachee' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<p>Cette page n\'est visible que par les membres de votre site !</p>
							<div class="row">
								<div class="col6"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum, neque non vulputate hendrerit, arcu turpis dapibus nisl, id scelerisque metus lectus vitae nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec feugiat dolor et turpis finibus condimentum. Cras sit amet ligula sagittis justo.</p></div>
								<div class="col6"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam interdum, neque non vulputate hendrerit, arcu turpis dapibus nisl, id scelerisque metus lectus vitae nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec feugiat dolor et turpis finibus condimentum. Cras sit amet ligula sagittis justo.</p></div>
							</div>',
				'hideTitle' => false,
				'breadCrumb' => true,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => '',
				'parentPageId' => '',
				'modulePosition' => 'bottom',
				'position' => 2,
				'group' => self::GROUP_MEMBER,
				'targetBlank' => false,
				'title' => 'Cachée',
				'block' => '12',
				'barLeft' => '',
				'barRight' => ''
			],
			'mise-en-page' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<p>Vous pouvez ajouter une ou deux barres latérales aux pages de votre site. Cette mise en page se définit dans les paramètres de page et peut s\'appliquer à l\'ensemble du site ou à certaines pages en particulier, au gré de vos désirs.</p>
							<p>Pour créer une barre latérale à partir d\'une "Nouvelle page" ou transformer une page existante en barre latérale, sélectionnez l\'option dans la liste des gabarits. On peut bien sûr définir autant de barres latérales qu\'on le souhaite.</p>
							<p>Cette nouvelle fonctionnalité autorise toutes sortes d\'utilisations : texte, encadrés, images, vidéos... ou simple marge blanche. Seule restriction : on ne peut pas installer un module dans une barre latérale.</p>
							<p>La liste des barres disponibles et leur emplacement s\'affichent en fonction du gabarit que vous aurez choisi.',
				'hideTitle' => false,
				'breadCrumb' => true,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => '',
				'parentPageId' => 'accueil',
				'modulePosition' => 'bottom',
				'position' => 3,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => false,
				'title' => 'Mise en page',
				'block' => '8-4',
				'barLeft' => '',
				'barRight' => 'barre'

			],			
			'blog' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<p>Cette page contient une instance du module de blog. Cliquez sur un article afin de le lire et de poster des commentaires.</p>',
				'hideTitle' => false,
				'breadCrumb' => false,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => 'blog',
				'modulePosition' => 'bottom',
				'parentPageId' => '',
				'position' => 4,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => false,
				'title' => 'Blog',
				'block' => '12',
				'barLeft' => '',
				'barRight' => ''				
			],
			'galeries' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<p>Cette page contient une instance du module de galeries photos. Cliquez sur la galerie ci-dessous afin de voir les photos qu\'elle contient.</p>',
				'hideTitle' => false,
				'breadCrumb' => false,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => 'gallery',
				'modulePosition' => 'bottom',
				'parentPageId' => '',
				'position' => 5,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => false,
				'title' => 'Galeries',
				'block' => '12',
				'barLeft' => '',
				'barRight' => ''				
			],
			'site-de-zwii' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => "",
				'hideTitle' => false,
				'breadCrumb' => false,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => 'redirection',
				'modulePosition' => 'bottom',
				'parentPageId' => '',
				'position' => 6,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => true,
				'title' => 'Site de Zwii',
				'block' => '12',
				'barLeft' => '',
				'barRight' => ''				
			],
			'contact' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<p>Cette page contient un exemple de formulaire conçu à partir du module de génération de formulaires. Il est configuré pour envoyer les données saisies par mail aux administrateurs du site.</p>',
				'hideTitle' => false,
				'breadCrumb' => false,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => 'form',
				'modulePosition' => 'bottom',
				'parentPageId' => '',
				'position' => 7,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => false,
				'title' => 'Contact',
				'block' => '12',
				'barLeft' => '',
				'barRight' => ''				
			],
			'barre' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<div class="block"><h4>ZwiiCMS</h4><h3>Le CMS sans base de données à l\'installation simple et rapide</p></h3></div>',
				'hideTitle' => false,
				'breadCrumb' => false,				
				'metaDescription' => '',
				'metaTitle' => '',
				'moduleId' => '',
				'modulePosition' => 'bottom',
				'parentPageId' => '',
				'position' => 0 ,
				'group' => self::GROUP_VISITOR,
				'targetBlank' => false,
				'title' => 'Barre latérale',
				'block' => 'bar',
				'barLeft' => '',
				'barRight' => ''
			],
		],
		'module' => [
			'blog' => [
				'mon-premier-article' => [
					'closeComment' => false,
					'comment' => [
						'58e11d09e5aff' => [
							'author' => 'Rémi',
							'content' => 'Article bien rédigé et très pertinent, bravo !',
							'createdOn' => 1421748000,
							'userId' => ''
						]
					],
					'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat metus. Morbi luctus laoreet dolor et euismod. Phasellus eget eros ac eros pretium tincidunt. Sed maximus magna lectus, non vestibulum sapien pretium maximus. Donec convallis leo tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras convallis lacus eu risus gravida varius. Etiam mattis massa vitae eros placerat bibendum.</p>\r\n<p>Vivamus tempus magna augue, in bibendum quam blandit at. Morbi felis tortor, suscipit ut ipsum ut, volutpat consectetur orci. Nulla tincidunt quis ligula non viverra. Sed pretium dictum blandit. Donec fringilla, nunc at dictum pretium, arcu massa viverra leo, et porta turpis ipsum eget risus. Quisque quis maximus purus, in elementum arcu. Donec nisi orci, aliquam non luctus non, congue volutpat massa. Curabitur sed risus congue, porta arcu vel, tincidunt nisi. Duis tincidunt quam ut velit maximus ornare. Nullam sagittis, ante quis pharetra hendrerit, lorem massa dapibus mi, a hendrerit dolor odio nec augue. Nunc sem nisl, tincidunt vitae nunc et, viverra tristique diam. In eget dignissim lectus. Nullam volutpat lacus id ex dapibus viverra. Pellentesque ultricies lorem ut nunc elementum volutpat. Cras id ultrices justo.</p>\r\n<p>Phasellus nec erat leo. Praesent at sem nunc. Vestibulum quis condimentum turpis. Cras semper diam vitae enim fringilla, ut fringilla mauris efficitur. In nec porttitor urna. Nam eros leo, vehicula eget lobortis sed, gravida id mauris. Nulla bibendum nunc tortor, non bibendum justo consectetur vel. Phasellus nec risus diam. In commodo tellus nec nulla fringilla, nec feugiat nunc consectetur. Etiam non eros sodales, sodales lacus vel, finibus leo. Quisque hendrerit tristique congue. Phasellus nec augue vitae libero elementum facilisis. Mauris pretium ornare nisi, non scelerisque velit consectetur sit amet.</p>',
					'picture' => 'galerie/landscape/meadow.jpg',
					'hidePicture' => false,					
					'publishedOn' => 1548790902,
					'state' => true,
					'title' => 'Mon premier article',
					'userId' => '' // Géré au moment de l'installation
				],
				'mon-deuxieme-article' => [
					'closeComment' => false,
					'comment' => [],
					'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lobortis eros pharetra metus rutrum pretium et sagittis mauris. Donec commodo venenatis sem nec suscipit. In tempor sollicitudin scelerisque. Etiam quis nibh eleifend, congue nisl quis, ultricies ipsum. Integer at est a eros vulputate pellentesque eu vitae tellus. Nullam suscipit quam nisl. Vivamus dui odio, luctus ac fringilla ultrices, eleifend vel sapien. Integer sem ex, lobortis eu mattis eu, condimentum non libero. Aliquam non porttitor elit, eu hendrerit neque. Praesent tortor urna, tincidunt sed dictum id, rutrum tempus sapien.</p>\r\n<p>Donec accumsan ante ac odio laoreet porttitor. Pellentesque et leo a leo scelerisque mattis id vel elit. Quisque egestas congue enim nec semper. Morbi mollis nibh sapien. Nunc quis fringilla lorem. Donec vel venenatis nunc. Donec lectus velit, tempor sit amet dui sed, consequat commodo enim. Nam porttitor neque semper, dapibus nunc bibendum, lobortis urna. Morbi ullamcorper molestie lectus a elementum. Curabitur eu cursus orci, sed tristique justo. In massa lacus, imperdiet eu elit quis, consectetur maximus magna. Integer suscipit varius ante vitae egestas. Morbi scelerisque fermentum ipsum, euismod faucibus mi tincidunt id. Sed at consectetur velit. Ut fermentum nunc nibh, at commodo felis lacinia nec.</p>\r\n<p>Nullam a justo quis lectus facilisis semper eget quis sem. Morbi suscipit erat sem, non fermentum nunc luctus vel. Proin venenatis quam ut arcu luctus efficitur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam sollicitudin tristique nunc nec convallis. Maecenas id tortor semper, tempus nisl laoreet, cursus lacus. Aliquam sagittis est in leo congue, a pharetra felis aliquet. Nulla gravida lobortis sapien, quis viverra enim ullamcorper sed. Donec ultrices sem eu volutpat dapibus. Nam euismod, tellus eu congue mollis, massa nisi finibus odio, vitae porta arcu urna ac lorem. Sed faucibus dignissim pretium. Pellentesque eget ante tellus. Pellentesque a elementum odio, sit amet vulputate diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hendrerit consequat dolor, malesuada pellentesque tellus molestie non. Aenean quis purus a lectus pellentesque laoreet.</p>',
					'picture' => 'galerie/landscape/desert.jpg',
					'hidePicture' => false,					
					'publishedOn' => 1550432502,
					'state' => true,
					'title' => 'Mon deuxième article',
					'userId' => '' // Géré au moment de l'installation
				],
				'mon-troisieme-article' => [
					'closeComment' => true,
					'comment' => [],
					'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut tempus nibh. Cras eget iaculis justo, ac laoreet lacus. Nunc tellus nulla, auctor id hendrerit eu, pellentesque in sapien. In hac habitasse platea dictumst. Aliquam leo urna, hendrerit id nunc eget, finibus maximus dolor. Sed rutrum sapien consectetur, tincidunt nulla at, blandit quam. Duis ex enim, vehicula vel nisi vitae, lobortis volutpat nisl. Vivamus enim libero, euismod nec risus vel, interdum placerat elit. In cursus sapien condimentum dui imperdiet, sed lobortis ante consectetur. Maecenas hendrerit eget felis non consequat.</p>\r\n<p>Nullam nec risus non velit efficitur tempus eget tincidunt mauris. Etiam venenatis leo id justo sagittis, commodo dignissim sapien tristique. Vivamus finibus augue malesuada sapien gravida rutrum. Integer mattis lectus ac pulvinar scelerisque. Integer suscipit feugiat metus, ac molestie odio suscipit eget. Fusce at elit in tellus venenatis finibus id sit amet magna. Integer sodales luctus neque blandit posuere. Cras pellentesque dictum lorem eget vestibulum. Quisque vitae metus non nisi efficitur rhoncus ut vitae ipsum. Donec accumsan massa at est faucibus lacinia. Quisque imperdiet luctus neque eu vestibulum. Phasellus pellentesque felis ligula, id imperdiet elit ultrices eu.</p>',
					'picture' => 'galerie/landscape/iceberg.jpg',
					'hidePicture' => false,					
					'publishedOn' => 1550864502,
					'state' => true,
					'title' => 'Mon troisième article',
					'userId' => '' // Géré au moment de l'installation
				]
			],
			'galeries' => [
				'beaux-paysages' => [
					'config' => [
						'name' => 'Beaux paysages',
						'directory' => 'site/file/source/galerie/landscape'
					],
					'legend' => [
						'desert.jpg' => 'Un désert',
						'iceberg.jpg' => 'Un iceberg',
						'meadow.jpg' => 'Une prairie'
					]
				],
				'espace' => [
					'config' => [
						'name' => 'Espace',
						'directory' => 'site/file/source/galerie/space'
					],
					'legend' => [
						'earth.jpg' => 'La Terre et la Lune',
						'cosmos.jpg' => 'Le cosmos',
						'nebula.jpg' => 'Une nébuleuse'
					]
				]
			],
			'site-de-zwii' => [
				'url' => 'http://zwiicms.com/',
				'count' => 0
			],
			'contact' => [
				'config' => [
					'button' => '',
					'capcha' => true,
					'group' => self::GROUP_ADMIN,
					'pageId' => '',
					'subject' => ''
				],
				'data' => [],
				'input' => [
					[
						'name' => 'Adresse mail',
						'position' => 1,
						'required' => true,
						'type' => 'mail',
						'values' => ''
					],
					[
						'name' => 'Sujet',
						'position' => 2,
						'required' => true,
						'type' => 'text',
						'values' => ''
					],
					[
						'name' => 'Message',
						'position' => 3,
						'required' => true,
						'type' => 'textarea',
						'values' => ''
					]
				]
			]
		],
		'user' => [],
		'theme' =>  [
			'body' => [
				'backgroundColor' => 'rgba(236, 239, 241, 1)',
				'image' => '',
				'imageAttachment' => 'scroll',
				'imageRepeat' => 'no-repeat',
				'imagePosition' => 'top center',
				'imageSize' => 'auto'
			],
			'button' => [
				'backgroundColor' => 'rgba(74, 105, 189, 1)'
			],
			'footer' => [
				'backgroundColor' => 'rgba(255, 255, 255, 1)',
				'height' => '10px',
				'loginLink' => true,
				'margin' => false,
				'position' => 'site',
				'textColor' => 'rgba(33, 34, 35, 1)',
				'copyrightPosition' => 'center',
				'copyrightAlign' => 'center',
				'text' => 'Pied de page personnalisé',				
				'textPosition' => 'left',
				'textAlign' => 'left',				
				'socialsPosition' => 'right',
				'socialsAlign' => 'right'
			],
			'header' => [
				'backgroundColor' => 'rgba(255, 255, 255, 1)',
				'font' => 'Oswald',
				'fontSize' => '2em',
				'fontWeight' => 'normal',
				'height' => '150px',
				'image' => '',
				'imagePosition' => 'center center',
				'imageRepeat' => 'no-repeat',
				'margin' => false,
				'position' => 'site',
				'textAlign' => 'center',
				'textColor' => 'rgba(33, 34, 35, 1)',
				'textHide' => false,
				'textTransform' => 'none',
				'linkHome' => 'false',
				'imageContainer' => 'auto'
			],
			'link' => [
				'textColor' => 'rgba(74, 105, 189, 1)'
			],
			'menu' => [
				'backgroundColor' => 'rgba(74, 105, 189, 1)',
				'font' => 'Open+Sans',				
				'fontSize' => '1em',
				'fontWeight' => 'normal',
				'height' => '15px 10px',
				'loginLink' => true,
				'margin' => false,
				'position' => 'site-second',
				'textAlign' => 'left',
				'textColor' => 'rgba(255, 255, 255, 1)',
				'textTransform' => 'none',
				'fixed' => false
			],
			'site' => [
				'backgroundColor' => 'rgba(255, 255, 255, 1)',
				'radius' => '0',
				'shadow' => '0',
				'width' => '960px'
			],
			'text' => [
				'font' => 'Open+Sans',
				'fontSize' => '14px',
				'textColor' => 'rgba(33, 34, 35, 1)'
			],
			'title' => [
				'font' => 'Oswald',
				'fontWeight' => 'normal',
				'textColor' => 'rgba(74, 105, 189, 1)',
				'textTransform' => 'none'
			],
			'version' => 0,
		]
	];
	private $hierarchy = [
		'all' => [],
		'visible' => [],
		'bar' => []
	];
	private $input = [
		'_COOKIE' => [],
		'_POST' => []
	];
	public static $inputBefore = [];
	public static $inputNotices = [];
	public $output = [
		'access' => true,
		'content' => '',
		'display' => self::DISPLAY_LAYOUT_MAIN,
		'metaDescription' => '',
		'metaTitle' => '',
		'notification' => '',
		'redirect' => '',
		'script' => '',
		'showBarEditButton' => false,
		'showPageContent' => false,
		'state' => false,
		'style' => '',
		'title' => null, // Null car un titre peut être vide
		// Trié par ordre d'exécution
		'vendor' => [
			'jquery',
			'normalize',
			'lity',
			'filemanager',
			'flatpickr', 
			// 'tinycolorpicker', Désactivé par défaut
			// 'tinymce', Désactivé par défaut
			// 'codemirror', // Désactivé par défaut
			'tippy',
			'zwiico'
		],
		'view' => ''
	];
	public static $groups = [
		self::GROUP_BANNED => 'Banni',
		self::GROUP_VISITOR => 'Visiteur',
		self::GROUP_MEMBER => 'Membre',
		self::GROUP_MODERATOR => 'Éditeur',
		self::GROUP_ADMIN => 'Administrateur'
	];
	public static $groupEdits = [
		self::GROUP_BANNED => 'Banni',
		self::GROUP_MEMBER => 'Membre',
		self::GROUP_MODERATOR => 'Éditeur',
		self::GROUP_ADMIN => 'Administrateur'
	];
	public static $groupNews = [
		self::GROUP_MEMBER => 'Membre',
		self::GROUP_MODERATOR => 'Éditeur',
		self::GROUP_ADMIN => 'Administrateur'
	];
	public static $groupPublics = [
		self::GROUP_VISITOR => 'Visiteur',
		self::GROUP_MEMBER => 'Membre',
		self::GROUP_MODERATOR => 'Éditeur',
		self::GROUP_ADMIN => 'Administrateur'
	];
	public static $timezone;
	private $url = '';
	private $user = [];

	/**
	 * Constructeur commun
	 */
	public function __construct() {
		// Extraction des données http
		if(isset($_POST)) {
			$this->input['_POST'] = $_POST;
		}
		if(isset($_COOKIE)) {
			$this->input['_COOKIE'] = $_COOKIE;
		}

		// Import des données d'une version 8		
		$this->importData();

		// Génère le fichier de données lorque les deux fichiers sont absents ou seulement le thème est - installation fraîche par défaut
		if(file_exists('site/data/core.json')   === false OR 
		   file_exists('site/data/theme.json')  === false) {
			$this->setData([$this->defaultData]);
			$this->saveData();
			chmod('site/data/core.json', 0755);
			chmod('site/data/theme.json', 0755);
		} 

		// Import des données d'un fichier data.json déjà présent
		if($this->data === [])  {
			$this->readData();
		}

		// Mise à jour des données core
		// Fonction désactivée en dev
		if (stripos(common::ZWII_VERSION, 'dev') === 0 )
			$this->update();
	
		// Utilisateur connecté
		if($this->user === []) {
			$this->user = $this->getData(['user', $this->getInput('ZWII_USER_ID')]);
		}
		// Construit la liste des pages parents/enfants
		if($this->hierarchy['all'] === []) {
			$pages = helper::arrayCollumn($this->getData(['page']), 'position', 'SORT_ASC');
			// Parents
			foreach($pages as $pageId => $pagePosition) {
				if(
					// Page parent
					$this->getData(['page', $pageId, 'parentPageId']) === ""
					// Ignore les pages dont l'utilisateur n'a pas accès
					AND (
						$this->getData(['page', $pageId, 'group']) === self::GROUP_VISITOR
						OR (
							$this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')
							AND $this->getUser('group') >= $this->getData(['page', $pageId, 'group'])
						)
					)
				) {
					if($pagePosition !== 0) {
						$this->hierarchy['visible'][$pageId] = [];
					}
					if($this->getData(['page', $pageId, 'block']) === 'bar') {
						$this->hierarchy['bar'][$pageId] = [];
					}
					$this->hierarchy['all'][$pageId] = [];
				}
			}
			// Enfants
			foreach($pages as $pageId => $pagePosition) {
				if(
					// Page parent
					$parentId = $this->getData(['page', $pageId, 'parentPageId'])
					// Ignore les pages dont l'utilisateur n'a pas accès
					AND (
						(
							$this->getData(['page', $pageId, 'group']) === self::GROUP_VISITOR
							AND $this->getData(['page', $parentId, 'group']) === self::GROUP_VISITOR
						)
						OR (
							$this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')
							AND $this->getUser('group') >= $this->getData(['page', $parentId, 'group'])
							AND $this->getUser('group') >= $this->getData(['page', $pageId, 'group'])
						)
					)
				) {
					if($pagePosition !== 0) {
						$this->hierarchy['visible'][$parentId][] = $pageId;
					}
					if($this->getData(['page', $pageId, 'block']) === 'bar') {
						$this->hierarchy['bar'][$pageId] = [];
					}
					$this->hierarchy['all'][$parentId][] = $pageId;
				}
			}
		}
		// Construit l'url
		if($this->url === '') {
			if($url = $_SERVER['QUERY_STRING']) {
				$this->url = $url;
			}
			else {
				$this->url = $this->getData(['config', 'homePageId']);
			}
		}
	}

	/**
	 * Lecture des fichiers de données
	 * 
	 */
	public function readData() {
		// Trois tentatives
		for($i = 0; $i < 3; $i++) {
			$this->setData([json_decode(file_get_contents('site/data/core.json'), true) + json_decode(file_get_contents('site/data/theme.json'), true)]);
			if($this->data) {
				break;
			}
			elseif($i === 2) {
				exit('Unable to read data file.');
			}
			// Pause de 10 millisecondes
			usleep(10000);
		}
	}

	/**
	 * Import des données de la version 8
	 * Converti un fichier de données data.json puis le renomme
	 */
	public function importData() {
		if(file_exists('site/data/data.json')) {
			// Trois tentatives
			for($i = 0; $i < 3; $i++) {
				$tempData = [json_decode(file_get_contents('site/data/data.json'), true)];			
				if($tempData) {
					for($i = 0; $i < 3; $i++) {
						if(file_put_contents('site/data/core.json', json_encode(array_slice($tempData[0],0,5)), LOCK_EX) !== false) {
							break;
						}
						// Pause de 10 millisecondes
						usleep(10000);
					}
					for($i = 0; $i < 3; $i++) {
						if(file_put_contents('site/data/theme.json', json_encode(array_slice($tempData[0],5)), LOCK_EX) !== false) {
							break;
						}
						// Pause de 10 millisecondes
						usleep(10000);
					}					
					rename ('site/data/data.json','site/data/imported_data.json');
					break;
				}
				elseif($i === 2) {
					exit('Unable to read data file.');
				}
				// Pause de 10 millisecondes
				usleep(10000);
			}
		
		}
	}

	/**
	 * Ajoute les valeurs en sortie
	 * @param array $output Valeurs en sortie
	 */
	public function addOutput($output) {
		$this->output = array_merge($this->output, $output);
	}

	/**
	 * Ajoute une notice de champ obligatoire
	 * @param string $key Clef du champ
	 */
	public function addRequiredInputNotices($key) {
		// La clef est un tableau
		if(preg_match('#\[(.*)\]#', $key, $secondKey)) {
			$firstKey = explode('[', $key)[0];
			$secondKey = $secondKey[1];
			if(empty($this->input['_POST'][$firstKey][$secondKey])) {
				common::$inputNotices[$firstKey . '_' . $secondKey] = 'Obligatoire';
			}
		}
		// La clef est une chaine
		elseif(empty($this->input['_POST'][$key])) {
			common::$inputNotices[$key] = 'Obligatoire';
		}
	}

	/**
	 * Check du token CSRF (true = bo
	 */
	public function checkCSRF() {
		return ((empty($_POST['csrf']) OR hash_equals($_SESSION['csrf'], $_POST['csrf']) === false) === false);
	}

	/**
	 * Supprime des données
	 * @param array $keys Clé(s) des données
	 */
	public function deleteData($keys) {
		switch(count($keys)) {
			case 1 :
				unset($this->data[$keys[0]]);
				break;
			case 2:
				unset($this->data[$keys[0]][$keys[1]]);
				break;
			case 3:
				unset($this->data[$keys[0]][$keys[1]][$keys[2]]);
				break;
			case 4:
				unset($this->data[$keys[0]][$keys[1]][$keys[2]][$keys[3]]);
				break;
			case 5:
				unset($this->data[$keys[0]][$keys[1]][$keys[2]][$keys[3]][$keys[4]]);
				break;
			case 6:
				unset($this->data[$keys[0]][$keys[1]][$keys[2]][$keys[3]][$keys[4]][$keys[5]]);
				break;
			case 7:
				unset($this->data[$keys[0]][$keys[1]][$keys[2]][$keys[3]][$keys[4]][$keys[5]][$keys[6]]);
				break;
		}
	}


	/**
	 * Récupérer une copie d'écran du site Web pour le tag image si le fichier n'existe pas
	 * En local, copie du site décran de ZwiiCMS
	 */	
	public function makeImageTag () {
		if (!file_exists('site/file/source/screenshot.png'))
		{ 			
			if ( strpos(helper::baseUrl(false),'localhost') == 0 AND strpos(helper::baseUrl(false),'127.0.0.1') == 0)	{							
				$googlePagespeedData = file_get_contents('https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url='. helper::baseUrl(false) .'&screenshot=true');	
				$googlePagespeedData = json_decode($googlePagespeedData, true);
				$screenshot = $googlePagespeedData['screenshot']['data'];
				$screenshot = str_replace(array('_','-'),array('/','+'),$screenshot);
				$data = 'data:image/jpeg;base64,'.$screenshot;
				$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));			
				file_put_contents( 'site/file/source/screenshot.png',$data);
			}
		}
	}
	


	/**
	 * Accède aux données
	 * @param array $keys Clé(s) des données
	 * @return mixed
	 */
	public function getData($keys = null) {
		// Retourne l'ensemble des données
		if($keys === null) {
			return $this->data;
		}
		// Décent dans les niveaux de la variable $data
		$data = $this->data;
		foreach($keys as $key) {
			// Si aucune donnée n'existe retourne null
			if(isset($data[$key]) === false) {
				return null;
			}
			// Sinon décent dans les niveaux
			else {
				$data = $data[$key];
			}
		}
		// Retourne les données
		return $data;
	}

	/**
	 * Accède à la liste des pages parents et de leurs enfants
	 * @param int $parentId Id de la page parent
	 * @param bool $onlyVisible Affiche seulement les pages visibles
	 * @param bool $onlyBlock Affiche seulement les pages de type barre
	 * @return array
	 */
	public function getHierarchy($parentId = null, $onlyVisible = true, $onlyBlock = false) {
		$hierarchy = $onlyVisible ? $this->hierarchy['visible'] : $this->hierarchy['all'];
		$hierarchy = $onlyBlock ? $this->hierarchy['bar'] : $hierarchy;		
		// Enfants d'un parent
		if($parentId) {
			if(array_key_exists($parentId, $hierarchy)) {
				return $hierarchy[$parentId];
			}
			else {
				return [];
			}
		}
		// Parents et leurs enfants
		else {
			return $hierarchy;
		}
	}



	/**
	 * Accède à une valeur des variables http (ordre de recherche en l'absence de type : _COOKIE, _POST)
	 * @param string $key Clé de la valeur
	 * @param int $filter Filtre à appliquer à la valeur
	 * @param bool $required Champ requis
	 * @return mixed
	 */
	public function getInput($key, $filter = helper::FILTER_STRING_SHORT, $required = false) {
		// La clef est un tableau
		if(preg_match('#\[(.*)\]#', $key, $secondKey)) {
			$firstKey = explode('[', $key)[0];
			$secondKey = $secondKey[1];
			foreach($this->input as $type => $values) {
				// Champ obligatoire
				if($required) {
					$this->addRequiredInputNotices($key);
				}
				// Check de l'existence
				// Également utile pour les checkboxs qui ne retournent rien lorsqu'elles ne sont pas cochées
				if(
					array_key_exists($firstKey, $values)
					AND array_key_exists($secondKey, $values[$firstKey])
				) {
					// Retourne la valeur filtrée
					if($filter) {
						return helper::filter($this->input[$type][$firstKey][$secondKey], $filter);
					}
					// Retourne la valeur
					else {
						return $this->input[$type][$firstKey][$secondKey];
					}
				}
			}
		}
		// La clef est une chaine
		else {
			foreach($this->input as $type => $values) {
				// Champ obligatoire
				if($required) {
					$this->addRequiredInputNotices($key);
				}
				// Check de l'existence
				// Également utile pour les checkboxs qui ne retournent rien lorsqu'elles ne sont pas cochées
				if(array_key_exists($key, $values)) {
					// Retourne la valeur filtrée
					if($filter) {
						return helper::filter($this->input[$type][$key], $filter);
					}
					// Retourne la valeur
					else {
						return $this->input[$type][$key];
					}
				}
			}
		}

		// Sinon retourne null
		return helper::filter(null, $filter);
	}

	/**
	 * Accède à une partie l'url ou à l'url complète
	 * @param int $key Clé de l'url
	 * @return string|null
	 */
	public function getUrl($key = null) {
		// Url complète
		if($key === null) {
			return $this->url;
		}
		// Une partie de l'url
		else {
			$url = explode('/', $this->url);
			return array_key_exists($key, $url) ? $url[$key] : null;
		}
	}

	/**
	 * Accède à l'utilisateur connecté
	 * @param int $key Clé de la valeur
	 * @return string|null
	 */
	public function getUser($key) {
		if(is_array($this->user) === false) {
			return false;
		}
		elseif($key === 'id') {
			return $this->getInput('ZWII_USER_ID');
		}
		elseif(array_key_exists($key, $this->user)) {
			return $this->user[$key];
		}
		else {
			return false;
		}
	}

	/**
	 * Check qu'une valeur est transmise par la méthode _POST
	 * @return bool
	 */
	public function isPost() {
		return ($this->checkCSRF() AND $this->input['_POST'] !== []);
	}

	/**
	 * Enregistre les données dans deux fichiers séparés
	 */
	public function saveData() {

		// Save config core page module et user
		// 5 premières clés principales
		// Trois tentatives
		for($i = 0; $i < 3; $i++) {
			if(file_put_contents('site/data/core.json', json_encode(array_slice($this->getData(),0,5)) , LOCK_EX) !== false) {
				break;
			}
			// Pause de 10 millisecondes
			usleep(10000);
		}

		// Save theme
		// dernière clé principale
		// Trois tentatives
		for($i = 0; $i < 3; $i++) {
			if(file_put_contents('site/data/theme.json', json_encode(array_slice($this->getData(),5)), LOCK_EX) !== false) {
				break;
			}
			// Pause de 10 millisecondes
			usleep(10000);
		}
	}


		/**
	 * Envoi un mail
	 * @param string|array $to Destinataire
	 * @param string $subject Sujet
	 * @param string $content Contenu
	 * @return bool
	 */
	public function sendMail($to, $subject, $content) {
		// Utilisation de PHPMailer version 6.0.6
		require "core/vendor/phpmailer/phpmailer.php";
		require "core/vendor/phpmailer/exception.php";

		// Layout
		ob_start();
		include 'core/layout/mail.php';
		$layout = ob_get_clean();
		// Mail
		try{
			$mail = new PHPMailer\PHPMailer\PHPMailer;
			$mail->CharSet = 'UTF-8';
			$host = str_replace('www.', '', $_SERVER['HTTP_HOST']);
			$mail->setFrom('no-reply@' . $host, $this->getData(['config', 'title']));
			$mail->addReplyTo('no-reply@' . $host, $this->getData(['config', 'title']));
			if(is_array($to)) {
					foreach($to as $userMail) {
							$mail->addAddress($userMail);
					}
			}
			else {
					$mail->addAddress($to);
			}
			$mail->isHTML(true);
			$mail->Subject = $subject;
			$mail->Body = $layout;
			$mail->AltBody = strip_tags($content);
			if($mail->send()) {
					return true;
			}
			else {
					return $mail->ErrorInfo;
			}
		} catch (phpmailerException $e) {
			return $e->errorMessage();
		} catch (Exception $e) {
			return $e->getMessage();
		}
}

	/**
	 * Insert des données
	 * @param array $keys Clé(s) des données
	 */
	public function setData($keys) {
		switch(count($keys)) {
			case 1:
				$this->data = $keys[0];
				break;
			case 2:
				$this->data[$keys[0]] = $keys[1];
				break;
			case 3:
				$this->data[$keys[0]][$keys[1]] = $keys[2];
				break;
			case 4:
				$this->data[$keys[0]][$keys[1]][$keys[2]] = $keys[3];
				break;
			case 5:
				$this->data[$keys[0]][$keys[1]][$keys[2]][$keys[3]] = $keys[4];
				break;
			case 6:
				$this->data[$keys[0]][$keys[1]][$keys[2]][$keys[3]][$keys[4]] = $keys[5];
				break;
			case 7:
				$this->data[$keys[0]][$keys[1]][$keys[2]][$keys[3]][$keys[4]][$keys[5]] = $keys[6];
				break;
		}
	}

	/**
	 * Mises à jour
	 */
	private function update() {
		echo "pop";
		// Version 8.1.0
		if($this->getData(['core', 'dataVersion']) < 810) {
			$this->setData(['config', 'timezone', 'Europe/Paris']);
			$this->setData(['core', 'dataVersion', 810]);
			$this->saveData();
		}
		// Version 8.2.0
		if($this->getData(['core', 'dataVersion']) < 820) {
			$this->setData(['theme', 'body', 'backgroundColor', 'rgba(236, 239, 241, 1)']);
			$this->setData(['theme', 'site', 'backgroundColor', 'rgba(255, 255, 255, 1)']);
			$this->setData(['theme', 'text', 'fontSize', '14px']);
			$this->setData(['theme', 'text', 'textColor', 'rgba(33, 34, 35, 1)']);
			$this->setData(['theme', 'menu', 'fontSize', '1em']);
			$this->setData(['theme', 'menu', 'textColor', 'rgba(255, 255, 255, 1)']);
			$this->setData(['theme', 'header', 'fontSize', '2em']);
			$this->setData(['theme', 'footer', 'textColor', 'rgba(33, 34, 35, 1)']);
			$this->setData(['core', 'dataVersion', 820]);
			$this->saveData();
		}
		// Version 8.2.2
		if($this->getData(['core', 'dataVersion']) < 822) {
			$this->setData(['config', 'maintenance', false]);
			$this->setData(['core', 'dataVersion', 822]);
			$this->saveData();
		}
		// Version 8.2.6
		if($this->getData(['core', 'dataVersion']) < 826) {
			$this->setData(['theme','header','linkHome',false]);
			$this->setData(['core', 'dataVersion', 826]);
			$this->SaveData();
		}
		// Version 8.3.1
		if($this->getData(['core', 'dataVersion']) < 831) {
			$this->setData(['theme','header','imageContainer','auto']);
			$this->setData(['core', 'dataVersion', 831]);
			$this->SaveData();
		}

		// Version 8.4.0
		if($this->getData(['core', 'dataVersion']) < 840) {
			$this->setData(['theme','footer','socialsPosition','1']);
			$this->setData(['theme','footer','textPosition','2']);
			$this->setData(['theme','footer','copyrightPosition','3']);
			$this->setData(['config','itemsperPage',10]);
			$this->setData(['core', 'dataVersion', 840]);
			$this->SaveData();
		}
		// Version 8.4.4
		if($this->getData(['core', 'dataVersion']) < 844) {
			$this->setData(['theme','footer','socialsPosition','right']);
			$this->setData(['theme','footer','textPosition','left']);			
			$this->setData(['theme','footer','copyrightPosition','center']);			
			$this->setData(['core', 'dataVersion', 844]);
			$this->SaveData();
		}			
		// Version 8.4.6
		if($this->getData(['core', 'dataVersion']) < 846) {
			echo $this->getData(['core', 'dataVersion']);
			echo '<br>';			
			$this->setData(['config','itemsperPage',10]);
			$this->setData(['core', 'dataVersion', 846]);
			$this->SaveData();
		}		
		// Version 8.5.0
		if($this->getData(['core', 'dataVersion']) < 850) {
			$this->setData(['theme','menu','font','Open+Sans']);
			$this->setData(['core', 'dataVersion', 850]);
			$this->SaveData();
		}	
		// Version 8.5.1
		if($this->getData(['core', 'dataVersion']) < 851) {
			echo $this->getData(['core', 'dataVersion']);
			echo '<br>';
			$this->setData(['config','itemsperPage',10]);
			$this->deleteData(['config','ItemsperPage']);
			$this->setData(['core', 'dataVersion', 851]);
			$this->SaveData();
		}	
		// Version 9.0.0
		if($this->getData(['core', 'dataVersion']) < 9000) {
			$this->setData(['theme', 'site', 'block','12']);
			if ($this->getData(['theme','menu','position']) === 'body-top') {
				$this->setData(['theme','menu','position','top']);
			}
			$this->setData(['theme', 'menu','fixed',false]);						
			$this->setData(['core', 'dataVersion', 9000]);
			$this->SaveData();
		}	
		// Version 9.0.01
		if($this->getData(['core', 'dataVersion']) < 9000) {
			$this->deleteData(['config', 'social', 'googleplusId']);						
			$this->setData(['core', 'dataVersion', 9001]);
			$this->SaveData();
		}			
		
	}
}

class core extends common {

	/**
	 * Constructeur du coeur
	 */
	public function __construct() {
		parent::__construct();
		// Token CSRF
		if(empty($_SESSION['csrf'])) {
			$_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
		}
		// Fuseau horaire
		self::$timezone = $this->getData(['config', 'timezone']); // Utile pour transmettre le timezone à la classe helper
		date_default_timezone_set(self::$timezone);
		// Supprime les fichiers temporaires
		$lastClearTmp = mktime(0, 0, 0);
		if($lastClearTmp > $this->getData(['core', 'lastClearTmp']) + 86400) {
			$iterator = new DirectoryIterator('site/tmp/');
			foreach($iterator as $fileInfos) {
				if($fileInfos->isFile() AND $fileInfos->getBasename() !== '.gitkeep') {
					@unlink($fileInfos->getPathname());
				}
			}
			// Date de la dernière suppression
			$this->setData(['core', 'lastClearTmp', $lastClearTmp]);
			// Enregistre les données
			$this->saveData();
		}
		// Backup automatique des données
		$lastBackup = mktime(0, 0, 0);
		if(
			$this->getData(['config', 'autoBackup'])
			AND $lastBackup > $this->getData(['core', 'lastBackup']) + 86400
			AND $this->getData(['user']) // Pas de backup pendant l'installation
		) {
			// Copie du fichier de données
			copy('site/data/core.json', 'site/backup/' . date('Y-m-d', $lastBackup) . '.json');
			// Date du dernier backup
			$this->setData(['core', 'lastBackup', $lastBackup]);
			// Enregistre les données
			$this->saveData();
			// Supprime les backups de plus de 30 jours
			$iterator = new DirectoryIterator('site/backup/');
			foreach($iterator as $fileInfos) {
				if(
					$fileInfos->isFile()
					AND $fileInfos->getBasename() !== '.htaccess'
					AND $fileInfos->getMTime() + (86400 * 30) < time()
				) {
					@unlink($fileInfos->getPathname());
				}
			}
		}
		// Crée le fichier de personnalisation avancée
		if(file_exists('site/data/custom.css') === false) {
			file_put_contents('site/data/custom.css', file_get_contents('core/module/theme/resource/custom.css'));
			chmod('site/data/custom.css', 0755);
		}
		// Crée le fichier de personnalisation
		if(file_exists('site/data/theme.css') === false) {
			file_put_contents('site/data/theme.css', '');
			chmod('site/data/theme.css', 0755);
		}
		// Check la version
		$cssVersion = preg_split('/\*+/', file_get_contents('site/data/theme.css'));
		if(empty($cssVersion[1]) OR $cssVersion[1] !== md5(json_encode($this->getData(['theme'])))) {
			// Version
			$css = '/*' . md5(json_encode($this->getData(['theme']))) . '*/';
			// Import des polices de caractères
			$css .= '@import url("https://fonts.googleapis.com/css?family=' . $this->getData(['theme', 'text', 'font']) . '|' . $this->getData(['theme', 'title', 'font']) . '|' . $this->getData(['theme', 'header', 'font']) .  '|' . $this->getData(['theme', 'menu', 'font']) . '");';
			// Fond du site
			$colors = helper::colorVariants($this->getData(['theme', 'body', 'backgroundColor']));
			$css .= 'body{background-color:' . $colors['normal'] . ';font-family:"' . str_replace('+', ' ', $this->getData(['theme', 'text', 'font'])) . '",sans-serif}';
			if($themeBodyImage = $this->getData(['theme', 'body', 'image'])) {
				$css .= 'body{background-image:url("../file/source/' . $themeBodyImage . '");background-position:' . $this->getData(['theme', 'body', 'imagePosition']) . ';background-attachment:' . $this->getData(['theme', 'body', 'imageAttachment']) . ';background-size:' . $this->getData(['theme', 'body', 'imageSize']) . ';background-repeat:' . $this->getData(['theme', 'body', 'imageRepeat']) . '}';
			}
			// Site
			$colors = helper::colorVariants($this->getData(['theme', 'link', 'textColor']));
			$css .= 'a{color:' . $colors['normal'] . '}';
			$css .= 'a:hover{color:' . $colors['darken'] . '}';
			$css .= 'body,.row > div{font-size:' . $this->getData(['theme', 'text', 'fontSize']) . '}';
			$css .= 'body,.block h4,input[type=\'email\'],input[type=\'text\'],input[type=\'password\'],.inputFile,select,textarea,.inputFile,.button.buttonGrey,.button.buttonGrey:hover{color:' . $this->getData(['theme', 'text', 'textColor']) . '}';
			$css .= '.container{max-width:' . $this->getData(['theme', 'site', 'width']) . '}';
			$css .= '#site{background-color:' . $this->getData(['theme', 'site', 'backgroundColor']) . ';border-radius:' . $this->getData(['theme', 'site', 'radius']) . ';box-shadow:' . $this->getData(['theme', 'site', 'shadow']) . ' #212223}';
			$colors = helper::colorVariants($this->getData(['theme', 'button', 'backgroundColor']));
			$css .= '.speechBubble,.button,.button:hover,button[type=\'submit\'],.pagination a,.pagination a:hover,input[type=\'checkbox\']:checked + label:before,input[type=\'radio\']:checked + label:before,.helpContent{background-color:' . $colors['normal'] . ';color:' . $colors['text'] . '}';
			$css .= '.helpButton span{color:' . $colors['normal'] . '}';
			$css .= 'input[type=\'text\']:hover,input[type=\'password\']:hover,.inputFile:hover,select:hover,textarea:hover{border-color:' . $colors['normal'] . '}';
			$css .= '.speechBubble:before{border-color:' . $colors['normal'] . ' transparent transparent transparent}';
			$css .= '.button:hover,button[type=\'submit\']:hover,.pagination a:hover,input[type=\'checkbox\']:not(:active):checked:hover + label:before,input[type=\'checkbox\']:active + label:before,input[type=\'radio\']:checked:hover + label:before,input[type=\'radio\']:not(:checked):active + label:before{background-color:' . $colors['darken'] . '}';
			$css .= '.helpButton span:hover{color:' . $colors['darken'] . '}';
			$css .= '.button:active,button[type=\'submit\']:active,.pagination a:active{background-color:' . $colors['veryDarken'] . '}';
			$colors = helper::colorVariants($this->getData(['theme', 'title', 'textColor']));
			$css .= 'h1,h2,h3,h4,h5,h6{color:' . $colors['normal'] . ';font-family:"' . str_replace('+', ' ', $this->getData(['theme', 'title', 'font'])) . '",sans-serif;font-weight:' . $this->getData(['theme', 'title', 'fontWeight']) . ';text-transform:' . $this->getData(['theme', 'title', 'textTransform']) . '}';
			// Bannière
			$colors = helper::colorVariants($this->getData(['theme', 'header', 'backgroundColor']));
			if($this->getData(['theme', 'header', 'margin'])) {
				if($this->getData(['theme', 'menu', 'position']) === 'site-first') {
					$css .= 'header{margin:0 20px}';
				}
				else {
					$css .= 'header{margin:20px 20px 0 20px}';
				}
			}
			$css .= 'header{background-size:' . $this->getData(['theme','header','imageContainer']).'}';
			$css .= 'header{background-color:' . $colors['normal'] . ';height:' . $this->getData(['theme', 'header', 'height']) . ';line-height:' . $this->getData(['theme', 'header', 'height']) . ';text-align:' . $this->getData(['theme', 'header', 'textAlign']) . '}';			
			$css .= '@media (max-width: 767px) {header{height:' .
					 str_replace("px","",$this->getData(['theme', 'header', 'height']))/2 . 
					 'px;line-height:' . 
					 str_replace("px","",$this->getData(['theme', 'header', 'height']))/2 . 
					 'px;}}';
			if($themeHeaderImage = $this->getData(['theme', 'header', 'image'])) {
				$css .= 'header{background-image:url("../file/source/' . $themeHeaderImage . '");background-position:' . $this->getData(['theme', 'header', 'imagePosition']) . ';background-repeat:' . $this->getData(['theme', 'header', 'imageRepeat']) . '}';
			}
			$colors = helper::colorVariants($this->getData(['theme', 'header', 'textColor']));
			$css .= 'header span{color:' . $colors['normal'] . ';font-family:"' . str_replace('+', ' ', $this->getData(['theme', 'header', 'font'])) . '",sans-serif;font-weight:' . $this->getData(['theme', 'header', 'fontWeight']) . ';font-size:' . $this->getData(['theme', 'header', 'fontSize']) . ';text-transform:' . $this->getData(['theme', 'header', 'textTransform']) . '}';
			// Menu
			$colors = helper::colorVariants($this->getData(['theme', 'menu', 'backgroundColor']));
			$css .= 'nav,nav a{background-color:' . $colors['normal'] . '}';
			$css .= 'nav a,#toggle span,nav a:hover{color:' . $this->getData(['theme', 'menu', 'textColor']) . '}';
			$css .= 'nav a:hover{background-color:' . $colors['darken'] . '}';
			$css .= 'nav a.active{background-color:' . $colors['veryDarken'] . '}';
			$css .= '#menu{text-align:' . $this->getData(['theme', 'menu', 'textAlign']) . '}';
			if($this->getData(['theme', 'menu', 'margin'])) {
				if(
					$this->getData(['theme', 'menu', 'position']) === 'site-first'
					OR $this->getData(['theme', 'header', 'position']) === 'body'
				) {
					$css .= 'nav{margin:20px 20px 0 20px}';
				}
				else {
					$css .= 'nav{margin:0 20px 0}';
				}
			}
			$css .= '#toggle span,#menu a{padding:' . $this->getData(['theme', 'menu', 'height']) .';font-family:"' . str_replace('+', ' ', $this->getData(['theme', 'menu', 'font'])) . '",sans-serif;font-weight:' . $this->getData(['theme', 'menu', 'fontWeight']) . ';font-size:' . $this->getData(['theme', 'menu', 'fontSize']) . ';text-transform:' . $this->getData(['theme', 'menu', 'textTransform']) . '}';
			// Pied de page
			$colors = helper::colorVariants($this->getData(['theme', 'footer', 'backgroundColor']));
			if($this->getData(['theme', 'footer', 'margin'])) {
				$css .= 'footer{margin:0 20px 20px}';
			}
			$css .= 'footer{background-color:' . $colors['normal'] . ';color:' . $this->getData(['theme', 'footer', 'textColor']) . '}';
			$css .= 'footer a{color:' . $this->getData(['theme', 'footer', 'textColor']) . '}';
			$css .= 'footer .container > div{margin:' . $this->getData(['theme', 'footer', 'height']) . ' 0}';
			$css .= 'footer .container-large > div{margin:' . $this->getData(['theme', 'footer', 'height']) . ' 0}';
			$css .= '#footerSocials{text-align:' . $this->getData(['theme', 'footer', 'socialsAlign']) . '}';
			$css .= '#footerText{text-align:' . $this->getData(['theme', 'footer', 'textAlign']) . '}';
			$css .= '#footerCopyright{text-align:' . $this->getData(['theme', 'footer', 'copyrightAlign']) . '}';
			// Enregistre la personnalisation
			file_put_contents('site/data/theme.css', $css);
		}
	}

	/**
	 * Auto-chargement des classes
	 * @param string $className Nom de la classe à charger
	 */
	public static function autoload($className) {
		$classPath = strtolower($className) . '/' . strtolower($className) . '.php';
		// Module du coeur
		if(is_readable('core/module/' . $classPath)) {
			require 'core/module/' . $classPath;
		}
		// Module
		elseif(is_readable('module/' . $classPath)) {
			require 'module/' . $classPath;
		}
		// Librairie
		elseif(is_readable('core/vendor/' . $classPath)) {
			require 'core/vendor/' . $classPath;
		}
	}

	/**
	 * Routage des modules
	 */
	public function router() {
		// Installation
		if(
			$this->getData(['user']) === []
			AND $this->getUrl(0) !== 'install'
		) {
			http_response_code(302);
			header('Location:' . helper::baseUrl() . 'install');
			exit();
		}
		// Force la déconnexion des membres bannis
		if (
			$this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')
			AND $this->getUser('group') === self::GROUP_BANNED
		) {
			$user = new user;
			$user->logout();
		}
		// Mode maintenance
		if(
			$this->getData(['config', 'maintenance'])
			AND in_array($this->getUrl(0), ['maintenance', 'user']) === false
			AND $this->getUrl(1) !== 'login'
			AND (
				$this->getUser('password') !== $this->getInput('ZWII_USER_PASSWORD')
				OR (
					$this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')
					AND $this->getUser('group') < self::GROUP_ADMIN
				)
			)
		) {
			// Déconnexion
			$user = new user;
			$user->logout();
			// Rédirection
			http_response_code(302);
			header('Location:' . helper::baseUrl() . 'maintenance');
			exit();
		}
		// Check l'accès à la page
		$access = null;
		if($this->getData(['page', $this->getUrl(0)]) !== null) {
			if(
				$this->getData(['page', $this->getUrl(0), 'group']) === self::GROUP_VISITOR
				OR (
					$this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')
					AND $this->getUser('group') >= $this->getData(['page', $this->getUrl(0), 'group'])
				)
			) {
				$access = true;
			}
			else {
				if($this->getUrl(0) === $this->getData(['config', 'homePageId'])) {
					$access = 'login';
				}
				else {
					$access = false;
				}
			}
		}

		// Breadcrumb
		$title = $this->getData(['page', $this->getUrl(0), 'title']);
		if (!empty($this->getData(['page', $this->getUrl(0), 'parentPageId'])) &&
				$this->getData(['page', $this->getUrl(0), 'breadCrumb'])) {
				$title = '<a href="' . helper::baseUrl() . 
						$this->getData(['page', $this->getUrl(0), 'parentPageId']) .
						'">' .
						ucfirst($this->getData(['page', $this->getUrl(0), 'parentPageId'])) .
						'</a> &#8250; '.
						$this->getData(['page', $this->getUrl(0), 'title']);			
		} 
		// Importe la page
		if(
			$this->getData(['page', $this->getUrl(0)]) !== null
			AND $this->getData(['page', $this->getUrl(0), 'moduleId']) === ''
			AND $access
		) {
			$this->addOutput([
				'title' => $title,
				'content' => $this->getData(['page', $this->getUrl(0), 'content']),
				'metaDescription' => $this->getData(['page', $this->getUrl(0), 'metaDescription']),
				'metaTitle' => $this->getData(['page', $this->getUrl(0), 'metaTitle']),
				'typeMenu' => $this->getData(['page', $this->getUrl(0), 'typeMenu']),
				'iconUrl' => $this->getData(['page', $this->getUrl(0), 'iconUrl']),
				'disable' => $this->getData(['page', $this->getUrl(0), 'disable'])
			]);
		}
		// Importe le module
		else {
			// Id du module, et valeurs en sortie de la page si il s'agit d'un module de page
			if($access AND $this->getData(['page', $this->getUrl(0), 'moduleId'])) {
				$moduleId = $this->getData(['page', $this->getUrl(0), 'moduleId']);
				$this->addOutput([
					'title' => $title,
					'metaDescription' => $this->getData(['page', $this->getUrl(0), 'metaDescription']),
					'metaTitle' => $this->getData(['page', $this->getUrl(0), 'metaTitle']),
					'typeMenu' => $this->getData(['page', $this->getUrl(0), 'typeMenu']),
					'iconUrl' => $this->getData(['page', $this->getUrl(0), 'iconUrl']),
		    		'disable' => $this->getData(['page', $this->getUrl(0), 'disable'])
				]);
				$pageContent = $this->getData(['page', $this->getUrl(0), 'content']);
			}
			else {
				$moduleId = $this->getUrl(0);
				$pageContent = '';
			}
			// Check l'existence du module
			if(class_exists($moduleId)) {
				/** @var common $module */
				$module = new $moduleId;
				// Check l'existence de l'action
				$action = '';
				$ignore = true;
				foreach(explode('-', $this->getUrl(1)) as $actionPart) {
					if($ignore) {
						$action .= $actionPart;
						$ignore = false;
					}
					else {
						$action .= ucfirst($actionPart);
					}
				}
				$action = array_key_exists($action, $module::$actions) ? $action : 'index';
				if(array_key_exists($action, $module::$actions)) {
					$module->$action();
					$output = $module->output;
					// Check le groupe de l'utilisateur
					if(
						(
							$module::$actions[$action] === self::GROUP_VISITOR
							OR (
								$this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')
								AND $this->getUser('group') >= $module::$actions[$action]
							)
						)
						AND $output['access'] === true
					) {
						// Enregistrement du contenu de la méthode POST lorsqu'une notice est présente
						if(common::$inputNotices) {
							foreach($_POST as $postId => $postValue) {
								if(is_array($postValue)) {
									foreach($postValue as $subPostId => $subPostValue) {
										self::$inputBefore[$postId . '_' . $subPostId] = $subPostValue;
									}
								}
								else {
									self::$inputBefore[$postId] = $postValue;
								}
							}
						}
						// Sinon traitement des données de sortie qui requiert qu'aucune notice ne soit présente
						else {
							// Enregistrement des données
							if($output['state'] !== false) {
								$this->setData([$module->getData()]);
								$this->saveData();
							}
							// Notification
							if($output['notification']) {
								if($output['state'] === true) {
									$notification = 'ZWII_NOTIFICATION_SUCCESS';
								}
								elseif($output['state'] === false) {
									$notification = 'ZWII_NOTIFICATION_ERROR';
								}
								else {
									$notification = 'ZWII_NOTIFICATION_OTHER';
								}
								$_SESSION[$notification] = $output['notification'];
							}
							// Redirection
							if($output['redirect']) {
								http_response_code(301);
								header('Location:' . $output['redirect']);
								exit();
							}
						}
						// Données en sortie applicables même lorsqu'une notice est présente
						// Affichage
						if($output['display']) {
							$this->addOutput([
								'display' => $output['display']
							]);
						}
						// Contenu brut
						if($output['content']) {
							$this->addOutput([
								'content' => $output['content']
							]);
						}
						// Contenu par vue
						elseif($output['view']) {
							// Chemin en fonction d'un module du coeur ou d'un module
							$modulePath = in_array($moduleId, self::$coreModuleIds) ? 'core/' : '';
							// CSS
							$stylePath = $modulePath . 'module/' . $moduleId . '/view/' . $output['view'] . '/' . $output['view'] . '.css';
							if(file_exists($stylePath)) {
								$this->addOutput([
									'style' => file_get_contents($stylePath)
								]);
							}
							// JS
							$scriptPath = $modulePath . 'module/' . $moduleId . '/view/' . $output['view'] . '/' . $output['view'] . '.js.php';
							if(file_exists($scriptPath)) {
								ob_start();
								include $scriptPath;
								$this->addOutput([
									'script' => ob_get_clean()
								]);
							}
							// Vue
							$viewPath = $modulePath . 'module/' . $moduleId . '/view/' . $output['view'] . '/' . $output['view'] . '.php';
							if(file_exists($viewPath)) {
								ob_start();
								include $viewPath;
								$modpos = $this->getData(['page', $this->getUrl(0), 'modulePosition']);
								if ($modpos === 'top') {
									$this->addOutput([
									'content' => ob_get_clean() . ($output['showPageContent'] ? $pageContent : '')]);
								}
								else if ($modpos === 'free') {
									$begin = strstr($pageContent, '[]', true);
									$end = strstr($pageContent, '[]');
									$cut=2;
									$end=substr($end,-strlen($end)+$cut);
									$this->addOutput([
									'content' => ($output['showPageContent'] ? $begin : '') . ob_get_clean() . ($output['showPageContent'] ? $end : '')]);								}
								else {
									$this->addOutput([
									'content' => ($output['showPageContent'] ? $pageContent : '') . ob_get_clean()]);
								}
							}
						}
						// Librairies
						if($output['vendor'] !== $this->output['vendor']) {
							$this->addOutput([
								'vendor' => array_merge($this->output['vendor'], $output['vendor'])
							]);
						}
						if($output['title'] !== null) {										
							$this->addOutput([
								'title' => $output['title']
							]);
						}
						// Affiche le bouton d'édition de la page dans la barre de membre
						if($output['showBarEditButton']) {
							$this->addOutput([
								'showBarEditButton' => $output['showBarEditButton']
							]);
						}
					}
					// Erreur 403
					else {
						$access = false;
					}
				}
			}
		}
		// Erreurs
		if($access === 'login') {
			http_response_code(302);
			header('Location:' . helper::baseUrl() . 'user/login/');
			exit();
		}
		if($access === false) {
			http_response_code(403);
			$this->addOutput([
				'title' => 'Erreur 403',
				'content' => template::speech('Vous n\'êtes pas autorisé à accéder à cette page...')
			]);
		}
		elseif($this->output['content'] === '') {
			http_response_code(404);
			$this->addOutput([
				'title' => 'Erreur 404',
				'content' => template::speech('Oups ! La page demandée est introuvable...')
			]);
		}
		// Mise en forme des métas
		if($this->output['metaTitle'] === '') {
			if($this->output['title']) {
				$this->addOutput([
					'metaTitle' => strip_tags($this->output['title']) . ' - ' . $this->getData(['config', 'title'])
				]);
			}
			else {
				$this->addOutput([
					'metaTitle' => $this->getData(['config', 'title'])
				]);
			}
		}
		if($this->output['metaDescription'] === '') {
			$this->addOutput([
				'metaDescription' => $this->getData(['config', 'metaDescription'])
			]);
		}
		// Choix du type d'affichage
		switch($this->output['display']) {
			// Layout vide
			case self::DISPLAY_LAYOUT_BLANK:
				require 'core/layout/blank.php';
				break;
			// Affichage en JSON
			case self::DISPLAY_JSON:
				header('Content-Type: application/json');
				echo json_encode($this->output['content']);
				break;
			// Layout alléger
			case self::DISPLAY_LAYOUT_LIGHT:
				require 'core/layout/light.php';
				break;
			// Layout principal
			case self::DISPLAY_LAYOUT_MAIN:
				require 'core/layout/main.php';
				break;
			// Layout brut
			case self::DISPLAY_RAW:
				echo $this->output['content'];
				break;
		}
	}

}

class helper {

	/** Statut de la réécriture d'URL (pour éviter de lire le contenu du fichier .htaccess à chaque self::baseUrl()) */
	public static $rewriteStatus = null;

	/** Filtres personnalisés */
	const FILTER_BOOLEAN = 1;
	const FILTER_DATETIME = 2;
	const FILTER_FLOAT = 3;
	const FILTER_ID = 4;
	const FILTER_INT = 5;
	const FILTER_MAIL = 6;
	const FILTER_PASSWORD = 7;
	const FILTER_STRING_LONG = 8;
	const FILTER_STRING_SHORT = 9;
	const FILTER_TIMESTAMP = 10;
	const FILTER_URL = 11;

	/**
	 * Retourne les valeurs d'une colonne du tableau de données
	 * @param array $array Tableau cible
	 * @param string $column Colonne à extraire
	 * @param string $sort Type de tri à appliquer au tableau (SORT_ASC, SORT_DESC, ou null)
	 * @return array
	 */
	public static function arrayCollumn($array, $column, $sort = null) {
		$newArray = [];
		if(empty($array) === false) {
			$newArray = array_map(function($element) use($column) {
				return $element[$column];
			}, $array);
			switch($sort) {
				case 'SORT_ASC':
					asort($newArray);
					break;
				case 'SORT_DESC':
					arsort($newArray);
					break;
			}
		}
		return $newArray;
	}

	/**
	 * Retourne l'URL de base du site
	 * @param bool $queryString Affiche ou non le point d'interrogation
	 * @param bool $host Affiche ou non l'host
	 * @return string
	 */
	public static function baseUrl($queryString = true, $host = true) {
		// Protocol
		if(
			(empty($_SERVER['HTTPS']) === false AND $_SERVER['HTTPS'] !== 'off')
			OR $_SERVER['SERVER_PORT'] === 443
		) {
			$protocol = 'https://';
		}
		else {
			$protocol = 'http://';
		}
		// Host
		if($host) {
			$host = $protocol . $_SERVER['HTTP_HOST'];
		}
		// Pathinfo
		$pathInfo = pathinfo($_SERVER['PHP_SELF']);
		// Querystring
		if($queryString AND helper::checkRewrite() === false) {
			$queryString = '?';
		}
		else {
			$queryString = '';
		}
		return $host . rtrim($pathInfo['dirname'], ' /') . '/' . $queryString;
	}

	/**
	 * Check le statut de l'URL rewriting
	 * @return bool
	 */
	public static function checkRewrite() {
		if(self::$rewriteStatus === null) {
			// Ouvre et scinde le fichier .htaccess
			$htaccess = explode('# URL rewriting', file_get_contents('.htaccess'));
			// Retourne un boolean en fonction du contenu de la partie réservée à l'URL rewriting
			self::$rewriteStatus = (empty($htaccess[1]) === false);
		}
		return self::$rewriteStatus;
	}

	/**
	 * Renvoie le numéro de version de Zwii est en ligne
	 * @return string
	 */
	public static function getOnlineVersion() {
		return (@file_get_contents('http://zwiicms.com/update/version'));
	}


	/**
	 * Check si une nouvelle version de Zwii est disponible
	 * @return bool
	 */
	public static function checkNewVersion() {
		if($version = helper::getOnlineVersion()) {
			//return (trim($version) !== common::ZWII_VERSION);
			return ((version_compare(common::ZWII_VERSION,$version)) === -1);
		}
		else {
			return false;
		}
	}


	/**
	 * Génère des variations d'une couleur
	 * @param string $rgba Code rgba de la couleur
	 * @return array
	 */
	public static function colorVariants($rgba) {
		preg_match('#\(+(.*)\)+#', $rgba, $matches);
		$rgba = explode(', ', $matches[1]);
		return [
			'normal' => 'rgba(' . $rgba[0] . ',' . $rgba[1] . ',' . $rgba[2] . ',' . $rgba[3] . ')',
			'darken' => 'rgba(' . max(0, $rgba[0] - 15) . ',' . max(0, $rgba[1] - 15) . ',' . max(0, $rgba[2] - 15) . ',' . $rgba[3] . ')',
			'veryDarken' => 'rgba(' . max(0, $rgba[0] - 20) . ',' . max(0, $rgba[1] - 20) . ',' . max(0, $rgba[2] - 20) . ',' . $rgba[3] . ')',
			'text' => self::relativeLuminanceW3C($rgba) > .22 ? "inherit" : "white"
		];
	}

	/**
	 * Supprime un cookie
	 * @param string $cookieKey Clé du cookie à supprimer
	 */
	public static function deleteCookie($cookieKey) {
		unset($_COOKIE[$cookieKey]);
		setcookie($cookieKey, '', time() - 3600, helper::baseUrl(false, false));
	}

	/**
	 * Filtre une chaîne en fonction d'un tableau de données
	 * @param string $text Chaîne à filtrer
	 * @param int $filter Type de filtre à appliquer
	 * @return string
	 */
	public static function filter($text, $filter) {
		$text = trim($text);
		switch($filter) {
			case self::FILTER_BOOLEAN:
				$text = (bool) $text;
				break;
			case self::FILTER_DATETIME:
				$timezone = new DateTimeZone(core::$timezone);
				$date = new DateTime($text);
				$date->setTimezone($timezone);
				$text = (int) $date->format('U');
				break;
			case self::FILTER_FLOAT:
				$text = filter_var($text, FILTER_SANITIZE_NUMBER_FLOAT);
				$text = (float) $text;
				break;
			case self::FILTER_ID:
				$text = mb_strtolower($text, 'UTF-8');
				$text = str_replace(
					explode(',', 'á,à,â,ä,ã,å,ç,é,è,ê,ë,í,ì,î,ï,ñ,ó,ò,ô,ö,õ,ú,ù,û,ü,ý,ÿ,\',", '),
					explode(',', 'a,a,a,a,a,a,c,e,e,e,e,i,i,i,i,n,o,o,o,o,o,u,u,u,u,y,y,-,-,-'),
					$text
				);
				$text = preg_replace('/([^a-z0-9-])/', '', $text);
				// Un ID ne peut pas être un entier, pour éviter les conflits avec le système de pagination
				if(intval($text) !== 0) {
					$text = 'i' . $text;
				}
				// un dossier existe du même nom (erreur en cas de redirection)
				if (file_exists($text)) {
					$text = 'p-' .  $text;
				}				
				break;
			case self::FILTER_INT:
				$text = (int) filter_var($text, FILTER_SANITIZE_NUMBER_INT);
				break;
			case self::FILTER_MAIL:
				$text = filter_var($text, FILTER_SANITIZE_EMAIL);
				break;
			case self::FILTER_PASSWORD:
				$text = password_hash($text, PASSWORD_BCRYPT);
				break;
			case self::FILTER_STRING_LONG:
				$text = mb_substr(filter_var($text, FILTER_SANITIZE_STRING), 0, 500000);
				break;
			case self::FILTER_STRING_SHORT:
				$text = mb_substr(filter_var($text, FILTER_SANITIZE_STRING), 0, 500);
				break;
			case self::FILTER_TIMESTAMP:
				$text = date('Y-m-d H:i:s', $text);
				break;
			case self::FILTER_URL:
				$text = filter_var($text, FILTER_SANITIZE_URL);
				break;
		}
		return get_magic_quotes_gpc() ? stripslashes($text) : $text;
	}

	/**
	 * Incrémente une clé en fonction des clés ou des valeurs d'un tableau
	 * @param mixed $key Clé à incrémenter
	 * @param array $array Tableau à vérifier
	 * @return string
	 */
	public static function increment($key, $array = []) {
		// Pas besoin d'incrémenter si la clef n'existe pas
		if($array === []) {
			return $key;
		}
		// Incrémente la clef
		else {
			// Si la clef est numérique elle est incrémentée
			if(is_numeric($key)) {
				$newKey = $key;
				while(array_key_exists($newKey, $array) OR in_array($newKey, $array)) {
					$newKey++;
				}
			}
			// Sinon l'incrémentation est ajoutée après la clef
			else {
				$i = 2;
				$newKey = $key;
				while(array_key_exists($newKey, $array) OR in_array($newKey, $array)) {
					$newKey = $key . '-' . $i;
					$i++;
				}
			}
			return $newKey;
		}
	}

	/**
	 * Minimise du css
	 * @param string $css Css à minimiser
	 * @return string
	 */
	public static function minifyCss($css) {
		// Supprime les commentaires
		$css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
		// Supprime les tabulations, espaces, nouvelles lignes, etc...
		$css = str_replace(["\r\n", "\r", "\n" ,"\t", '  ', '    ', '     '], '', $css);
		$css = preg_replace(['(( )+{)', '({( )+)'], '{', $css);
		$css = preg_replace(['(( )+})', '(}( )+)', '(;( )*})'], '}', $css);
		$css = preg_replace(['(;( )+)', '(( )+;)'], ';', $css);
		// Retourne le css minifié
		return $css;
	}

	/**
	 * Minimise du js
	 * @param string $js Js à minimiser
	 * @return string
	 */
	public static function minifyJs($js) {
		// Supprime les commentaires
		$js = preg_replace('/\\/\\*[^*]*\\*+([^\\/][^*]*\\*+)*\\/|\s*(?<![\:\=])\/\/.*/', '', $js);
		// Supprime les tabulations, espaces, nouvelles lignes, etc...
		$js = str_replace(["\r\n", "\r", "\t", "\n", '  ', '    ', '     '], '', $js);
		$js = preg_replace(['(( )+\))', '(\)( )+)'], ')', $js);
		// Retourne le js minifié
		return $js;
	}

	/**
	 * Crée un système de pagination (retourne un tableau contenant les informations sur la pagination (first, last, pages))
	 * @param array $array Tableau de donnée à utiliser
	 * @param string $url URL à utiliser, la dernière partie doit correspondre au numéro de page, par défaut utiliser $this->getUrl()
	 * @param string  $item pagination nombre d'éléments par page
	 * @param null|int $sufix Suffixe de l'url
	 * @return array
	 */
	public static function pagination($array, $url, $item, $sufix = null) {
		// Scinde l'url
		$url = explode('/', $url);
		// Url de pagination
		$urlPagination = is_numeric($url[count($url) - 1]) ? array_pop($url) : 1;
		// Url de la page courante
		$urlCurrent = implode('/', $url);
		// Nombre d'éléments à afficher
		$nbElements = count($array);
		// Nombre de page
		$nbPage = ceil($nbElements / $item);
		// Page courante
		$currentPage = is_numeric($urlPagination) ? self::filter($urlPagination, self::FILTER_INT) : 1;
		// Premier élément de la page
		$firstElement = ($currentPage - 1) * $item;
		// Dernier élément de la page
		$lastElement = $firstElement + $item;
		$lastElement = ($lastElement > $nbElements) ? $nbElements : $lastElement;
		// Mise en forme de la liste des pages
		$pages = '';
		if($nbPage > 1) {
			for($i = 1; $i <= $nbPage; $i++) {
				$disabled = ($i === $currentPage) ? ' class="disabled"' : false;
				$pages .= '<a href="' . helper::baseUrl() . $urlCurrent . '/' . $i . $sufix . '"' . $disabled . '>' . $i . '</a>';
			}
			$pages = '<div class="pagination">' . $pages . '</div>';
		}
		// Retourne un tableau contenant les informations sur la pagination
		return [
			'first' => $firstElement,
			'last' => $lastElement,
			'pages' => $pages
		];
	}

	/**
	 * Calcul de la luminance relative d'une couleur
	 */
	public static function relativeLuminanceW3C($rgba) {
		// Conversion en sRGB
		$RsRGB = $rgba[0] / 255;
		$GsRGB = $rgba[1] / 255;
		$BsRGB = $rgba[2] / 255;
		// Ajout de la transparence
		$RsRGBA = $rgba[3] * $RsRGB + (1 - $rgba[3]);
		$GsRGBA = $rgba[3] * $GsRGB + (1 - $rgba[3]);
		$BsRGBA = $rgba[3] * $BsRGB + (1 - $rgba[3]);
		// Calcul de la luminance
		$R = ($RsRGBA <= .03928) ? $RsRGBA / 12.92 : pow(($RsRGBA + .055) / 1.055, 2.4);
		$G = ($GsRGBA <= .03928) ? $GsRGBA / 12.92 : pow(($GsRGBA + .055) / 1.055, 2.4);
		$B = ($BsRGBA <= .03928) ? $BsRGBA / 12.92 : pow(($BsRGBA + .055) / 1.055, 2.4);
		return .2126 * $R + .7152 * $G + .0722 * $B;
	}

	/**
	 * Retourne les attributs d'une balise au bon format
	 * @param array $array Liste des attributs ($key => $value)
	 * @param array $exclude Clés à ignorer ($key)
	 * @return string
	 */
	public static function sprintAttributes(array $array = [], array $exclude = []) {
		$exclude = array_merge(
			[
				'before',
				'classWrapper',
				'help',
				'label'
			],
			$exclude
		);
		$attributes = [];
		foreach($array as $key => $value) {
			if(($value OR $value === 0) AND in_array($key, $exclude) === false) {
				// Désactive le message de modifications non enregistrées pour le champ
				if($key === 'noDirty') {
					$attributes[] = 'data-no-dirty';
				}
				// Disabled
				// Readonly
				elseif(in_array($key, ['disabled', 'readonly'])) {
					$attributes[] = sprintf('%s', $key);
				}
				// Autres
				else {
					$attributes[] = sprintf('%s="%s"', $key, $value);
				}
			}
		}
		return implode(' ', $attributes);
	}

	/**
	 * Retourne un segment de chaîne sans couper de mot
	 * @param string $text Texte à scinder
	 * @param int $start (voir substr de PHP pour fonctionnement)
	 * @param int $length (voir substr de PHP pour fonctionnement)
	 * @return string
	 */
	public static function subword($text, $start, $length) {
		$text = trim($text);
		if(strlen($text) > $length) {
			$text = mb_substr($text, $start, $length);
			$text = mb_substr($text, 0, min(mb_strlen($text), mb_strrpos($text, ' ')));
		}
		return $text;
	}

}

class layout extends common {

	private $core;

	/**
	 * Constructeur du layout
	 */
	public function __construct(core $core) {
		parent::__construct();
		$this->core = $core;
	}

	/**
	 * Affiche le script Google Analytics
	 */
	public function showAnalytics() {
		if($code = $this->getData(['config', 'analyticsId'])) {
			echo '<script>
				(function(i,s,o,g,r,a,m){i["GoogleAnalyticsObject"]=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,"script","https://www.google-analytics.com/analytics.js","ga");
				ga("create", "' . $code . '", "auto");
				ga("send", "pageview");
			</script>';
		}
	}

	/**
	 * Affiche le contenu
	 * @param Page par défaut 
	 */
	public function showContent() {
		if(
			$this->core->output['title']
			AND (
				$this->getData(['page', $this->getUrl(0)]) === null
				OR $this->getData(['page', $this->getUrl(0), 'hideTitle']) === false
			)
		) {
			echo '<h2 id="sectionTitle">' . $this->core->output['title'] . '</h2>';				
		}
		echo $this->core->output['content'];
	}



/**
     * Affiche le copyright
     */
    public function showCopyright() {
        $items = '<div id="footerCopyright">';
        $items .= 'Motorisé&nbsp;par&nbsp;<a href="http://zwiicms.com/" onclick="window.open(this.href);return false" data-tippy-content="Zwii CMS sans base de données, très léger et performant">Zwii</a>';
        $items .= '&nbsp;|&nbsp;<a href="' . helper::baseUrl() . 'sitemap" data-tippy-content="Plan du site" >Plan&nbsp;du&nbsp;site</a>';
        if(
            (
                $this->getData(['theme', 'footer', 'loginLink'])
                AND $this->getUser('password') !== $this->getInput('ZWII_USER_PASSWORD')
            )
            OR $this->getUrl(0) === 'theme'
        ) {
            $items .= '<span id="footerLoginLink" ' . ($this->getUrl(0) === 'theme' ? 'class="displayNone"' : '') . '>&nbsp;|&nbsp;<a href="' . helper::baseUrl() . 'user/login/' . str_replace('/', '_', $this->getUrl()) . '" data-tippy-content="Connexion à l\'administration" >Connexion</a></span>';
        }
        $items .= '</div>';
        echo $items;
    }

	/**
	 * Affiche le favicon
	 */
	public function showFavicon() {
		if($favicon = $this->getData(['config', 'favicon'])) {
			echo '<link rel="shortcut icon" href="' . helper::baseUrl(false) . 'site/file/source/' . $favicon . '">';
		}
	}

	/**
	 * Affiche le texte du footer
	 */
	public function showFooterText() {
		if($footerText = $this->getData(['theme', 'footer', 'text']) OR $this->getUrl(0) === 'theme') {
			echo '<div id="footerText">' . nl2br($footerText) . '</div>';
		}
	}

	/**
	 * Affiche le menu
	 */
	public function showMenu() {
		// Met en forme les items du menu
		$items = '';
		$currentPageId = $this->getData(['page', $this->getUrl(0)]) ? $this->getUrl(0) : $this->getUrl(2);
		foreach($this->getHierarchy() as $parentPageId => $childrenPageIds) {
			// Propriétés de l'item
			$active = ($parentPageId === $currentPageId OR in_array($currentPageId, $childrenPageIds)) ? ' class="active"' : '';
			$targetBlank = $this->getData(['page', $parentPageId, 'targetBlank']) ? ' target="_blank"' : '';
			// Mise en page de l'item
			$items .= '<li>';
			
			if ( $this->getData(['page',$parentPageId,'disable']) === true
				 AND $this->getUser('password') !== $this->getInput('ZWII_USER_PASSWORD')	)

					{$items .= '<a href="'.$this->getUrl(1).'">';
			} else {
					$items .= '<a href="' . helper::baseUrl() . $parentPageId . '"' . $active . $targetBlank . '>';	
			}


			switch ($this->getData(['page', $parentPageId, 'typeMenu'])) {
				case '' :
				    $items .= $this->getData(['page', $parentPageId, 'title']);
				    break;
				case 'text' :
				    $items .= $this->getData(['page', $parentPageId, 'title']);
				    break;
				case 'icon' :
				    if ($this->getData(['page', $parentPageId, 'iconUrl']) != "") {
				    $items .= '<img alt="'.$this->getData(['page', $parentPageId, 'title']).'" src="'. helper::baseUrl(false) .'site/file/source/'.$this->getData(['page', $parentPageId, 'iconUrl']).'" />';
				    } else {
				    $items .= $this->getData(['page', $parentPageId, 'title']);
				    }
				    break;
				case 'icontitle' :
				    if ($this->getData(['page', $parentPageId, 'iconUrl']) != "") {
				    	$items .= '<img alt="'.$this->getData(['page', $parentPageId, 'title']).'" src="'. helper::baseUrl(false) .'site/file/source/'.$this->getData(['page', $parentPageId, 'iconUrl']).'" data-tippy-content="';
				   	 	$items .= $this->getData(['page', $parentPageId, 'title']).'"/>';
				    } else {
				  	 	$items .= $this->getData(['page', $parentPageId, 'title']);
				    }
					break;
		       }



			if($childrenPageIds) {
				$items .= template::ico('down', 'left');
			}
			$items .= '</a>';



			$items .= '<ul>';
			foreach($childrenPageIds as $childKey) {
				// Propriétés de l'item
				$active = ($childKey === $currentPageId) ? ' class="active"' : '';
				$targetBlank = $this->getData(['page', $childKey, 'targetBlank']) ? ' target="_blank"' : '';
				// Mise en page du sous-item

				if ( $this->getData(['page',$childKey,'disable']) === true
					AND $this->getUser('password') !== $this->getInput('ZWII_USER_PASSWORD')	)

						{$items .= '<a href="'.$this->getUrl(1).'">';}
				else {
					$items .= '<a href="' . helper::baseUrl() . $childKey . '"' . $active . $targetBlank . '>';			}

				switch ($this->getData(['page', $childKey, 'typeMenu'])) {
					case '' :
						$items .= $this->getData(['page', $childKey, 'title']);
						break;
					case 'text' :
						$items .= $this->getData(['page', $childKey, 'title']);
						break;
					case 'icon' :
						if ($this->getData(['page', $childKey, 'iconUrl']) != "") {
						$items .= '<img alt="'.$this->getData(['page', $parentPageId, 'title']).'" src="'. helper::baseUrl(false) .'site/file/source/'.$this->getData(['page', $childKey, 'iconUrl']).'" />';
						} else {
						$items .= $this->getData(['page', $parentPageId, 'title']);
						}
						break;
					case 'icontitle' :
						if ($this->getData(['page', $childKey, 'iconUrl']) != "") {
						$items .= '<img alt="'.$this->getData(['page', $parentPageId, 'title']).'" src="'. helper::baseUrl(false) .'site/file/source/'.$this->getData(['page', $childKey, 'iconUrl']).'" data-tippy-content="';
						$items .= $this->getData(['page', $childKey, 'title']).'"/>';
						} else {
						$items .= $this->getData(['page', $childKey, 'title']);
						}
						break;
					case 'icontext' :
						if ($this->getData(['page', $childKey, 'iconUrl']) != "") {
						$items .= '<img alt="'.$this->getData(['page', $parentPageId, 'title']).'" src="'. helper::baseUrl(false) .'site/file/source/'.$this->getData(['page', $childKey, 'iconUrl']).'" />';
						$items .= $this->getData(['page', $childKey, 'title']);
						} else {
						$items .= $this->getData(['page', $childKey, 'title']);
						}
						break;
				}
				$items .=  '</a></li>';
				// Menu Image

			}
			$items .= '</ul>';
			$items .= '</li>';

		}
		// Lien de connexion
		if(
			(
				$this->getData(['theme', 'menu', 'loginLink'])
				AND $this->getUser('password') !== $this->getInput('ZWII_USER_PASSWORD')
			)
			OR $this->getUrl(0) === 'theme'
		) {
			$items .= '<li id="menuLoginLink" ' . ($this->getUrl(0) === 'theme' ? 'class="displayNone"' : '') . '><a href="' . helper::baseUrl() . 'user/login/' . str_replace('/', '_', $this->getUrl()) . '">Connexion</a></li>';
		}
		// Retourne les items du menu
		echo '<ul>' . $items . '</ul>';
	}

	/**
	 * Affiche le meta titre
	 */
	public function showMetaTitle() {
		echo '<title>' . $this->core->output['metaTitle'] . '</title>';
		echo '<meta property="og:title" content="' . $this->core->output['metaTitle'] . '" />';
	}

	/**
	 * Affiche la meta description
	 */
	public function showMetaDescription() {
		echo '<meta name="description" content="' . $this->core->output['metaDescription'] . '" />';
		echo '<meta property="og:description" content="' . $this->core->output['metaDescription'] . '" />';
	}

	/**
	 * Affiche le meta type
	 */
	public function showMetaType() {
		echo '<meta property="og:type" content="website" />';
	}

	/**
	 * Affiche la meta image (site screenshot)
	 */
	public function showMetaImage() {
		echo '<meta property="og:image" content="' . helper::baseUrl() .'/site/file/source/screenshot.png" />';
	}



	/**
	 * Affiche la notification
	 */
	public function showNotification() {
		if(common::$inputNotices) {
			$notification = 'Impossible de soumettre le formulaire, car il contient des erreurs';
			$notificationClass = 'notificationError';
		}
		elseif(empty($_SESSION['ZWII_NOTIFICATION_SUCCESS']) === false) {
			$notification = $_SESSION['ZWII_NOTIFICATION_SUCCESS'];
			$notificationClass = 'notificationSuccess';
			unset($_SESSION['ZWII_NOTIFICATION_SUCCESS']);
		}
		elseif(empty($_SESSION['ZWII_NOTIFICATION_ERROR']) === false) {
			$notification = $_SESSION['ZWII_NOTIFICATION_ERROR'];
			$notificationClass = 'notificationError';
			unset($_SESSION['ZWII_NOTIFICATION_ERROR']);
		}
		elseif(empty($_SESSION['ZWII_NOTIFICATION_OTHER']) === false) {
			$notification = $_SESSION['ZWII_NOTIFICATION_OTHER'];
			$notificationClass = 'notificationOther';
			unset($_SESSION['ZWII_NOTIFICATION_OTHER']);
		}
		if(isset($notification) AND isset($notificationClass)) {
			echo '<div id="notification" class="' . $notificationClass . '">' . $notification . '<span id="notificationClose">' . template::ico('cancel') . '</span><div id="notificationProgress"></div></div>';
		}
	}

	/**
	 * Affiche la barre de membre
	 */
	public function showBar() {
		if($this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')) {
			// Items de gauche
			$leftItems = '';
			if($this->getUser('group') >= self::GROUP_MODERATOR) {
				$leftItems .= '<li><select id="barSelectPage">';
				$leftItems .= '<option value="">Choisissez une page</option>';
				$currentPageId = $this->getData(['page', $this->getUrl(0)]) ? $this->getUrl(0) : $this->getUrl(2);			
				foreach($this->getHierarchy(null, false) as $parentPageId => $childrenPageIds) {
					$leftItems .= '<option value="' . helper::baseUrl() . $parentPageId . '"' . ($parentPageId === $currentPageId ? ' selected' : false) . '>' . $this->getData(['page', $parentPageId, 'title']) . '</option>';
					foreach($childrenPageIds as $childKey) {
						$leftItems .= '<option value="' . helper::baseUrl() . $childKey . '"' . ($childKey === $currentPageId ? ' selected' : false) . '>&nbsp;&nbsp;&nbsp;&nbsp;' . $this->getData(['page', $childKey, 'title']) . '</option>';
					}
				}
				$leftItems .= '</select></li>';
				$leftItems .= '<li><a href="' . helper::baseUrl() . 'page/add" data-tippy-content="Créer une page ou<br>une barre latérale">' . template::ico('plus') . '</a></li>';
				if(
					// Sur un module de page qui autorise le bouton de modification de la page
					$this->core->output['showBarEditButton']
					// Sur une page sans module
					OR $this->getData(['page', $this->getUrl(0), 'moduleId']) === ''
					// Sur une page d'accueil
					OR $this->getUrl(0) === ''
				) {
					$leftItems .= '<li><a href="' . helper::baseUrl() . 'page/edit/' . $this->getUrl(0) . '" data-tippy-content="Modifier la page">' . template::ico('pencil') . '</a></li>';
				}
			}
			// Items de droite
			$rightItems = '';
			if($this->getUser('group') >= self::GROUP_MODERATOR) {

				$rightItems .= '<li><a href="' . helper::baseUrl(false) . 'core/vendor/filemanager/dialog.php?type=0&akey=' . md5_file('site/data/core.json') .'" data-tippy-content="Gérer les fichiers" data-lity>' . template::ico('folder') . '</a></li>';
			}
			if($this->getUser('group') >= self::GROUP_ADMIN) {
				$rightItems .= '<li><a href="' . helper::baseUrl() . 'user" data-tippy-content="Configurer les utilisateurs">' . template::ico('users') . '</a></li>';
				$rightItems .= '<li><a href="' . helper::baseUrl() . 'theme" data-tippy-content="Personnaliser le thème">' . template::ico('brush') . '</a></li>';
				$rightItems .= '<li><a href="' . helper::baseUrl() . 'config" data-tippy-content="Configurer le site">' . template::ico('gear') . '</a></li>';
				// Mise à jour automatique
				// Désactivée en dev
				 if(helper::checkNewVersion() && stripos(common::ZWII_VERSION, 'dev') === FALSE ) {
				  $rightItems .= '<li><a id="barUpdate" href="' . helper::baseUrl() . 'install/update" data-tippy-content="Mettre à jour Zwii '. common::ZWII_VERSION .' vers '. helper::getOnlineVersion() .'">' . template::ico('update colorRed') . '</a></li>';
				 }
				// Mise à jour automatique
			}
			$rightItems .= '<li><a href="' . helper::baseUrl() . 'user/edit/' . $this->getUser('id'). '/' . $_SESSION['csrf'] . '" data-tippy-content="Configurer mon compte">' . template::ico('user', 'right') . $this->getUser('firstname') . ' ' . $this->getUser('lastname') . '</a></li>';
			$rightItems .= '<li><a id="barLogout" href="' . helper::baseUrl() . 'user/logout" data-tippy-content="Se déconnecter">' . template::ico('logout') . '</a></li>';
			// Barre de membre 
			echo '<div id="bar"><div class="container"><ul id="barLeft">' . $leftItems . '</ul><ul id="barRight">' . $rightItems . '</ul></div></div>';
		}
	}

	/**
	 * Affiche le script
	 */
	public function showScript() {
		ob_start();
		require 'core/core.js.php';
		$coreScript = ob_get_clean();
		echo '<script>' . helper::minifyJs($coreScript . $this->core->output['script']) . '</script>';
	}

	/**
	 * Affiche le style
	 */
	public function showStyle() {
		if($this->core->output['style']) {
			echo '<style>' . helper::minifyCss($this->core->output['style']) . '</style>';
		}
	}

	/**
	 * Affiche les réseaux sociaux
	 */
	public function showSocials() {
		$socials = '';
		foreach($this->getData(['config', 'social']) as $socialName => $socialId) {
			switch($socialName) {
				case 'facebookId':
					$socialUrl = 'https://www.facebook.com/';
					$title = 'Facebook';
					break;
				case 'googleplusId':
					$socialUrl = 'https://plus.google.com/';
					$title = 'Google +';
					break;
				case 'instagramId':
					$socialUrl = 'https://www.instagram.com/';
					$title = 'Instagram';
					break;
				case 'pinterestId':
					$socialUrl = 'https://pinterest.com/';
					$title = 'Pinterest';
					break;
				case 'twitterId':
					$socialUrl = 'https://twitter.com/';
					$title = 'Twitter';
					break;
				case 'youtubeId':
					$socialUrl = 'https://www.youtube.com/channel/';
					break;
				default:
					$socialUrl = '';
			}
			if($socialId !== '') {
				$socials .= '<a href="' . $socialUrl . $socialId . '" onclick="window.open(this.href);return false" data-tippy-content="' . $title . '">' . template::ico(substr($socialName, 0, -2)) . '</a>';
			}
		}
		if($socials !== '') {
			echo '<div id="footerSocials">' . $socials . '</div>';
		}
	}

	/**
	 * Affiche l'import des librairies
	 */
	public function showVendor() {
		// Variables partagées
		$vars = 'var baseUrl = ' . json_encode(helper::baseUrl(false)) . ';';
		$vars .= 'var baseUrlQs = ' . json_encode(helper::baseUrl()) . ';';
		if(
			$this->getUser('password') === $this->getInput('ZWII_USER_PASSWORD')
			AND $this->getUser('group') >= self::GROUP_MODERATOR
		) {
			$vars .= 'var privateKey = ' . json_encode(md5_file('site/data/core.json')) . ';';
		}
		echo '<script>' . helper::minifyJs($vars) . '</script>';
		// Librairies
		$moduleId = $this->getData(['page', $this->getUrl(0), 'moduleId']);
		foreach($this->core->output['vendor'] as $vendorName) {
			// Coeur
			if(file_exists('core/vendor/' . $vendorName . '/inc.json')) {
				$vendorPath = 'core/vendor/' . $vendorName . '/';
			}
			// Module
			elseif(
				$moduleId
				AND in_array($moduleId, self::$coreModuleIds) === false
				AND file_exists('module/' . $moduleId . '/vendor/' . $vendorName . '/inc.json')
			) {
				$vendorPath = 'module/' . $moduleId . '/vendor/' . $vendorName . '/';
			}
			// Sinon continue
			else {
				continue;
			}
			// Détermine le type d'import en fonction de l'extension de la librairie
			$vendorFiles = json_decode(file_get_contents($vendorPath . 'inc.json'));
			foreach($vendorFiles as $vendorFile) {
				switch(pathinfo($vendorFile, PATHINFO_EXTENSION)) {
					case 'css':
						echo '<link rel="stylesheet" href="' . helper::baseUrl(false) . $vendorPath . $vendorFile . '">';
						break;
					case 'js':
						echo '<script src="' . helper::baseUrl(false) . $vendorPath . $vendorFile . '"></script>';
						break;
				}
			}
		}
	}

}

class template {

	/**
	 * Crée un bouton
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function button($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'class' => '',
			'disabled' => false,
			'href' => 'javascript:void(0);',
			'ico' => '',
			'id' => $nameId,
			'name' => $nameId,
			'target' => '',
			'uniqueSubmission' => false,
			'value' => 'Bouton'
		], $attributes);
		// Retourne le html
		return sprintf(
			'<a %s class="button %s %s %s">%s</a>',
			helper::sprintAttributes($attributes, ['class', 'disabled', 'ico', 'value']),
			$attributes['disabled'] ? 'disabled' : '',
			$attributes['class'],
			$attributes['uniqueSubmission'] ? 'uniqueSubmission' : '',
			($attributes['ico'] ? template::ico($attributes['ico'], 'right') : '') . $attributes['value']
		);
	}

	/**
	 * Crée un champ capcha
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function capcha($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'class' => '',
			'classWrapper' => '',
			'help' => '',
			'id' => $nameId,
			'name' => $nameId,
			'value' => ''
		], $attributes);
		// Génère deux nombres pour le capcha
		$firstNumber = mt_rand(1, 15);
		$secondNumber = mt_rand(1, 15);
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		$html .= self::label($attributes['id'], 'Combien font ' . $firstNumber . ' + ' . $secondNumber . ' ?', [
			'help' => $attributes['help']
		]);
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Capcha
		$html .= sprintf(
			'<input type="text" %s>',
			helper::sprintAttributes($attributes)
		);
		// Champs cachés contenant les nombres
		$html .= self::hidden($attributes['id'] . 'FirstNumber', [
			'value' => $firstNumber,
			'before' => false
		]);
		$html .= self::hidden($attributes['id'] . 'SecondNumber', [
			'value' => $secondNumber,
			'before' => false
		]);
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée une case à cocher à sélection multiple
	 * @param string $nameId Nom et id du champ
	 * @param string $value Valeur de la case à cocher
	 * @param string $label Label de la case à cocher
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function checkbox($nameId, $value, $label, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'before' => true,
			'checked' => '',
			'class' => '',
			'classWrapper' => '',
			'disabled' => false,
			'help' => '',
			'id' => $nameId,
			'name' => $nameId
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['checked'] = (bool) common::$inputBefore[$attributes['id']];
		}
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Case à cocher
		$html .= sprintf(
			'<input type="checkbox" value="%s" %s>',
			$value,
			helper::sprintAttributes($attributes)
		);
		// Label
		$html .= self::label($attributes['id'], '<span>' . $label . '</span>', [
			'help' => $attributes['help']
		]);
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée un champ date
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function date($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'autocomplete' => 'on',
			'before' => true,
			'class' => '',
			'classWrapper' => '',
			'noDirty' => false,
			'disabled' => false,
			'help' => '',
			'id' => $nameId,
			'label' => '',
			'name' => $nameId,
			'placeholder' => '',
			'readonly' => true,
			'value' => ''
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['value'] = common::$inputBefore[$attributes['id']];
		}
		else {
			$attributes['value'] = ($attributes['value'] ? helper::filter($attributes['value'], helper::FILTER_TIMESTAMP) : '');
		}
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		if($attributes['label']) {
			$html .= self::label($attributes['id'], $attributes['label'], [
				'help' => $attributes['help']
			]);
		}
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Date visible
		$html .= sprintf(
			'<input type="text" class="datepicker %s" value="%s" %s>',
			$attributes['class'],
			$attributes['value'],
			helper::sprintAttributes($attributes, ['class', 'value'])
		);
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée un champ d'upload de fichier
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function file($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'before' => true,
			'class' => '',
			'classWrapper' => '',
			'noDirty' => false,
			'disabled' => false,
			'extensions' => '',
			'help' => '',
			'id' => $nameId,
			'label' => '',
			'maxlength' => '500',
			'name' => $nameId,
			'type' => 2,
			'value' => ''
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['value'] = common::$inputBefore[$attributes['id']];
		}
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		if($attributes['label']) {
			$html .= self::label($attributes['id'], $attributes['label'], [
				'help' => $attributes['help']
			]);
		}
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Champ caché contenant l'url de la page
		$html .= self::hidden($attributes['id'], [
			'class' => 'inputFileHidden',
			'disabled' => $attributes['disabled'],
			'maxlength' => $attributes['maxlength'],
			'value' => $attributes['value']
		]);
		// Champ d'upload
		$html .= '<div>';
		$html .= sprintf(
			'<a
				href="' .
					helper::baseUrl(false) . 'core/vendor/filemanager/dialog.php' .
					'?relative_url=1' .
					'&field_id=' . $attributes['id'] .
					'&type=' . $attributes['type'] .
					'&akey=' . md5_file('site/data/core.json') .
					($attributes['extensions'] ? '&extensions=' . $attributes['extensions'] : '')
				. '"
				class="inputFile %s %s"
				%s
				data-lity
			>
				' . self::ico('download', 'right') . '
				<span class="inputFileLabel"></span>
			</a>',
			$attributes['class'],
			$attributes['disabled'] ? 'disabled' : '',
			helper::sprintAttributes($attributes, ['class', 'extensions', 'type', 'maxlength'])
		);
		$html .= self::button($attributes['id'] . 'Delete', [
			'class' => 'inputFileDelete',
			'value' => self::ico('cancel')
		]);
		$html .= '</div>';
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Ferme un formulaire
	 * @return string
	 */
	public static function formClose() {
		return '</form>';
	}

	/**
	 * Ouvre un formulaire protégé par CSRF
	 * @param string $id Id du formulaire
	 * @return string
	 */
	public static function formOpen($id) {
		// Ouverture formulaire
		$html = '<form id="' . $id . '" method="post">';
		// Stock le token CSRF
		$html .= self::hidden('csrf', [
			'value' => $_SESSION['csrf']
		]);
		// Retourne le html
		return $html;
	}



	/**
	 * Crée une aide qui s'affiche au survole
	 * @param string $text Texte de l'aide
	 * @return string
	 */
	public static function help($text) {
		return '<span class="helpButton" data-tippy-content="' . $text . '">' . self::ico('help') . '</span>';
	}

	/**
	 * Crée un champ caché
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function hidden($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'before' => true,
			'class' => '',
			'noDirty' => false,
			'id' => $nameId,
			'maxlength' => '500',
			'name' => $nameId,
			'value' => ''
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['value'] = common::$inputBefore[$attributes['id']];
		}
		// Texte
		$html = sprintf('<input type="hidden" %s>', helper::sprintAttributes($attributes, ['before']));
		// Retourne le html
		return $html;
	}

	/**
	 * Crée un icône
	 * @param string $ico Classe de l'icône
	 * @param string $margin Ajoute un margin autour de l'icône (choix : left, right, all)
	 * @param bool $animate Ajoute une animation à l'icône
	 * @param string $fontSize Taille de la police
	 * @return string
	 */
	public static function ico($ico, $margin = '', $animate = false, $fontSize = '1em') {
		return '<span class="zwiico-' . $ico . ($margin ? ' zwiico-margin-' . $margin : '') . ($animate ? ' animate-spin' : '') . '" style="font-size:' . $fontSize . '"></span>';
	}

	/**
	 * Crée un label
	 * @param string $for For du label
	 * @param array $attributes Attributs ($key => $value)
	 * @param string $text Texte du label
	 * @return string
	 */
	public static function label($for, $text, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'class' => '',
			'for' => $for,
			'help' => ''
		], $attributes);
		// Ajout d'une aide
		if($attributes['help'] !== '') {
			$text = $text . self::help($attributes['help']);
		}
		// Retourne le html
		return sprintf(
			'<label %s>%s</label>',
			helper::sprintAttributes($attributes),
			$text
		);
	}

	/**
	 * Crée un champ mail
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function mail($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'autocomplete' => 'on',
			'before' => true,
			'class' => '',
			'classWrapper' => '',
			'noDirty' => false,
			'disabled' => false,
			'help' => '',
			'id' => $nameId,
			'label' => '',
			'maxlength' => '500',
			'name' => $nameId,
			'placeholder' => '',
			'readonly' => false,
			'value' => ''
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['value'] = common::$inputBefore[$attributes['id']];
		}
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		if($attributes['label']) {
			$html .= self::label($attributes['id'], $attributes['label'], [
				'help' => $attributes['help']
			]);
		}
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Texte
		$html .= sprintf(
			'<input type="email" %s>',
			helper::sprintAttributes($attributes)
		);
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée une notice
	 * @param string $id Id du champ
	 * @param string $notice Notice
	 * @return string
	 */
	public static function notice($id, $notice) {
		return ' <span id="' . $id . 'Notice" class="notice ' . ($notice ? '' : 'displayNone') . '">' . $notice . '</span>';
	}

	/**
	 * Crée un champ mot de passe
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function password($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'autocomplete' => 'on',
			'class' => '',
			'classWrapper' => '',
			'noDirty' => false,
			'disabled' => false,
			'help' => '',
			'id' => $nameId,
			'label' => '',
			'maxlength' => '500',
			'name' => $nameId,
			'placeholder' => '',
			'readonly' => false
		], $attributes);
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		if($attributes['label']) {
			$html .= self::label($attributes['id'], $attributes['label'], [
				'help' => $attributes['help']
			]);
		}
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Mot de passe
		$html .= sprintf(
			'<input type="password" %s>',
			helper::sprintAttributes($attributes)
		);
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée un champ sélection
	 * @param string $nameId Nom et id du champ
	 * @param array $options Liste des options du champ de sélection ($value => $text)
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function select($nameId, array $options, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'before' => true,
			'class' => '',
			'classWrapper' => '',
			'noDirty' => false,
			'disabled' => false,
			'help' => '',
			'id' => $nameId,
			'label' => '',
			'name' => $nameId,
			'selected' => ''
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['selected'] = common::$inputBefore[$attributes['id']];
		}
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		if($attributes['label']) {
			$html .= self::label($attributes['id'], $attributes['label'], [
				'help' => $attributes['help']
			]);
		}
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Début sélection
		$html .= sprintf('<select %s>',
			helper::sprintAttributes($attributes)
		);
		foreach($options as $value => $text) {
			$html .= sprintf(
				'<option value="%s"%s>%s</option>',
				$value,
				$attributes['selected'] == $value ? ' selected' : '', // Double == pour ignorer le type de variable car $_POST change les types en string
				$text
			);
		}
		// Fin sélection
		$html .= '</select>';
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée une bulle de dialogue
	 * @param string $text Texte de la bulle
	 * @return string
	 */
	public static function speech($text) {
		return '<div class="speech"><div class="speechBubble">' . $text . '</div>' . template::ico('mimi speechMimi', '', false, '7em') . '</div>';
	}

	/**
	 * Crée un bouton validation
	 * @param string $nameId Nom & id du bouton validation
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function submit($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'class' => '',
			'disabled' => false,
			'ico' => 'check',
			'id' => $nameId,
			'name' => $nameId,
			'uniqueSubmission' => true,
			'value' => 'Enregistrer'
		], $attributes);
		// Retourne le html
		return sprintf(
			'<button type="submit" class="%s %s" %s>%s</button>',
			$attributes['class'],
			$attributes['uniqueSubmission'] ? 'uniqueSubmission' : '',
			helper::sprintAttributes($attributes, ['class', 'ico', 'value']),
			($attributes['ico'] ? template::ico($attributes['ico'], 'right') : '') . $attributes['value']
		);
	}

	/**
	 * Crée un tableau
	 * @param array $cols Cols des colonnes (format: [col colonne1, col colonne2, etc])
	 * @param array $body Contenu (format: [[contenu1, contenu2, etc], [contenu1, contenu2, etc]])
	 * @param array $head Entêtes (format : [[titre colonne1, titre colonne2, etc])
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function table(array $cols = [], array $body = [], array $head = [], array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'class' => '',
			'classWrapper' => '',
			'id' => ''
		], $attributes);
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="tableWrapper ' . $attributes['classWrapper']. '">';
		// Début tableau
		$html .= '<table id="' . $attributes['id'] . '" class="table ' . $attributes['class']. '">';
		// Entêtes
		if($head) {
			// Début des entêtes
			$html .= '<thead>';
			$html .= '<tr>';
			$i = 0;
			foreach($head as $th) {
				$html .= '<th class="col' . $cols[$i++] . '">' . $th . '</th>';
			}
			// Fin des entêtes
			$html .= '</tr>';
			$html .= '</thead>';
		}
		// Début contenu
		$html .= '<tbody>';
		foreach($body as $tr) {
			$html .= '<tr>';
			$i = 0;
			foreach($tr as $td) {
				$html .= '<td class="col' . $cols[$i++] . '">' . $td . '</td>';
			}
			$html .= '</tr>';
		}
		// Fin contenu
		$html .= '</tbody>';
		// Fin tableau
		$html .= '</table>';
		// Fin container
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée un champ texte court
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function text($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'autocomplete' => 'on',
			'before' => true,
			'class' => '',
			'classWrapper' => '',
			'noDirty' => false,
			'disabled' => false,
			'help' => '',
			'id' => $nameId,
			'label' => '',
			'maxlength' => '500',
			'name' => $nameId,
			'placeholder' => '',
			'readonly' => false,
			'value' => ''
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['value'] = common::$inputBefore[$attributes['id']];
		}
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		if($attributes['label']) {
			$html .= self::label($attributes['id'], $attributes['label'], [
				'help' => $attributes['help']
			]);
		}
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Texte
		$html .= sprintf(
			'<input type="text" %s>',
			helper::sprintAttributes($attributes)
		);
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}

	/**
	 * Crée un champ texte long
	 * @param string $nameId Nom et id du champ
	 * @param array $attributes Attributs ($key => $value)
	 * @return string
	 */
	public static function textarea($nameId, array $attributes = []) {
		// Attributs par défaut
		$attributes = array_merge([
			'before' => true,
			'class' => '', // editorWysiwyg et editorCss possible pour utiliser le éditeurs (il faut également instancier les librairies)
			'classWrapper' => '',
			'disabled' => false,
			'noDirty' => false,
			'help' => '',
			'id' => $nameId,
			'label' => '',
			'maxlength' => '500000',
			'name' => $nameId,
			'readonly' => false,
			'value' => ''
		], $attributes);
		// Sauvegarde des données en cas d'erreur
		if($attributes['before'] AND array_key_exists($attributes['id'], common::$inputBefore)) {
			$attributes['value'] = common::$inputBefore[$attributes['id']];
		}
		// Début du wrapper
		$html = '<div id="' . $attributes['id'] . 'Wrapper" class="inputWrapper ' . $attributes['classWrapper'] . '">';
		// Label
		if($attributes['label']) {
			$html .= self::label($attributes['id'], $attributes['label'], [
				'help' => $attributes['help']
			]);
		}
		// Notice
		$notice = '';
		if(array_key_exists($attributes['id'], common::$inputNotices)) {
			$notice = common::$inputNotices[$attributes['id']];
			$attributes['class'] .= ' notice';
		}
		$html .= self::notice($attributes['id'], $notice);
		// Texte long
		$html .= sprintf(
			'<textarea %s>%s</textarea>',
			helper::sprintAttributes($attributes, ['value']),
			$attributes['value']
		);
		// Fin du wrapper
		$html .= '</div>';
		// Retourne le html
		return $html;
	}
}