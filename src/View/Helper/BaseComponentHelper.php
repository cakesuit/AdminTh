<?php
namespace Cakesuit\AdminTh\View\Helper;

use Cake\Core\Configure;
use Cake\Utility\Hash;
use Cake\View\Helper;
use Cake\View\StringTemplateTrait;
use Cake\View\View;

/**
 * BaseHelper helper
 */
class BaseComponentHelper extends Helper implements ComponentInterface
{
    use StringTemplateTrait;

    public $helpers = ['Html'];

    protected $_default = [
        'classes' => [],
        'options' => []
    ];

    protected $_content = '';
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'options' => [],
        'templates' => [],
        'iconSet' => null
    ];

    public function initialize(array $config)
    {
        parent::initialize($config);
        if ($this->getConfig('iconSet') === null) {
            $this->setConfig('iconSet', Configure::read('Cakesuit.AdminTh.Template.iconSet'));
        }
        $this->setConfig('options', $this->getDefault('options'));
    }

    public function iconSet()
    {

    }

    public function render($content = null, array $options = [])
    {
        if ($content && is_string($content)) {
            $options['content'] = $content;
        }
        $this->setOption($options);
    }

    public function getOption($name = null)
    {
        if ($name) {
            $name = '.' . $name;
        }
        return $this->getConfig('options' . $name);
    }

    public function setOption($key = null, array $options = [])
    {
        if (is_array($key)) {
            $options = $key;
        }
        if ($key && is_string($key)) {
            $this->setConfig('options.' . $key, $options);
        } else {
            $this->setConfig('options', $options);
        }
        return $this;
    }

    /**
     * Get Default Values
     * $_default
     */
    protected function getDefault($name, $default = null)
    {
        return Hash::get($this->_default, $name, $default);
    }

    /**
     * Retrieve the content
     * @return string
     */
    protected function _getContent()
    {
        if ($content = $this->getOption('content')) {
            if (strpos($content, 'fetch:') !== false) {
                list(, $fetchName)  = explode(':', $content);
                $content = $this->getView()->fetch(trim($fetchName));
            }
        }
        return $content;
    }

    public function __toString()
    {
        if (Configure::read('debug') === true) {
            return \get_class($this);
        }
        return '';
//        $render = $this->render();
//        if (!$render) {
//            $render = '';
//        }
//        return $render;
    }


}
