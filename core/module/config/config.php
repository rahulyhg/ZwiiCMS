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

class config extends common {

	public static $actions = [
		'backup' => self::GROUP_ADMIN,
		'index' => self::GROUP_ADMIN
	];
	
	public static $timezones = [
		'Pacific/Midway'		=> '(GMT-11:00) Midway Island',
		'US/Samoa'				=> '(GMT-11:00) Samoa',
		'US/Hawaii'				=> '(GMT-10:00) Hawaii',
		'US/Alaska'				=> '(GMT-09:00) Alaska',
		'US/Pacific'			=> '(GMT-08:00) Pacific Time (US &amp; Canada)',
		'America/Tijuana'		=> '(GMT-08:00) Tijuana',
		'US/Arizona'			=> '(GMT-07:00) Arizona',
		'US/Mountain'			=> '(GMT-07:00) Mountain Time (US &amp; Canada)',
		'America/Chihuahua'		=> '(GMT-07:00) Chihuahua',
		'America/Mazatlan'		=> '(GMT-07:00) Mazatlan',
		'America/Mexico_City'	=> '(GMT-06:00) Mexico City',
		'America/Monterrey'		=> '(GMT-06:00) Monterrey',
		'Canada/Saskatchewan'	=> '(GMT-06:00) Saskatchewan',
		'US/Central'			=> '(GMT-06:00) Central Time (US &amp; Canada)',
		'US/Eastern'			=> '(GMT-05:00) Eastern Time (US &amp; Canada)',
		'US/East-Indiana'		=> '(GMT-05:00) Indiana (East)',
		'America/Bogota'		=> '(GMT-05:00) Bogota',
		'America/Lima'			=> '(GMT-05:00) Lima',
		'America/Caracas'		=> '(GMT-04:30) Caracas',
		'Canada/Atlantic'		=> '(GMT-04:00) Atlantic Time (Canada)',
		'America/La_Paz'		=> '(GMT-04:00) La Paz',
		'America/Santiago'		=> '(GMT-04:00) Santiago',
		'Canada/Newfoundland'	=> '(GMT-03:30) Newfoundland',
		'America/Buenos_Aires'	=> '(GMT-03:00) Buenos Aires',
		'Greenland'				=> '(GMT-03:00) Greenland',
		'Atlantic/Stanley'		=> '(GMT-02:00) Stanley',
		'Atlantic/Azores'		=> '(GMT-01:00) Azores',
		'Atlantic/Cape_Verde'	=> '(GMT-01:00) Cape Verde Is.',
		'Africa/Casablanca'		=> '(GMT) Casablanca',
		'Europe/Dublin'			=> '(GMT) Dublin',
		'Europe/Lisbon'			=> '(GMT) Lisbon',
		'Europe/London'			=> '(GMT) London',
		'Africa/Monrovia'		=> '(GMT) Monrovia',
		'Europe/Amsterdam'		=> '(GMT+01:00) Amsterdam',
		'Europe/Belgrade'		=> '(GMT+01:00) Belgrade',
		'Europe/Berlin'			=> '(GMT+01:00) Berlin',
		'Europe/Bratislava'		=> '(GMT+01:00) Bratislava',
		'Europe/Brussels'		=> '(GMT+01:00) Brussels',
		'Europe/Budapest'		=> '(GMT+01:00) Budapest',
		'Europe/Copenhagen'		=> '(GMT+01:00) Copenhagen',
		'Europe/Ljubljana'		=> '(GMT+01:00) Ljubljana',
		'Europe/Madrid'			=> '(GMT+01:00) Madrid',
		'Europe/Paris'			=> '(GMT+01:00) Paris',
		'Europe/Prague'			=> '(GMT+01:00) Prague',
		'Europe/Rome'			=> '(GMT+01:00) Rome',
		'Europe/Sarajevo'		=> '(GMT+01:00) Sarajevo',
		'Europe/Skopje'			=> '(GMT+01:00) Skopje',
		'Europe/Stockholm'		=> '(GMT+01:00) Stockholm',
		'Europe/Vienna'			=> '(GMT+01:00) Vienna',
		'Europe/Warsaw'			=> '(GMT+01:00) Warsaw',
		'Europe/Zagreb'			=> '(GMT+01:00) Zagreb',
		'Europe/Athens'			=> '(GMT+02:00) Athens',
		'Europe/Bucharest'		=> '(GMT+02:00) Bucharest',
		'Africa/Cairo'			=> '(GMT+02:00) Cairo',
		'Africa/Harare'			=> '(GMT+02:00) Harare',
		'Europe/Helsinki'		=> '(GMT+02:00) Helsinki',
		'Europe/Istanbul'		=> '(GMT+02:00) Istanbul',
		'Asia/Jerusalem'		=> '(GMT+02:00) Jerusalem',
		'Europe/Kiev'			=> '(GMT+02:00) Kyiv',
		'Europe/Minsk'			=> '(GMT+02:00) Minsk',
		'Europe/Riga'			=> '(GMT+02:00) Riga',
		'Europe/Sofia'			=> '(GMT+02:00) Sofia',
		'Europe/Tallinn'		=> '(GMT+02:00) Tallinn',
		'Europe/Vilnius'		=> '(GMT+02:00) Vilnius',
		'Asia/Baghdad'			=> '(GMT+03:00) Baghdad',
		'Asia/Kuwait'			=> '(GMT+03:00) Kuwait',
		'Europe/Moscow'			=> '(GMT+03:00) Moscow',
		'Africa/Nairobi'		=> '(GMT+03:00) Nairobi',
		'Asia/Riyadh'			=> '(GMT+03:00) Riyadh',
		'Europe/Volgograd'		=> '(GMT+03:00) Volgograd',
		'Asia/Tehran'			=> '(GMT+03:30) Tehran',
		'Asia/Baku'				=> '(GMT+04:00) Baku',
		'Asia/Muscat'			=> '(GMT+04:00) Muscat',
		'Asia/Tbilisi'			=> '(GMT+04:00) Tbilisi',
		'Asia/Yerevan'			=> '(GMT+04:00) Yerevan',
		'Asia/Kabul'			=> '(GMT+04:30) Kabul',
		'Asia/Yekaterinburg'	=> '(GMT+05:00) Ekaterinburg',
		'Asia/Karachi'			=> '(GMT+05:00) Karachi',
		'Asia/Tashkent'			=> '(GMT+05:00) Tashkent',
		'Asia/Kolkata'			=> '(GMT+05:30) Kolkata',
		'Asia/Kathmandu'		=> '(GMT+05:45) Kathmandu',
		'Asia/Almaty'			=> '(GMT+06:00) Almaty',
		'Asia/Dhaka'			=> '(GMT+06:00) Dhaka',
		'Asia/Novosibirsk'		=> '(GMT+06:00) Novosibirsk',
		'Asia/Bangkok'			=> '(GMT+07:00) Bangkok',
		'Asia/Jakarta'			=> '(GMT+07:00) Jakarta',
		'Asia/Krasnoyarsk'		=> '(GMT+07:00) Krasnoyarsk',
		'Asia/Chongqing'		=> '(GMT+08:00) Chongqing',
		'Asia/Hong_Kong'		=> '(GMT+08:00) Hong Kong',
		'Asia/Irkutsk'			=> '(GMT+08:00) Irkutsk',
		'Asia/Kuala_Lumpur'		=> '(GMT+08:00) Kuala Lumpur',
		'Australia/Perth'		=> '(GMT+08:00) Perth',
		'Asia/Singapore'		=> '(GMT+08:00) Singapore',
		'Asia/Taipei'			=> '(GMT+08:00) Taipei',
		'Asia/Ulaanbaatar'		=> '(GMT+08:00) Ulaan Bataar',
		'Asia/Urumqi'			=> '(GMT+08:00) Urumqi',
		'Asia/Seoul'			=> '(GMT+09:00) Seoul',
		'Asia/Tokyo'			=> '(GMT+09:00) Tokyo',
		'Asia/Yakutsk'			=> '(GMT+09:00) Yakutsk',
		'Australia/Adelaide'	=> '(GMT+09:30) Adelaide',
		'Australia/Darwin'		=> '(GMT+09:30) Darwin',
		'Australia/Brisbane'	=> '(GMT+10:00) Brisbane',
		'Australia/Canberra'	=> '(GMT+10:00) Canberra',
		'Pacific/Guam'			=> '(GMT+10:00) Guam',
		'Australia/Hobart'		=> '(GMT+10:00) Hobart',
		'Australia/Melbourne'	=> '(GMT+10:00) Melbourne',
		'Pacific/Port_Moresby'	=> '(GMT+10:00) Port Moresby',
		'Australia/Sydney'		=> '(GMT+10:00) Sydney',
		'Asia/Vladivostok'		=> '(GMT+10:00) Vladivostok',
		'Asia/Magadan'			=> '(GMT+11:00) Magadan',
		'Pacific/Auckland'		=> '(GMT+12:00) Auckland',
		'Pacific/Fiji'			=> '(GMT+12:00) Fiji',
		'Asia/Kamchatka'		=> '(GMT+12:00) Kamchatka'
	];
	// Nombre d'objets par page
	public static $ItemsList = [
		5 => '5 articles',
		10 => '10 articles',
		15 => '15 articles',
		20 => '20  articles'		
	];


