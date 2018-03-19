<?php
/**
 * Created by IntelliJ IDEA.
 * User: frederickoller
 * Date: 01/03/2018
 * Time: 21:43
 */

return [
    [
        'title' => 'Dashboard',
//        'id' => '',
//        'class' => '',
        'url' => [
            'plugin' => 'Cakesuit/AdminTh',
            'controller' => 'Demo',
            'action' => 'index'
        ],
        'icon' => 'tachometer',
    ],
    [
        'title' => "Widget",
        'url' => [
            'plugin' => 'Cakesuit/AdminTh',
            'controller' => 'Demo',
            'action' => 'widgets'
        ],
        'icon' => 'th'
    ]
];
