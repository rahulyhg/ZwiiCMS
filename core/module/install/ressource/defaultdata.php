<?php
class install extends common {

    public static $defaultData = [
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
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false				
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
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false				
			],
			'privee' => [
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
				'title' => 'Privée',
				'block' => '12',
				'barLeft' => '',
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false				
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
				'block' => '4-8',
				'barLeft' => 'barre',
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false
			],
			'menu-lateral' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '<p>Vous pouvez ajouter un menu dans les barres latérales</p>
							  <p>Les éléments des menu peuvent être masqués. </p>',
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
				'title' => 'Menu latéral',
				'block' => '9-3',
				'barLeft' => '',
				'barRight' => 'barre-menu',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false
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
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false								
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
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false
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
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => true								
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
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false								
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
				'barRight' => '',
				'displayMenu' => false,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false				
			],
			'barre-menu' => [
			    'typeMenu' => 'text',
                'iconUrl' => '',
                'disable' => false,
				'content' => '',
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
				'title' => 'Menu latéral',
				'block' => 'bar',
				'barLeft' => '',
				'barRight' => '',
				'displayMenu' => true,
				'hiddenMenuSide' => false,
				'hiddenMenuHead' => false					
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
					'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In a placerat metus. Morbi luctus laoreet dolor et euismod. Phasellus eget eros ac eros pretium tincidunt. Sed maximus magna lectus, non vestibulum sapien pretium maximus. Donec convallis leo tortor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras convallis lacus eu risus gravida varius. Etiam mattis massa vitae eros placerat bibendum.</p><p>Vivamus tempus magna augue, in bibendum quam blandit at. Morbi felis tortor, suscipit ut ipsum ut, volutpat consectetur orci. Nulla tincidunt quis ligula non viverra. Sed pretium dictum blandit. Donec fringilla, nunc at dictum pretium, arcu massa viverra leo, et porta turpis ipsum eget risus. Quisque quis maximus purus, in elementum arcu. Donec nisi orci, aliquam non luctus non, congue volutpat massa. Curabitur sed risus congue, porta arcu vel, tincidunt nisi. Duis tincidunt quam ut velit maximus ornare. Nullam sagittis, ante quis pharetra hendrerit, lorem massa dapibus mi, a hendrerit dolor odio nec augue. Nunc sem nisl, tincidunt vitae nunc et, viverra tristique diam. In eget dignissim lectus. Nullam volutpat lacus id ex dapibus viverra. Pellentesque ultricies lorem ut nunc elementum volutpat. Cras id ultrices justo.</p><p>Phasellus nec erat leo. Praesent at sem nunc. Vestibulum quis condimentum turpis. Cras semper diam vitae enim fringilla, ut fringilla mauris efficitur. In nec porttitor urna. Nam eros leo, vehicula eget lobortis sed, gravida id mauris. Nulla bibendum nunc tortor, non bibendum justo consectetur vel. Phasellus nec risus diam. In commodo tellus nec nulla fringilla, nec feugiat nunc consectetur. Etiam non eros sodales, sodales lacus vel, finibus leo. Quisque hendrerit tristique congue. Phasellus nec augue vitae libero elementum facilisis. Mauris pretium ornare nisi, non scelerisque velit consectetur sit amet.</p>',
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
					'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lobortis eros pharetra metus rutrum pretium et sagittis mauris. Donec commodo venenatis sem nec suscipit. In tempor sollicitudin scelerisque. Etiam quis nibh eleifend, congue nisl quis, ultricies ipsum. Integer at est a eros vulputate pellentesque eu vitae tellus. Nullam suscipit quam nisl. Vivamus dui odio, luctus ac fringilla ultrices, eleifend vel sapien. Integer sem ex, lobortis eu mattis eu, condimentum non libero. Aliquam non porttitor elit, eu hendrerit neque. Praesent tortor urna, tincidunt sed dictum id, rutrum tempus sapien.</p><p>Donec accumsan ante ac odio laoreet porttitor. Pellentesque et leo a leo scelerisque mattis id vel elit. Quisque egestas congue enim nec semper. Morbi mollis nibh sapien. Nunc quis fringilla lorem. Donec vel venenatis nunc. Donec lectus velit, tempor sit amet dui sed, consequat commodo enim. Nam porttitor neque semper, dapibus nunc bibendum, lobortis urna. Morbi ullamcorper molestie lectus a elementum. Curabitur eu cursus orci, sed tristique justo. In massa lacus, imperdiet eu elit quis, consectetur maximus magna. Integer suscipit varius ante vitae egestas. Morbi scelerisque fermentum ipsum, euismod faucibus mi tincidunt id. Sed at consectetur velit. Ut fermentum nunc nibh, at commodo felis lacinia nec.</p><p>Nullam a justo quis lectus facilisis semper eget quis sem. Morbi suscipit erat sem, non fermentum nunc luctus vel. Proin venenatis quam ut arcu luctus efficitur. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam sollicitudin tristique nunc nec convallis. Maecenas id tortor semper, tempus nisl laoreet, cursus lacus. Aliquam sagittis est in leo congue, a pharetra felis aliquet. Nulla gravida lobortis sapien, quis viverra enim ullamcorper sed. Donec ultrices sem eu volutpat dapibus. Nam euismod, tellus eu congue mollis, massa nisi finibus odio, vitae porta arcu urna ac lorem. Sed faucibus dignissim pretium. Pellentesque eget ante tellus. Pellentesque a elementum odio, sit amet vulputate diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hendrerit consequat dolor, malesuada pellentesque tellus molestie non. Aenean quis purus a lectus pellentesque laoreet.</p>',
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
					'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut tempus nibh. Cras eget iaculis justo, ac laoreet lacus. Nunc tellus nulla, auctor id hendrerit eu, pellentesque in sapien. In hac habitasse platea dictumst. Aliquam leo urna, hendrerit id nunc eget, finibus maximus dolor. Sed rutrum sapien consectetur, tincidunt nulla at, blandit quam. Duis ex enim, vehicula vel nisi vitae, lobortis volutpat nisl. Vivamus enim libero, euismod nec risus vel, interdum placerat elit. In cursus sapien condimentum dui imperdiet, sed lobortis ante consectetur. Maecenas hendrerit eget felis non consequat.</p><p>Nullam nec risus non velit efficitur tempus eget tincidunt mauris. Etiam venenatis leo id justo sagittis, commodo dignissim sapien tristique. Vivamus finibus augue malesuada sapien gravida rutrum. Integer mattis lectus ac pulvinar scelerisque. Integer suscipit feugiat metus, ac molestie odio suscipit eget. Fusce at elit in tellus venenatis finibus id sit amet magna. Integer sodales luctus neque blandit posuere. Cras pellentesque dictum lorem eget vestibulum. Quisque vitae metus non nisi efficitur rhoncus ut vitae ipsum. Donec accumsan massa at est faucibus lacinia. Quisque imperdiet luctus neque eu vestibulum. Phasellus pellentesque felis ligula, id imperdiet elit ultrices eu.</p>',
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
				'font' => 'Open+Sans',				
				'fontSize' => '0.8em',
				'fontWeight' => 'normal',				
				'height' => '10px',
				'loginLink' => true,
				'margin' => false,
				'position' => 'site',
				'textColor' => 'rgba(33, 34, 35, 1)',
				'copyrightPosition' => 'right',
				'copyrightAlign' => 'right',
				'text' => 'Pied de page personnalisé',				
				'textPosition' => 'left',
				'textAlign' => 'left',	
				'textTransform' => 'none',							
				'socialsPosition' => 'center',
				'socialsAlign' => 'center'
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
}