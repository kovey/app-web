<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-13 10:07:08
 *
 */
use Kovey\Redis\Redis\Redis;
use Kovey\Library\Config\Manager;
use Kovey\Container\Event;

class Bootstrap
{
    public function __initLayout($app)
    {
        $app->registerPlugin('Layout');
    }

    public function __initEvents($app)
    {
        $app->getContainer()
            ->on('Redis', function (Event\Redis $event) {
                $redis = new Redis(Manager::get('redis.write.0'));
                $redis->connect();
                return $redis;
            });
    }

    public function __initDisableDefaultRouter($app)
    {
        $app->disableDefaultRouter();
    }
}
