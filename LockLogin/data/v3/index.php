<?php

$type = 'adler';
if (isset($_GET["type"])) {
	$type = strtolower($_GET['type']);
}

header('Content-Type: application/json');

if ($type == 'adler') {
	echo "{\n";
	echo "	\"Apache Commons\": 3916456401\n",
	echo "	\"Google Authenticator\": 293225421,\n";
	echo "	\"Google Guava\": 4241935111,\n";
	echo "	\"Log4j\": 217741531,\n";
	echo "	\"Log4j Web\": 993548242,\n";
	echo "	\"Remote Messaging\": 3411176868,\n";
	echo "	\"Socket IO\": 134414007\n"
	echo "	\"LockLoginManager\": 2731292759\n";
	echo "\n}";
} else {
	echo "{\n";
	echo "	\"Apache Commons\": 2418094782\n",
	echo "	\"Google Authenticator\": 868364232,\n";
	echo "	\"Google Guava\": 4146188870,\n";
	echo "	\"Log4j\": 556285814,\n";
	echo "	\"Log4j Web\": 308611953,\n";
	echo "	\"Remote Messaging\": 4022847772,\n";
	echo "	\"Socket IO\": 2726544904\n";
	echo "	\"LockLoginManager\": 3943627850\n";
	echo "\n}";
}
?>
