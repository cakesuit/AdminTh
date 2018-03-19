<?php
namespace Cakesuit\AdminTh\Controller;

use Cake\Event\Event;

/**
 * Demo Controller
 *
 *
 * @method \Cakesuit\Admin\Model\Entity\Demo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DemoController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->render($this->request->getParam('action'));
        return $this->response;
    }
}
