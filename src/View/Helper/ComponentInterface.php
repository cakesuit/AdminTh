<?php
/**
 * Created by PhpStorm.
 * User: frederickoller
 * Date: 08/03/2018
 * Time: 10:49
 */

namespace Cakesuit\AdminTh\View\Helper;


interface ComponentInterface
{
    /**
     * $this->Component->Info->render($content, $options)
     * @param string|null $content
     * @param array $options
     * @return mixed
     */
    public function render($content = null, array $options = []);
}