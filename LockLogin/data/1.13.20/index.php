<?php

$type = 'adler';
if (isset($_GET["type"])) {
	$type = strtolower($_GET['type']);
}

header('Content-Type: application/json');

if ($type == 'adler') {
	echo "{\n";
	echo "	\"Apache Commons IO\": 1673920066,\n";
	echo "	\"Apache Commons Codec\": 3916456401,\n";
	echo "	\"Java Native Access\": 3948423424,\n";
	echo "	\"Google Authenticator\": 293225421,\n";
	echo "	\"Log4j\": 217741531,\n";
	echo "	\"Log4j Web\": 993548242,\n";
	echo "	\"Java Assist\": 3701714671,\n";
	echo "	\"Reflections\": 1285286487,\n";
	echo "	\"Google Guava\": 4241935111,\n";
	echo "	\"Google Gson\": 2593554311,\n";
	echo "	\"Remote Messaging\": 2593554311,\n";
	echo "	\"LockLoginManager\": 1488631901\n";
	echo "\n}";
} else {
	echo "{\n";
	echo "	\"Apache Commons IO\": 4194532834,\n";
	echo "	\"Apache Commons Codec\": 2418094782,\n";
	echo "	\"Java Native Access\": 3153204980,\n";
	echo "	\"Google Authenticator\": 868364232,\n";
	echo "	\"Log4j\": 556285814,\n";
	echo "	\"Log4j Web\": 308611953,\n";
	echo "	\"Java Assist\": 3282936896,\n";
	echo "	\"Reflections\": 1731866433,\n";
	echo "	\"Google Guava\": 4146188870,\n";
	echo "	\"Google Gson\": 2192529993,\n";
	echo "	\"Remote Messaging\": 2783889952,\n";
	echo "	\"LockLoginManager\": 4238264003\n";
	echo "\n}";
}
?>
