<?php
/**
 * Created by PhpStorm.
 * User: frederic
 * Date: 01/03/2018
 * Time: 11:27
 */

use Cake\Core\Plugin;
use Cake\Core\Configure;

if (!Configure::check('Cakesuit.AdminTh.SidebarMenu')) {
    Configure::write('Cakesuit.AdminTh.SidebarMenu', require __DIR__ . '/sidebar_menu.php');
}
Plugin::load('BootstrapUI');
Plugin::load('AssetCompress', ['bootstrap' => true]);

if (!Configure::check('Cakesuit.AdminTh.Template.iconSet')) {
    Configure::write('Cakesuit.AdminTh.Template.iconSet', 'fa');
}
