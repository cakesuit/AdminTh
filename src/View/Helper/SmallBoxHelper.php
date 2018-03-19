<?php
namespace Cakesuit\AdminTh\View\Helper;

/**
 * SmallBox helper
 */
class SmallBoxHelper extends BaseComponentHelper
{
    protected $_default = [
        'classes' => [
            'template' => 'small-box',
            'footerTemplate' => 'small-box-footer'
        ],
        'options' => [
            'title' => null,
            'description' => null,
            'content' => null,
            'icon' => null,
            'footer' => null,
            'footerTag' => 'a',
            'footerIcon' => 'arrow-circle-right',
            'templateVars' => [],
            'footerTemplateVars' => []
        ],
    ];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
        'templates' => [
            'template' => '<div{{attrs}}>{{content}}</div>',
            'content' => '<div class="inner">{{content}}</div>',
            'title' => '<h3>{{content}}</h3>',
            'description' => '<p>{{content}}</p>',
            'icon' => '<div class="icon">{{icon}}</div>',
            'footer' => '<{{tag}}{{attrs}}>{{content}}</{{tag}}>'
        ]
    ];

    private function _formatTemplate()
    {
        $content = '';
        $templater = $this->templater();
        if ($this->getOption('title')) {
            $content .= $templater->format('title', [
                'content' => $this->getOption('title')
            ]);
        }

        if ($this->getOption('description')) {
            $content .= $templater->format('description', [
                'content' => $this->getOption('description')
            ]);
        }

        // Si pas de content on vérifie qu'il existe un content dans les options
        if (!empty($content) && $this->getOption('content')) {
            $content = $this->getOption('content');
        }

        $content = $templater->format('content', [
            'content' => $content
        ]);

        if ($this->getOption('icon')) {
            $content .= $templater->format('icon', [
                'icon' => $this->Html->icon($this->getOption('icon'), ['iconSet' => $this->getConfig('iconSet')])
            ]);
        }

        if ($this->getOption('footer')) {
            $content .= $templater->format('footer', [
                'tag' => $this->getOption('footerTag'),
                'content' => $this->getOption('footer') . ' ' . $this->Html->icon($this->getOption('footerIcon'), ['iconSet' => $this->getOption('iconSet')]),
                'attrs' => $templater->formatAttributes(
                    $this->addClass($this->getOption('footerTemplateVars'), $this->getDefault('classes.footerTemplate'))
                ),
            ]);
        }

        return $content;
    }

    /**
     * @param string|null $content
     * @param array $options
     * @return string template smallBox
     */
    public function render($content = null, array $options = [])
    {
        parent::render($content, $options);
        debug($this->getConfig());
        $templater = $this->templater();

        return $templater->format('template', [
            'content' => $this->_formatTemplate(),
            'attrs' => $templater->formatAttributes(
                $this->addClass($this->getOption('templateVars'), $this->getDefault('classes.template'))
            )
        ]);
    }

}
