<?php
if (
	!array_key_exists('REQUEST_URI', $_SERVER) ||
	empty($_SERVER['REQUEST_URI']) ||
	$_SERVER['REQUEST_URI'] == '/'
) {
	$path = '/index.html';
} else {
	$path = $_SERVER['REQUEST_URI'];
}



$templatePath = 'templates/content' . $path;
if (!file_exists($templatePath) || is_dir($templatePath)) {
	$templatePath = 'templates/content/index.html';
}

$templateVariables = array();
$template = read($templatePath);
foreach ($templateVariables as $key => $value) {
    $template = str_replace('{#' . $key . '#}', $value, $template);
}

switch ($path) {
	 case '/index.html':
        $title = 'Elzachferien - Ferien im Schwarzwald';
        $description = 'Herzlich Willkommen bei Elzachferien - Eine sch�ne Ferienwohnung in bester Lage n�he Freiburg';
        $keywords = 'Valins, Konuskarte, Elzach, Ferien, Freiburg, Elzachferien, Ferienwohnung, Wanderung, Mountain Biken, S�dschwarzwald, Ausflugsziele';
        break;
	 case '/fw2.html':
        $title = 'Elzachferien - Ferien im Schwarzwald';
        $description = 'Das Wohnzimmer ist aufgeteilt in Wohn und einen Aufenthalts Bereich';
        $keywords = 'Valins, Ferienwohnung, Wohnzimmer, ger�umige Schlafzimmer, Doppelbett, Polstergarnitur, Kleiderschrank, K�che, Badezimmer, Grillplatz, Gartenanlage, Belegungsplan, Preisliste, Ausstattung';
        break;        
    case '/mountainbike.html':
        $title = 'Elzachferien - Ferien im Schwarzwald';
        $description = 'Hier finden sie Tipps f�r Mountain Bike Touren';
        $keywords = 'Mounten Bike, Gasthof, Lieberatsbergstube, Tour';
        break;
    case '/ausflug.html':
        $title = 'Elzachferien - Ferien im Schwarzwald';
        $description = 'Hier finden sie Tipps f�r Ausflugszile in der Umgebung';
        $keywords = 'Schiltach, Ausflugszile, Schwarzwald, Freilichtmuseum, Vogtsbauernhof';
        break;
    case '/wanderungen.html':
        $title = 'Elzachferien - Ferien im Schwarzwald';
        $description = 'Hier finden sie Tipps f�r Wanderung im Schwarzwald';
        $keywords = 'Valins, Wutachschlucht, Wanderparkplatz, Wanderung, Gauchach, Gschasikopf, Oberprechtal, gengenbach, Brend';
        break; 
    case '/fastnacht.html':
        $title = 'Elzachferien - Ferien im Schwarzwald';
        $description = 'Die Elzacher Narrengestallten';
        $keywords = 'Valins, Fastnacht, Schwarzwald, Elzach, Umzug, Haslach, Kinzigtal, Narrenzunft';
        break;               
    default:
        $title = 'Elzachferien - Ferien im Schwarzwald';
        $description = 'Herzlich Willkommen bei Elzachferien - Eine sch�ne Ferienwohnung in bester Lage n�he Freiburg';
        $keywords = 'Valins, Konuskarte, Elzach, Ferien, Freiburg, Elzachferien, Ferienwohnung, Wanderung, Mountain Biken, S�dschwarzwald, Ausflugsziele';
}

$layoutVariables = array(
    'CONTENT' => $template,
    'COPYRIGHT_YEAR' => '2011' . (date('Y') > 2011 ? '-' . date('Y') : ''),
    'TITLE' => $title,
    'DESCRIPTION' => $description,
    'KEYWORDS' => $keywords
);

$output = read('templates/layout.html');
foreach ($layoutVariables as $key => $value) {
    $output = str_replace('{#' . $key . '#}', $value, $output);
}
echo $output;

function read($fileName)
{
	$content = '';
	$fileHandle = fopen($fileName, 'r');
	while (!feof($fileHandle)) {
		$content .= fgets($fileHandle);
	}
	fclose($fileHandle);
	return $content;
}