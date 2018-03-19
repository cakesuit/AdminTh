<?php
/**
 * Template
 * Created by ck_adminlte
 * Date 07/03/2018 as 07:21
 */
?>

<!-- Small boxes (Stat box) -->
<?php echo $this->element('Admin/DemoBox/small_box'); ?>
<!-- /.row -->

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <?php echo $this->element('Admin/DemoBox/sales_tabs'); ?>
        <!-- /.nav-tabs-custom -->

        <!-- Chat box -->
        <?php echo $this->element('Admin/DemoBox/chat_box'); ?>
        <!-- /.box (chat box) -->

        <!-- TO DO List -->
        <?php echo $this->element('Admin/DemoBox/todo_list'); ?>
        <!-- /.box -->

        <!-- quick email widget -->
        <?php echo $this->element('Admin/DemoBox/quick_email_widget'); ?>

    </section>
    <!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

        <!-- Map box -->
        <?php echo $this->element('Admin/DemoBox/map'); ?>
        <!-- /.box -->

        <!-- solid sales graph -->
        <?php echo $this->element('Admin/DemoBox/solid_sales_graph'); ?>
        <!-- /.box -->

        <!-- Calendar -->
        <?php echo $this->element('Admin/DemoBox/calendar'); ?>
        <!-- /.box -->

    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
