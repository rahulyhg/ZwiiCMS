<?php $this->makeImageTag(); ?>
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

				<?php echo template::select('configHomePageId', helper::arrayColumn($this->getData(['page']), 'title', 'VAL_SORT_ASC'), [
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
			
								
				<?php echo template::select('ItemsperPage', $module::$ItemsList, [
					'label' => 'Pagination Blog et News',
					'selected' => $this->getData(['config', 'ItemsperPage']),
					'help' => 'Nombre d\'articles de blog ou de news par page'
				]); ?>
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
						<?php echo template::text('configSocialGoogleplusId', [
							'help' => 'Saisissez votre ID Google+ : https://plus.google.com/[CETTE PARTIE].',
							'label' => 'Google+',
							'value' => $this->getData(['config', 'social', 'googleplusId'])
						]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col6">
						<?php echo template::text('configSocialInstagramId', [
							'help' => 'Saisissez votre ID Instagram : https://www.instagram.com/[CETTE PARTIE].',
							'label' => 'Instagram',
							'value' => $this->getData(['config', 'social', 'instagramId'])
						]); ?>
					</div>
					<div class="col6">
						<?php echo template::text('configSocialPinterestId', [
							'help' => 'Saisissez votre ID Pinterest : https://pinterest.com/[CETTE PARTIE].',
							'label' => 'Pinterest',
							'value' => $this->getData(['config', 'social', 'pinterestId'])
						]); ?>
					</div>
				</div>
				<div class="row">
					<div class="col6">
						<?php echo template::text('configSocialTwitterId', [
							'help' => 'Saisissez votre ID Twitter : https://twitter.com/[CETTE PARTIE].',
							'label' => 'Twitter',
							'value' => $this->getData(['config', 'social', 'twitterId'])
						]); ?>
					</div>
					<div class="col6">
						<?php echo template::text('configSocialYoutubeId', [
							'help' => 'Saisissez votre ID Youtube : https://www.youtube.com/channel/[CETTE PARTIE].',
							'label' => 'Youtube',
							'value' => $this->getData(['config', 'social', 'youtubeId'])
						]); ?>
					</div>
				</div>
			</div>
			<div class="block">
				<h4>Système</h4>
				<?php echo template::text('configVersion', [
					'label' => 'Version de Zwii',
					'readonly' => true,
					'value' => self::ZWII_VERSION
				]); ?>
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
					'help' => 'Sauvegarde une fois par jour le fichier de données dans le dossier '.self::BACKUP_DIR.'. La sauvegarde est conservée 30 jours.'
				]); ?>
				<div class="row">
					<div class="col6">
						<?php echo template::button('configExport', [
							'href' => helper::baseUrl() . 'config/backup',
							'value' => 'Exporter les données'
						]); ?>
					</div>
				</div>
			</div>
			<div class="block">
				<h4>Copie d'écran pour OpenGraph :</h4>
				<div class="col3">		
						<!--
						Bouton inutile	
						<?php echo template::button('configmetaImage', [
							'href' => helper::baseUrl() . 'config/metaimage',
							'value' => 'Rafraîchir la capture <br /> d\'écran du site'
							]); ?>
						-->						
				</div>
				<div class="col6">
					<p><img src='<?php echo helper::baseUrl(false) . self::FILE_DIR.'source/screenshot.png';?>' />
				</div>
				<div class="col3">
				</div>
				<p>Cette copie d'écran est nécessaire aux partages sur les réseaux sociaux. Elle est régénérée lorsque le fichier screenshot.png est effacé du gestionnaire de fichiers.</p>				
			</div>
		</div>
	</div>
<?php echo template::formClose(); ?>
