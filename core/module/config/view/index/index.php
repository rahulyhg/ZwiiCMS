<?php echo template::formOpen('configForm'); ?>
	<div class="row">
		<div class="col2">
			<?php echo template::button('configBack', [
				'class' => 'buttonGrey',
				'href' => helper::baseUrl(false),
				'ico' => 'home',
				'value' => 'Accueil'
			]); ?>
		</div>
		<div class="col2 offset8">
			<?php echo template::submit('configSubmit'); ?>
		</div>
	</div>
	<div class="row">
		<div class="col6">
			<div class="block">
				<h4>Informations générales</h4>

				<?php echo template::select('configHomePageId', helper::arrayCollumn($this->getData(['page']), 'title', 'SORT_ASC'), [
					'label' => 'Page d\'accueil',
					'selected' => $this->getData(['config', 'homePageId'])
				]); ?>

				<?php echo template::text('configTitle', [
					'label' => 'Titre du site',
					'value' => $this->getData(['config', 'title']),
					'help'  => 'Affiché dans la barre de titre et inclus lors des partages sur les réseaux sociaux'
				]); ?>
				<?php echo template::textarea('configMetaDescription', [
					'label' => 'Description du site',
					'value' => $this->getData(['config', 'metaDescription']),
					'help'  => 'La description est incluse lors  des partages sur les réseaux sociaux'
				]); ?>
			</div>
			<div class="block">
				<h4>Options avancées</h4>
				<?php echo template::file('configFavicon', [
					'type' => 1,
					'help' => 'Pensez à supprimer le cache de votre navigateur si la favicon ne change pas.',
					'label' => 'Favicon',
					'value' => $this->getData(['config', 'favicon'])
				]); ?>
				<?php echo template::text('configAnalyticsId', [
					'help' => 'Saisissez l\'ID de suivi de votre propriété Google Analytics.',
					'label' => 'Google Analytics',
					'placeholder' => 'UA-XXXXXXXX-X',
					'value' => $this->getData(['config', 'analyticsId'])
				]); ?>
				<?php echo template::checkbox('configCookieConsent', true, 'Message de consentement pour l\'utilisation des cookies', [
					'checked' => $this->getData(['config', 'cookieConsent'])
				]); ?>					
				<?php echo template::checkbox('rewrite', true, 'Réécriture d\'URL', [
					'checked' => helper::checkRewrite(),
					'help' => 'Afin d\'éviter de bloquer votre site pensez à vérifier que le module de réécriture d\'URL est bien actif sur votre serveur avant d\'activer cette fonctionnalité.'
				]); ?>			
				<?php echo template::select('itemsperPage', $module::$ItemsList, [
					'label' => 'Pagination Blog et News',
					'selected' => $this->getData(['config', 'itemsperPage']),
					'help' => 'Nombre d\'articles de blog ou de news par page'
				]); ?>
			</div>
			<div class="block">
				<h4>Copie d'écran OpenGraph</h4>
				<div class="row">
					<div class="col6">
						<img src='<?php echo helper::baseUrl(false) . 'site/file/source/screenshot.png';?>' />
					</div>
					<div class="col6">		
						<?php echo template::button('configMetaImage', [
						'href' => helper::baseUrl() . 'config/configMetaImage',
						'value' => 'Rafraîchir la capture d\'écran'
						]); ?>
					</div>
				</div>
				<p>Cette copie d'écran est nécessaire aux partages sur les réseaux sociaux. Elle est régénérée lorsque le fichier screenshot.png est effacé du gestionnaire de fichiers.</p>
			</div>								
		</div>
		<div class="col6">
			<div class="block">
				<h4>Réseaux sociaux</h4>
				<div class="row">
					<div class="col6">
						<?php echo template::text('configSocialFacebookId', [
							'help' => 'Saisissez votre ID Facebook : https://www.facebook.com/[CETTE PARTIE].',
							'label' => 'Facebook',
							'value' => $this->getData(['config', 'social', 'facebookId'])
						]); ?>
					</div>
					<div class="col6">					
						<?php echo template::text('configSocialInstagramId', [
							'help' => 'Saisissez votre ID Instagram : https://www.instagram.com/[CETTE PARTIE].',
							'label' => 'Instagram',
							'value' => $this->getData(['config', 'social', 'instagramId'])
						]); ?>
					</div>
				</div>
				<div class="row">

					<div class="col6">
						<?php echo template::text('configSocialYoutubeId', [
							'help' => 'Saisissez votre ID Youtube : https://www.youtube.com/channel/[CETTE PARTIE].',
							'label' => 'Youtube',
							'value' => $this->getData(['config', 'social', 'youtubeId'])
						]); ?>
					</div>
					<div class="col6">
						<?php echo template::text('configSocialTwitterId', [
							'help' => 'Saisissez votre ID Twitter : https://twitter.com/[CETTE PARTIE].',
							'label' => 'Twitter',
							'value' => $this->getData(['config', 'social', 'twitterId'])
						]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col6">
						<?php echo template::text('configSocialPinterestId', [
							'help' => 'Saisissez votre ID Pinterest : https://pinterest.com/[CETTE PARTIE].',
							'label' => 'Pinterest',
							'value' => $this->getData(['config', 'social', 'pinterestId'])
						]); ?>
					</div>					
				</div>
			</div>
			<div class="block">
				<h4>Système</h4>
				<div class="row">
					<div  class="col6">
						<?php echo template::text('configVersion', [
						'label' => 'ZwiiCMS Version',
						'readonly' => true,
						'value' => common::ZWII_VERSION
					]); ?>	
					</div>	
					<div  class="col6">
						<?php echo template::text('moduleRedirectionVersion', [
							'label' => 'Module Redirection version',
							'readonly' => true,
							'value' => redirection::REDIRECTION_VERSION
						]); ?>
					</div>										
				</div>							
				<div class="row">
					<div  class="col6">
						<?php echo template::text('moduleFormVersion', [
							'label' => 'Module Form version',
							'readonly' => true,
							'value' => form::FORM_VERSION
						]); ?>
					</div>
					<div  class="col6">
						<?php echo template::text('moduleGalleryVersion', [
							'label' => 'Module Gallery version',
							'readonly' => true,
							'value' => gallery::GALLERY_VERSION
						]); ?>
					</div>										
				</div>
				<div class="row">
					<div  class="col6">
						<?php echo template::text('moduleNewsVersion', [
							'label' => 'Module News version',
							'readonly' => true,
							'value' => news::NEWS_VERSION
						]); ?>
					</div>
					<div  class="col6">
						<?php echo template::text('moduleBlogVersion', [
							'label' => 'Module Blog version',
							'readonly' => true,
							'value' => blog::BLOG_VERSION
						]); ?>
					</div>										
				</div>					
				<?php echo template::select('configTimezone', $module::$timezones, [
					'label' => 'Fuseau horaire',
					'selected' => $this->getData(['config', 'timezone'])
				]); ?>
				<?php echo template::checkbox('configMaintenance', true, 'Site en maintenance', [
					'checked' => $this->getData(['config', 'maintenance']),
					'help' => 'Le site devient inaccessible sauf pour les administrateurs.'
				]); ?>
				<?php echo template::checkbox('configAutoBackup', true, 'Sauvegarde automatique des données', [
					'checked' => $this->getData(['config', 'autoBackup']),
					'help' => 'Sauvegarde une fois par jour le fichier de données dans le dossier site/backup/. La sauvegarde est conservée 30 jours.'
				]); ?>
				<div class="row">
					<div class="col8 offset2">
						<?php echo template::button('configExport', [
							'href' => helper::baseUrl() . 'config/backup',
							'value' => 'Exporter une copie du site<br>(données, thème et fichiers)'
						]); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php echo template::formClose(); ?>