#!/usr/bin/php
<?php

$ext = strtolower(substr(strrchr($_ENV['CODA_FILEPATH'], '.'), 1));

if($ext=="js") {

	// We need JSMin
	require_once($_ENV['CODA_BUNDLE_SUPPORT'] . "/jsmin-1.1.1.php");

	$fp = fopen("php://stdin", "r");
	while ( $line = fgets($fp, 1024) )
		$input .= $line;
	fclose($fp);

	echo JSMin::minify($input);
}

?>