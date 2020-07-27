<?php

/**
 *  Default settings
 */

define('website', 'http://192.168.15.135/promodebolso/');

/* Mysql configurations NO CHANGE IT */
define("mysql", serialize([
	'host'=>'localhost',
	'user'=>'root',
	'pass'=>'123456',
	'db'=>'workdata'
]));


/**
 * System settings
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
date_default_timezone_set('America/Sao_Paulo');