<?php


$start = microtime(true);


require_once "inc/scssphp/scss.inc.php";


$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "s<br>";


use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Server;

$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "s<br>";

$scss_urls[] = array(__DIR__ .'\\scss\\', __DIR__ . '\\css\\');


foreach($scss_urls as $scss_url) {
	$files = glob($scss_url[0] . '*.{scss}', GLOB_BRACE);
	$server = new Server($scss_url[0], $scss_url[1]);
	foreach($files as $file) {
	  $server->checkedCachedCompile($file, $scss_url[1] . basename($file, '.scss') . '.css');
	}
}

$time_elapsed_secs = microtime(true) - $start;
echo $time_elapsed_secs . "s<br>";

//$scss = new Compiler();

//$scss->setImportPaths(__DIR__ . '\\scss');
//$scss->setFormatter('Leafo\ScssPhp\Formatter\Compressed');


//$server = new Server(__DIR__ . "\\scss", null);


//$server->checkedCachedCompile(__DIR__ . '\scss\test.scss', __DIR__ .'\css\test.css');

//var_dump($server);
//print_r($server);

//$server->serve();

//echo $scss->compile('@import "custom";');

exit;

$server = new Server(__DIR__ . '/scss/');

$css = $server->checkedCachedCompile(__DIR__ . '/scss/test.scss', __DIR__ . '/css/test.css');
//$css->setFormatter('Leafo\ScssPhp\Formatter\Compressed');

var_dump($css);
/*
$server->assertFileExists(__DIR__ . '/css/scss.css');
$server->assertFileExists(__DIR__ . '/css/scss.css.meta');
$server->assertEquals($css, file_get_contents(__DIR__ . '/css/scss.css'));
$server->assertNotNull(unserialize(file_get_contents(__DIR__ . '/css/scss.css.meta')));
*/






exit;

//use Leafo\ScssPhp\Server;
//use Leafo\ScssPhp\Compiler;

$css_directory = 'css';
$scss_directory = 'scss';

$scss = new Compiler();
//$scss->setLineNumberStyle(Compiler::LINE_COMMENTS);
$scss->setImportPaths(get_template_directory() . '/' . $scss_directory);

//Server::serveFrom();


//exit();


//$scss->setFormatter('scss_formatter_compressed');
$scss->setFormatter('Leafo\ScssPhp\Formatter\Compressed');
//$scss->setLineNumberStyle(Compiler::LINE_COMMENTS);


//echo get_template_directory() . '/' . $scss_directory;

//$server = new Server($css_directory, $scss_directory, $scss);
$server = new Server('css', null, $scss);
$server->serve();

