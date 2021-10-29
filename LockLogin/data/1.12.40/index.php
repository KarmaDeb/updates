<?php

$type = 'adler';
if (isset($_GET["type"])) {
	$type = strtolower($_GET['type']);
}

header('Content-Type: application/json');

if ($type == 'adler') {
	echo "{\n";
	echo "	\"Apache Commons Codec\": 3916456401,\n";
	echo "	\"Java Native Access\": 3948423424,\n";
	echo "	\"Google Authenticator\": 293225421,\n";
	echo "	\"Log4j\": 2534744057,\n";
	echo "	\"Log4j Web\": 2561039188,\n";
	echo "	\"Java Assist\": 1567615264,\n";
	echo "	\"Reflections\": 1285286487,\n";
	echo "	\"Google Guava\": 4241935111,\n";
	echo "	\"Google Gson\": 2593554311,\n";
	echo "	\"LockLoginManager\": 3488345036\n";
	echo "\n}";
} else {
	echo "{\n";
	echo "	\"Apache Commons Codec\": 2418094782,\n";
	echo "	\"Java Native Access\": 3153204980,\n";
	echo "	\"Google Authenticator\": 868364232,\n";
	echo "	\"Log4j\": 2003915664,\n";
	echo "	\"Log4j Web\": 1178905147,\n";
	echo "	\"Java Assist\": 3412588305,\n";
	echo "	\"Reflections\": 1731866433,\n";
	echo "	\"Google Guava\": 4146188870,\n";
	echo "	\"Google Gson\": 2192529993,\n";
	echo "	\"LockLoginManager\": 1388802696\n";
	echo "\n}";
}
?>
