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
class Bootstrap
{
    public function __initLayout($app)
    {
        $app->registerPlugin('Layout');
    }

    public function __initDisableDefaultRouter($app)
    {
        $app->disableDefaultRouter();
    }
}
