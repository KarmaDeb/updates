<?php

function startsWith($haystack, $needle) {
     $length = strlen( $needle );
     return substr( $haystack, 0, $length ) === $needle;
}

$channel = 'release';
if (isset($_GET["channel"])) {
	$channel = strtolower($_GET['channel']);
}

if ($channel == 'legacy') {
	$file = file_get_contents("https://raw.githubusercontent.com/KarmaConfigs/updates/master/LockLogin/latest.txt");

	$version_data = explode(' ', $file);
	$version = preg_split("/\s+(?=\S*+$)/", $version_data[0])[0];
	$changelog = str_replace($version_data[0], '', $file);

	$changelog = explode('\n', json_encode($changelog, JSON_PRETTY_PRINT));
	$changelog = json_encode($changelog, JSON_PRETTY_PRINT);
	$changelog = str_replace("\"\\", '', $changelog);
	$changelog = str_replace("\\\\\\", '', $changelog);

	$changelog = str_replace("\",\"", "\",\n\"", $changelog);

	if (isset($_GET["version"])) {
		$version = strtoupper($_GET["version"]);
		$channel = 'debugging version md5';
	}

	$download = "https://raw.githubusercontent.com/KarmaConfigs/updates/master/LockLogin/LockLogin.jar";

	header('Content-Type: application/json');

	echo "{\n";
	echo "	\"version\": \"{$version}\",\n";
	echo "	\"channel\": \"{$channel}\",\n";
	echo "	\"download\": \"{$download}\",\n";
	echo "	\"changelog\": {$changelog}";
	echo "\n}";
} else {
	if ($channel == 'releasecandidate' || $channel == 'rc')
		$channel = 'candidate';

	$version = "";
	$download = "";
	$clean_changelog = "";
	$last_line = "";
	$index = 0;
	foreach(file("./simple/{$channel}.txt", FILE_IGNORE_NEW_LINES) as $line) {
		//$line = rtrim($line, "\n");
		if ($index == 0) {
			$version = preg_replace("/\s+/", "", $line);
		} else {
			if ($index == 1) {
				$download = preg_replace("/\s+/", "", $line);
			} else {
				$last_line = $line;
				if ($index == 2) {
					$clean_changelog = $last_line;
				} else {
					$clean_changelog = "{$clean_changelog}\n{$line}";
				}
			}
		}
		$index++;
	}

	$changelog = explode('\n', json_encode($clean_changelog, JSON_PRETTY_PRINT));
	$changelog = json_encode($changelog, JSON_PRETTY_PRINT);
	$changelog = str_replace("\\\"", '', $changelog);
	$changelog = str_replace("\"\\", '', $changelog);
	$changelog = str_replace("\\\\\\", '', $changelog);

	$changelog = str_replace("\",\"", "\",\n\"", $changelog);

	if ($channel == 'legacy') {
		$download = "https://raw.githubusercontent.com/KarmaConfigs/updates/master/LockLogin/LockLogin.jar";
	}

	if (isset($_GET["display"])) {
		$display = strtolower($_GET['display']);
	} else {
		$display = "";
	}

	switch ($display) {
		case 'version':
			echo $version;
			break;
		case 'channel':
			echo $channel;
			break;
		case 'download':
			echo $download;
			break;
		case 'changelog':
			$clean_changelog = str_replace("\n", '<br>', $clean_changelog);

			$changelog_list = explode('<br>', $clean_changelog);
			$changelog = "";
			foreach($changelog_list as $key) {
				if(preg_match("/[a-z]/i", $key)) {
					if (startsWith($key, '&3')) {
						$changelog = "{$changelog}<br><p> {$key}</p><br><hr style=\"width: 500px; margin: auto;\">";
					} else {
				    	$changelog = "{$changelog}<br><p> {$key}</p>";
					}
				} else {
					$changelog = "{$changelog}<br><br>";
				}
			}

			$changelog = str_replace("&b", "", $changelog);
			$changelog = str_replace("&c", "", $changelog);
			$changelog = str_replace("&a", "", $changelog);
			$changelog = str_replace("&3", "", $changelog);


			$changelog = 
			"<html>
					<head>
						<meta charset=\"utf-8\">
						<title>LockLogin changelog</title>

						<link rel=\"stylesheet\" type=\"text/css\" href=\"https://locklogin.eu/css/style.css\">

						<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\">
						<link href=\"https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Oswald:wght@500&family=Squada+One&display=swap\" rel=\"stylesheet\">

						<script src=\"http://code.jquery.com/jquery-1.9.0.min.js\"></script>
					    <script src=\"https://raw.github.com/jylauril/jquery-runner/master/build/jquery.runner-min.js\"></script>
					</head>
					<body>
						<div class=\"navegator\">
							<div class=\"navegator-name\">LockLogin</div>
							<ul>
								<li><i class=\"fas fa-home\"></i><a href=\"../\">Home</a></li>
								<li><i class=\"fas fa-puzzle-piece\"></i><a href=\"../modules\">Modules</a></li>
								<li><i class=\"far fa-comments\"></i><a href=\"../community\" target=\"_blank\">Community</a></li>
								<li><i class=\"fab fa-wikipedia-w\"></i><a href=\"https://github.com/KarmaConfigs/LockLoginReborn/wiki\" target=\"_blank\">Wiki</a></li>
								<li><i class=\"fab fa-patreon\"></i><a href=\"https://www.patreon.com/karmaconfigs?fan_landing=true\" target=\"_blank\">Patreon</a></li>
								<li><i class=\"fab fa-discord\"></i><a href=\"https://discord.gg/jRFfsdxnJR\" target=\"_blank\">Discord</a></li>
								<li><i class=\"fab fa-github\"></i><a href=\"https://github.com/KarmaConfigs/LockLoginReborn\" target=\"_blank\">Github</a></li>
							</ul>
						</div>

						<div class=\"principal-text\">
							{$changelog}
						</div>
					</body>
			</html>";
			echo $changelog;
			break;
		default:
			header('Content-Type: application/json');

			echo "{\n";
			echo "	\"version\": \"{$version}\",\n";
			echo "	\"channel\": \"{$channel}\",\n";
			echo "	\"download\": \"{$download}\",\n";
			echo "	\"changelog\": {$changelog}";
			echo "\n}";
			break;
	}
}
?>