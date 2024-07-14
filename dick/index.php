<?php

//error_reporting(0);
define( 'OX', 1 );
define( 'BASEPATH', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );
date_default_timezone_set('Asia/Jakarta');

require_once 'config.php';
require_once 'lib/uri.php';
require_once 'lib/db.php';
include_once 'lib/Zebra_Session.php';
include_once 'lib/auth.php';
include_once 'lib/plugin.php';
include_once 'lib/date.php';
require_once 'lib/ox.php';
include_once 'lib/view.php';
include_once 'lib/gravatar.php';
include_once 'lib/PrettyDateTime.php';
include_once 'pipk.php';

global $PLUGIN;
$PLUGIN = new plugin($_PLUGIN,$_PLUGIN_LAST);

//db_execute(" SET GLOBAL sql_mode = '' ");
db_execute(" SET SESSION sql_mode = '' ");

$MOD = uri_segment(0) ? uri_segment(0) : $_DEFAULT_MOD;
$MOD_FILE = uri_segment(1) ? uri_segment(1) : $_DEFAULT_FILE;
$FILE = BASEPATH .DS. 'mod' .DS. $MOD .DS. $MOD_FILE . '.php';

if( file_exists($FILE))
{
	require_once $FILE;
}
else
{
	header('HTTP/1.0 404 Not Found', true, 404);
	exit('Request file not found');
}