	/**
	 * Sauvegarde des données
	 */
	public function backup() {

		// Creation du ZIP
		$fileName = date('Y-m-d-h-i-s', time()) . '.zip';
		$zip = new ZipArchive();
		if($zip->open(self::TEMP_DIR . $fileName, ZipArchive::CREATE) === TRUE){
			foreach(configHelper::scanDir('site/') as $file) {
				$zip->addFile($file);
			}
		}
		$zip->close();
		// Téléchargement du ZIP
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="' . $fileName . '"');
		header('Content-Length: ' . filesize(self::TEMP_DIR . $fileName));
		readfile(self::TEMP_DIR . $fileName);
		// Valeurs en sortie
		$this->addOutput([
			'display' => self::DISPLAY_RAW
		]);
	}

	/**
	 * Réalise une copie d'écran
	 *  https://www.codexworld.com/capture-screenshot-website-url-php-google-api/
	 */
	public function configmetaimage() {
		// fonction désactivée pour un site local		
		if ( strpos(helper::baseUrl(false),'localhost') > 0 OR strpos(helper::baseUrl(false),'127.0.0.1') > 0)	{				
			$site = 'https://ZwiiCMS.com'; } else {
			$site = helper::baseUrl(false);	}

		$googlePagespeedData = file_get_contents('https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url='. $site .'&screenshot=true&key=AIzaSyA_JOJidlWFgEiyxTlSGi2_fORgYsCZFtA');
		$googlePagespeedData = json_decode($googlePagespeedData, true);
		$screenshot = $googlePagespeedData['screenshot']['data'];
		$screenshot = str_replace(array('_','-'),array('/','+'),$screenshot);
		$data = 'data:image/jpeg;base64,'.$screenshot;
		$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));			
		file_put_contents( self::FILE_DIR.'source/screenshot.png',$data);

		// Valeurs en sortie
		$this->addOutput([
			'notification' => 'Image tag réinitialisée',
			'redirect' => helper::baseUrl() . 'config',
			'state' => true
		]);
	}	

	

	/**
	 * Configuration
	 */
	public function index() {
		// Soumission du formulaire
		if($this->isPost()) {
			$this->setData([
				'config',
				[
					'analyticsId' => $this->getInput('configAnalyticsId'),
					'autoBackup' => $this->getInput('configAutoBackup', helper::FILTER_BOOLEAN),
					'maintenance' => $this->getInput('configMaintenance', helper::FILTER_BOOLEAN),
					'cookieConsent' => $this->getInput('configCookieConsent', helper::FILTER_BOOLEAN),
					'favicon' => $this->getInput('configFavicon'),
					'homePageId' => $this->getInput('configHomePageId', helper::FILTER_ID, true),
					'metaDescription' => $this->getInput('configMetaDescription', helper::FILTER_STRING_LONG, true),
					'social' => [
						'facebookId' => $this->getInput('configSocialFacebookId'),
						'googleplusId' => $this->getInput('configSocialGoogleplusId'),
						'instagramId' => $this->getInput('configSocialInstagramId'),
						'pinterestId' => $this->getInput('configSocialPinterestId'),
						'twitterId' => $this->getInput('configSocialTwitterId'),
						'youtubeId' => $this->getInput('configSocialYoutubeId')
					],
					'timezone' => $this->getInput('configTimezone', helper::FILTER_STRING_SHORT, true),
					'title' => $this->getInput('configTitle', helper::FILTER_STRING_SHORT, true),
					'ItemsperPage' => $this->getInput('ItemsperPage', helper::FILTER_INT,true)
				]
			]);
			if(self::$inputNotices === []) {
				// Active la réécriture d'URL
				$rewrite = $this->getInput('rewrite', helper::FILTER_BOOLEAN);
				if(
					$rewrite
					AND helper::checkRewrite() === false
				) {
					// Ajout des lignes dans le .htaccess
					file_put_contents(
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
					);
					// Change le statut de la réécriture d'URL (pour le helper::baseUrl() de la redirection)
					helper::$rewriteStatus = true;
				}
				// Désactive la réécriture d'URL
				elseif(
					$rewrite === false
					AND helper::checkRewrite()
				) {
					// Suppression des lignes dans le .htaccess
					$htaccess = explode('# URL rewriting', file_get_contents('.htaccess'));
					file_put_contents('.htaccess', $htaccess[0] . '# URL rewriting');
					// Change le statut de la réécriture d'URL (pour le helper::baseUrl() de la redirection)
					helper::$rewriteStatus = false;
				}
			}
			// Valeurs en sortie
			$this->addOutput([
				'redirect' => helper::baseUrl() . $this->getUrl(),
				'notification' => 'Modifications enregistrées',
				'state' => true
			]);
		}
		// Valeurs en sortie
		$this->addOutput([
			'title' => 'Configuration',
			'view' => 'index'
		]);
	}

}

class configHelper extends helper {

	/**
	 * Scan le contenu d'un dossier et de ses sous-dossiers
	 * @param string $dir Dossier à scanner
	 * @return array
	 */
	public static function scanDir($dir) {
		$dirContent = [];
		$iterator = new DirectoryIterator($dir);
		foreach($iterator as $fileInfos) {
			if(in_array($fileInfos->getFilename(), ['.', '..', 'backup'])) {
				continue;
			}
			elseif($fileInfos->isDir()) {
				$dirContent = array_merge($dirContent, self::scanDir($fileInfos->getPathname()));
			}
			else {
				$dirContent[] = $fileInfos->getPathname();
			}
		}
		return $dirContent;
	}

}