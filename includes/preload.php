<?php
/**
 * Bootstrap file
 *
 * @author rainyjune <rainyjune@live.cn>
 * @version $Id$
 */
if(!defined('IN_MP')){die('Access denied!');}
if(version_compare(PHP_VERSION,'5.1.0','<')){die('PHP Version 5.1.0+ required!');}
date_default_timezone_set('UTC');
error_reporting(E_ALL);
require 'functions.php';

ini_set('arg_separator.output',     '&amp;');
ini_set('magic_quotes_runtime',     0);
ini_set('magic_quotes_sybase',      0);
if(get_magic_quotes_gpc())
{
    $_POST	=array_map('stripslashes_deep',$_POST);
    $_GET	=array_map('stripslashes_deep',$_GET);
    $_COOKIE=array_map('stripslashes_deep',$_COOKIE);
    $_REQUEST=array_map('stripslashes_deep',$_REQUEST);
}

maple_unset_globals();

//load text db api
require APPROOT.'/includes/txt-db-api/txt-db-api.php';
//Load database library
require APPROOT.'/includes/database/YDB.php';
//Load the configuration file
if(file_exists(conf_path().'/config.php'))
    include_once conf_path().'/config.php';
else
    include './sites/default/default.config.php';

define('CONFIGFILE', conf_path().'/config.php');
define('MP_VERSION','1.0');
define('THEMEDIR', 'themes/');
define('PLUGINDIR', 'plugins/');
define('SMILEYDIR', 'misc/images/');

if (!function_exists('json_encode')){ include 'CJSON.php'; }
include_once 'Imgcode.php';
// Load ZFramework
require 'ZFramework.php';


$gd_exist=gd_loaded();
$zip_support=class_exists('ZipArchive')?'On':'Off';

if(is_installed()){
    if(is_baned(getIP()))
        die('Access denied!');
	is_closedMode();
}
elseif($_GET['action']!='install'){
	header("Location:index.php?action=install");exit;
}
