<?php
namespace Cakesuit\AdminTh\View\Helper;

use Cake\Core\App;
use Cake\View\Helper;
use Cake\View\View;

/**
 * Component helper
 */
class ComponentHelper extends Helper
{
    public $helpers = [
        'Cakesuit/AdminTh.Box',
        'Cakesuit/AdminTh.InfoBox',
        'Cakesuit/AdminTh.SmallBox'
    ];

    public function __call($method, $params)
    {
        if ($instance = $this->_getInstance($method, $params)) {
            return $instance;
        }
        return parent::__call($method, $params);
    }

    /**
     * Get new Instance of component
     */
    protected function _getInstance($method, $params = [])
    {
        if (isset($this->_helperMap[$method])) {
            $params = is_array($params) && !empty($params[0]) ? $params[0] : [];
            $class = App::className($this->_helperMap[$method]['class'], 'View/Helper', 'Helper');
            $instance = new $class($this->_View, $params);
            $this->{$method} = $instance;
            return $instance;
        }
    }

}
