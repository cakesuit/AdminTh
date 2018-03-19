<?php
namespace Cakesuit\AdminTh\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;
use Cake\View\View;

/**
 * SidebarMenu helper
 */
class SidebarMenuHelper extends Helper
{
    /**
     * Load other helpers
     * @var array
     */
    public $helpers = ['Html', 'Url'];

    /**
     * @var bool
     */
    private $_isFirstCounter = true;

    /**
     * Assign the current URL
     * @var
     */
    private $_url;

    /**
     * Define the default params menu
     * @var array
     */
    protected $_default = [
        'title' => '',
        'url' => '',
        'icon' => '',
        'children' => null
    ];

    /**
     * Define ul Options
     * @var array
     */
    protected $_ulOptions = [];

    /**
     * Define li Options
     * @var array
     */
    protected $_liOptions = [];

    /**
     * Default configuration.
     * @var array
     */
    protected $_defaultConfig = [
        'mainTitle' => 'MAIN NAVIGATION',
        'ul' => [
            'menu' => [
                'class' => 'sidebar-menu',
                'data-widget' => 'tree'
            ],
            'submenu' => [
                'class' => 'treeview-menu'
            ]
        ],
        'icon' => [
            'iconSet' => 'fa'
        ]
    ];

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setConfig('title', __d('cakesuit.adminth', $this->getConfig('title')));
    }


    public function render()
    {
        $menus = Configure::read('Cakesuit.AdminTh.SidebarMenu');
        return $this->_loop($menus);
    }

    protected function _loop($menus, array $ulOptions = [])
    {
        $res = '';
        foreach ($menus as $index => $menu) {
            $menu += $this->_default;
            $liOptions = [];
            $title = '';

            if ($this->_isFirstCounter) {
                $res .= $this->Html->tag('li', __d('cakesuit.adminth', 'MAIN NAVIGATION'), ['class' => 'header']);
                $this->_isFirstCounter = false;
            }

            if (!empty($menu['icon'])) {
                $title .= $this->Html->icon($menu['icon'], ['iconSet' => $this->getConfig('icon.iconSet')]);
            } else {
                // Permet de garder un espace avec tag i vide
                $title .= $this->Html->icon('');
            }

            $title .= $this->Html->tag('span', $menu['title']);

            if (!empty($menu['children'])) {
                $title .= $this->Html->tag(
                    'span',
                    $this->Html->icon('angle-left', ['class' => 'pull-right', 'iconSet' => $this->getConfig('icon.iconSet')]),
                    ['class' => 'pull-right-container']
                );
                $liOptions = ['class' => 'treeview'];
            }

            $attrs = array_diff_key($menu, $this->_default);

            $link = $this->Html->link(
                $title,
                $menu['url'],
                ['escape' => false] + $attrs
            );
            if (!empty($menu['children'])) {
                $optionsSubmenu = $this->getConfig('ul.submenu');
                unset($optionsSubmenu['data-widget']);
                $link .= $this->_loop($menu['children'], $optionsSubmenu);
            }

            if ($this->_getUrl() === $this->Url->build($menu['url'])) {
                $liOptions = $this->Html->injectClasses('active', $liOptions);
            }
            $res .= $this->_li($link, $liOptions);
        }

        return $this->_ul($res, $ulOptions);
    }

    /**
     * Create an Ul tag
     * @param $content
     * @param array $options
     * @return mixed
     */
    protected function _ul($content, array $options = [])
    {
        $options += $this->getConfig('ul.menu');
        return $this->Html->tag('ul', $content, $options);
    }

    /**
     * Create LI tag
     * @param $content
     * @param array $options
     * @return mixed
     */
    protected function _li($content, array $options = [])
    {
        return $this->Html->tag('li', $content, $options);
    }

    protected function _getUrl ()
    {
        if ($this->_url) {
            return $this->_url;
        }
//        echo $this->request->getUri()->getPath();
//        dd($this->request->getUri());
//        debug(\get_class_methods($this->request));
        $this->_url = $this->request->getUri()->getPath();
        return $this->_url;
    }
}
