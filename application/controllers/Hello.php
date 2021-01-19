<?php
/**
 * @description
 *
 * @package
 *
 * @author kovey
 *
 * @time 2021-01-13 09:44:29
 *
 */
use Kovey\Web\App\Mvc\Controller\Controller;
use Kovey\Container\Event\Router;
use Kovey\Container\Event\Redis;
use Kovey\Validator\Rules;
use Kovey\Library\Util\Json;

class HelloController extends Controller
{
    #[Module\Hello]
    private $hello;

    #[Router('/hello/world', 'GET')]
    public function worldAction()
    {
        $this->view->hello = 'hello';
        $this->view->world = 'world';
        $this->view->name = 'kovey framework';
    }

    #[Router('/rule/valid', 'POST')]
    #[Rules\Required('kovey')]
    #[Rules\MinLength('kovey', 1)]
    #[Rules\MaxLength('kovey', 10)]
    #[Rules\Required('email')]
    #[Rules\Email('email')]
    #[Rules\MaxLength('email', 64)]
    public function validAction()
    {
        $this->disableView();
        return Json::encode(array(
            'kovey' => $this->getRequest()->getPost('kovey'),
            'email' => $this->getRequest()->getPost('email')
        ));
    }

    #[Redis('master')]
    #[Router('/hello/redis', 'POST')]
    #[Rules\Required('kovey')]
    #[Rules\MaxLength('kovey', 10)]
    public function useRedisAction()
    {
        $this->disableView();
        return $this->hello->useRedis($this->getRequest()->getPost('name'));
    }

    public function routerAction()
    {
        $this->disableView();
        return $this->hello->getRouter();
    }
}
