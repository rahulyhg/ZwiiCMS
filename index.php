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

/**
 * Vérification de la version de PHP
 */
if(version_compare(PHP_VERSION, '5.6.0', '<')) {
	exit('PHP 5.6+ required.');
}

/* Set locale to French */
date_default_timezone_set('Europe/Paris');
setlocale (LC_TIME, 'fra_fra', 'french');


/*Configuration Proxy */
$proxy = 'cache-etu.univ-artois.fr:3128';
if (!empty($proxy)) {
    $proxy = str_replace('http://', 'tcp://', $proxy);
    $context = array(
        'http' => array(
            'proxy' => $proxy,
            'request_fulluri' => true,
            'verify_peer'      => false,
            'verify_peer_name' => false,
        ),
        "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false
        )
    );
    stream_context_set_default($context);
} else {
    echo "Proxy not found" . PHP_EOL;
}

/**
 * Initialisation de Zwii
 */
session_start();
require 'core/core.php';
$core = new core;
spl_autoload_register('core::autoload');
echo $core->router();
