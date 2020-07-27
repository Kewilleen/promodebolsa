<?php 
include_once 'settings/config.php';

spl_autoload_register(function ($class) {
	$applications = [
		/* Default Folders */
		'settings/routers/',
		'application/controllers/',
		'application/models/',
		/* Model Aplication*/
		'application/models/api/',
		'application/models/api/v1/'
	];
	/* File Extension */
	$extensions = [
		'.class.php',
		'.interface.php',
		'.php'
	];
	foreach ($applications as $folder) {
		loadFile($extensions, "{$folder}{$class}");
	}
});
function loadFile($extensions = [], $path = '') {
	foreach ($extensions as $extension) {
		//var_dump($path . $extension);
		if (!empty($path . $extension) && file_exists($path . $extension)) {
			return require_once $path . $extension;
		}
	}
}
$rm = new RouterManager();
$rm->run();