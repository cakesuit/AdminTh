<?php
/**
 * Template
 * Created by ck_adminlte
 * Date 07/03/2018 as 10:19
 */
?>
<?php

$defaultOptions = [
    'boxClass' => '',
    'wrapperIconClass' => '',
    'icon' => '',
    'content' => ''
];

foreach ($defaultOptions as $key => $val) {
    if (!isset(${$key})) {
        ${$key} = $val;
    }
}
?>
<div class="info-box <?php echo $boxClass ?>">
    <span class="info-box-icon <?php echo $wrapperIconClass ?>">
        <?php echo $this->Html->icon($icon, ['iconSet' => 'fa']) ?>
    </span>

    <div class="info-box-content">
        <?php echo $content ?>
    </div>
    <!-- /.info-box-content -->
</div>