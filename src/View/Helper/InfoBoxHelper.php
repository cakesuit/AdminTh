<?php
/**
 * Created by PhpStorm.
 * User: frederickoller
 * Date: 08/03/2018
 * Time: 11:00
 */

namespace Cakesuit\AdminTh\View\Helper;

class InfoBoxHelper extends BaseComponentHelper
{
    /**
     * Define require classes
     * @var array
     */
    protected $_default = [
        'classes' => [
            'template' => 'info-box',
            'iconTemplate' => 'info-box-icon',
            'titleTemplate' => 'info-box-text',
            'numberTemplate' => 'info-box-number',
            'progressTemplate' => 'progress',
            'progressBarTemplate' => 'progress-bar',
            'progressDescriptionTemplate' => 'progress-description'
        ],
        'options' => [
            'content' => null,
            'title' => null,
            'number' => null,
            'icon' => '',
            'progress' => null,
            'progressDescription' => null,
            'templateVars' => [],
            'iconTemplateVars' => [],
            'titleTemplateVars' => [],
            'numberTemplateVars' => [],
            'progressBarTemplateVars' => [],
            'progressDescriptionTemplateVars' => []
        ]
    ];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'templates' => [
            'template' => '<div{{attrs}}>{{content}}</div>',
            'iconTemplate' => '<span{{attrs}}>{{content}}</span>',
            'infoContent' => '<div class="info-box-content">{{content}}</div>',
            'progress' => '<div{{attrs}}>{{content}}</div>',
            'progressDescription' => '<span{{attrs}}>{{content}}</span>'
        ],
    ];

    public function render($content = null, array $options = [])
    {
        parent::render($content, $options);
        $templater = $this->templater();

        return $templater->format('template', [
            'content' => $this->_formatTemplate(),
            'attrs' => $templater->formatAttributes(
                $this->addClass($this->getConfig('options.templateVars'), $this->getDefault('classes.template'))
            ),
        ]);
    }

    /**
     * @return string
     */
    private function _formatTemplate()
    {
        $content = '';
        $icon = '';
        $templater = $this->templater();

        if ($this->getConfig('options.icon')) {
            $icon = $this->Html->icon($this->getConfig('options.icon'), ['iconSet' => $this->getConfig('iconSet')]);
        }
        // Icon Template
        $icon = $templater->format('iconTemplate', [
            'content' => $icon,
            'attrs' => $templater->formatAttributes(
                $this->addClass($this->getConfig('options.iconTemplateVars'), $this->getDefault('classes.iconTemplate'))
            )
        ]);

        // Title
        if ($this->getConfig('options.title')) {
            $content .= $this->Html->tag(
                'span',
                $this->getConfig('options.title'),
                $this->addClass($this->getConfig('options.titleTemplateVars'), $this->getDefault('classes.titleTemplate'))
            );
        }

        // Description
        if ($content && $this->getConfig('options.number')) {
            $content .= $this->Html->tag(
                'span',
                $this->getConfig('options.number'),
                $this->addClass($this->getConfig('options.numberTemplateVars'), $this->getDefault('classes.numberTemplate'))
            );
        }
        // Si pas de
        if (empty($content)) {
            $content = $this->_getContent();
        }

        // Progress Bar
        if ($this->getConfig('options.progress') !== null) {
            $progressBarOptions = $this->addClass($this->getConfig('options.progressBarTemplateVars'), $this->getDefault('classes.progressBarTemplate'));
            $progressBarOptions['style'] = 'width:' . $this->getConfig('options.progress') . '%';

            $content .= $templater->format('progress', [
                'content' => $this->Html->tag('div', '', $progressBarOptions),
                'attrs' => $templater->formatAttributes($this->addClass([], $this->getDefault('classes.progressTemplate')))
            ]);

            if ($this->getConfig('options.progressDescription') !== null) {
                $content .= $templater->format('progressDescription', [
                    'content' => $this->getConfig('options.progressDescription'),
                    'attrs' => $templater->formatAttributes(
                        $this->addClass($this->getConfig(
                            'options.progressDescriptionTemplateVars'),
                            $this->getDefault('classes.progressDescriptionTemplate')
                        )
                    )
                ]);
            }
        }

        $content = $templater->format('infoContent', [
            'content' => $content
        ]);

        return $icon . $content;
    }
}