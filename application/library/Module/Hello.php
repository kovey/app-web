<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-13 10:33:16
 *
 */
namespace Module;

#[\Attribute]
class Hello
{
    public function getRouter()
    {
        return 'router';
    }

    public function useRedis($name)
    {
        $this->redis->set('kovey', $name);
        return $this->redis->get('kovey');
    }
}
