<?php

$type = 'adler';
if (isset($_GET["type"])) {
	$type = strtolower($_GET['type']);
}

header('Content-Type: application/json');

if ($type == 'adler') {
	echo "{\n";
	echo "	\"Google Authenticator\": 293225421,\n";
	echo "	\"Google Gson\": 2593554311,\n";
	echo "	\"Google Guava\": 4241935111,\n";
	echo "	\"Log4j\": 217741531,\n";
	echo "	\"Log4j Web\": 993548242,\n";
	echo "	\"Remote Messaging\": 3411176868,\n";
	echo "	\"LockLoginManager\": 443016827\n";
	echo "\n}";
} else {
	echo "{\n";
	echo "	\"Google Authenticator\": 868364232,\n";
	echo "	\"Google Gson\": 2192529993,\n";
	echo "	\"Google Guava\": 4146188870,\n";
	echo "	\"Log4j\": 556285814,\n";
	echo "	\"Log4j Web\": 308611953,\n";
	echo "	\"Remote Messaging\": 4022847772,\n";
	echo "	\"LockLoginManager\": 3521257255\n";
	echo "\n}";
}
?>
