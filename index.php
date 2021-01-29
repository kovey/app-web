<?php
/**
 * @description web app entry file
 *
 * @package app
 *
 * @author kovey
 *
 * @time 2021-01-13 10:27:38
 *
 */
define('APPLICATION_PATH', __DIR__);
date_default_timezone_set('Asia/shanghai');

require_once APPLICATION_PATH . '/vendor/autoload.php';

use Kovey\Web\App\Bootstrap\Autoload;
use Kovey\Library\Config\Manager;
use Kovey\Web\App\Application;
use Kovey\Web\App\Bootstrap\Bootstrap;
use Swoole\Coroutine;
Coroutine::set(array('hook_flags' => SWOOLE_HOOK_ALL));

$autoload = new Autoload();
$autoload->register();

Manager::init(APPLICATION_PATH . '/conf/');

Application::getInstance(Manager::get('framework.app'))
	->checkConfig()
	->registerAutoload($autoload)
	->registerBootstrap(new Bootstrap())
	->bootstrap()
	->run();
