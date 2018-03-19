<?php
/**
 * breadcrumb
 * Created by frederic at 01/03/2018
 */
?>
<?php
use Cake\Core\Configure;
use Cake\Utility\Hash;
$bcHome = [];
if (Configure::check('Cakesuit.AdminTh.SidebarMenu')) {
    $bcHome = Configure::read('Cakesuit.AdminTh.SidebarMenu')[0];
}

$bcUrl = Hash::get($bcHome, 'url', []);

$this->Breadcrumbs->prepend(
    $this->Html->icon(Hash::get($bcHome, 'icon', ''), ['iconSet' => 'fa'])
        . Hash::get($bcHome, 'title', 'Cakesuit/AdminTh'),
    $bcUrl
);
$bcCurrent = [
    'controller' => $this->request->params['controller'],
    'action' => $this->request->params['action'],
];

if (array_diff($bcUrl, $bcCurrent)) {
    if ($this->request->params['action'] !== 'index') {
        $bcCurrent['action'] = 'index';
        $this->Breadcrumbs->add($this->request->params['controller'], $bcCurrent);
        $this->Breadcrumbs->add($this->request->params['action']);
    } else {
        $this->Breadcrumbs->add($this->request->params['controller']);
    }
}

?>
<section class="content-header">
    <h1>
        <?php echo $this->fetch('title'); ?>
        <small>Control panel</small>
    </h1>
    <?php echo $this->Breadcrumbs->render([
        'class' => 'breadcrumb'
    ]); ?>
</section>
