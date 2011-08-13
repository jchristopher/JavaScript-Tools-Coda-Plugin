#!/usr/bin/php
<?php

$ext = strtolower(substr(strrchr($_ENV['CODA_FILEPATH'], '.'), 1));

if($ext=="js") {

	// We need Packer
	require_once($_ENV['CODA_BUNDLE_SUPPORT'] . "/class.JavaScriptPacker.php");

	$fp = fopen("php://stdin", "r");
	while ( $line = fgets($fp, 1024) )
		$input .= $line;
	fclose($fp);

	$packer = new JavaScriptPacker($input, 'Normal', true, false);
	$packed = $packer->pack();
	echo $packed;

}

?>