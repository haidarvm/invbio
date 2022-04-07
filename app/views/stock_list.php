<?php
function css() {
    ?>
<link rel="stylesheet" type="text/css" href="<?=URL; ?>assets/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="<?=URL; ?>assets/css/bootstrap-datepicker3.min.css">
<style>
</style>
<?php
}
require_once 'template/header.php';?>
<section class="section">
    <div class="container-fluid">
        <?php require_once 'template/title_breadcrumb.php'; ?>
        <div class="row">
            <div class="col">
                <div class="tables-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="card-style mb-30">
                                <?php
                                $form = new Bas_Form;
                                $form->open(base_url().$table, '', 'get');
                                echo '<div class="row ">';
                                $form->input_on_small('text', 'date_start','Start Date',!empty($date_start) ? $date_start : dateIndo(),'','','datepicker ', 'input_start', '');
                                echo ' <div class="w-100 d-none d-md-block"></div>';
                                $form->input_on_small('text', 'date_end','End Date', !empty($date_end) ? $date_end : dateIndo() ,'','','datepicker','input_end', "filter", 'col-sm-7');
                                // $form->button_xs('Filter', 'btn btn-primary btn-sm ');
                                $form->close();
                                echo '</div>';
                                ?>
                                <h6 class="mb-10  mt-20"><?=str_unslug($page_title, '_');?> Available </h6>
                                <p class="text-sm mb-20">
                                    Available Stock All Item
                                </p>

                                <div class="table-wrapper table-responsive">
                                    <table class="table" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>Item Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Item Code</h6>
                                                </th>
                                                <th>
                                                    <h6>Acccount Name</h6>
                                                </th>
                                                <?php
                                                if (!empty($item)) {
                                                    ?>
                                                <th>
                                                    <h6>Status</h6>
                                                </th>
                                                <?php
                                                }?>
                                                <th>
                                                    <h6>Quantity</h6>
                                                </th>
                                                <?php
                                                if (!empty($table) && $table == "stock_in") {
                                                    ?>
                                                <th>
                                                    <h6>Rak</h6>
                                                </th>
                                                <?php
                                                }?>
                                                <th>
                                                    <h6>Last Date</h6>
                                                </th>
                                                <th>
                                                    <h6>Action</h6>
                                                </th>
                                            </tr>
                                            <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            <?php foreach($stock as $row) { ?>
                                            <tr>
                                                <td class="min-width">
                                                    <div class="lead">
                                                        <div class="lead-image">
                                                            <img src="<?=base_url();?>assets/img/powermonitor.jpg"
                                                                alt="" />
                                                        </div>
                                                        <div class="lead-text">
                                                            <p><?=$row->item_name;?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="min-width">
                                                    <p><?=$row->item_code;?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?=$row->category_name;?></p>
                                                </td>
                                                <?php
                                                if (!empty($item)) {
                                                    ?>
                                                <td class="min-width">
                                                    <p class="text-danger"><?=strtoupper($row->status);?></p>
                                                </td>
                                                <?php
                                                    }?>
                                                <td class="min-width">
                                                    <p class="text-danger">
                                                        <?=$row->quantity. ' <span class="text-sm text-gray">'. $row->unit;?></span>
                                                    </p>
                                                </td>
                                                <?php
                                                if (!empty($table) && $table == "stock_in") {
                                                    ?>
                                                <td class="min-width">
                                                    <p><?=$row->location;?></p>
                                                </td>
                                                <?php
                                                    }?>
                                                <td class="min-width datetime">
                                                    <p><?=$table == 'stock' ? tglJamDate($row->updated_at) : tglJamDate($row->created_at);?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <span class="text-danger">
                                                            <?php 
                                                            // echo $item;
                                                            if(empty($item) && $table == "stock") {
                                                                $edit = "href='".base_url().$table."/edit/".$row->item_id."'";
                                                            } elseif(!empty($item) && $table == "stock") {
                                                                $edit = "href='".base_url()."stock_".$row->status."/edit/".$row->stock_id."'";
                                                            } else {
                                                                $edit = "href='".base_url().$table."/edit/".$row->stock_id."'";
                                                            }
                                                            // $edit = empty($item) && $table == "stock" ? "href='".base_url().$table."/edit/".$row->item_id."'"  : "href='".base_url().$table."/edit/".$row->stock_id."'";
                                                            // $edit = !empty($item) && $table == "stock" ? "href='".base_url()."stock_".$row->status."/edit/".$row->stock_id."'"  :  $edit;
                                                            ?>
                                                            <a class="text-success" <?=$edit;?>><i
                                                                    class="lni lni-pencil"></i></a> |
                                                            <a class="text-danger" href="#"><i
                                                                    class="lni lni-trash-can"></a></i>
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
// Show Footer
// GLOBAL $order; 
$order =  $table == "stock_in" ? 5 : 4;
define('ORDER', !empty($item) ? 5 : $order);
$columns = !empty($column) ? $column : '[0,1,2,3,4]';
$columns = $table == "stock_in" ? '[0,1,2,3,4,5]' : $columns;
function javascript() {
    ?>
<script>
var base_url = "<?=URL;?>";
var orderby = "<?= ORDER;?>";
console.log(orderby);
var pageshow = 50;
var exportcolumns = '.$columns.';
</script>
<script src="<?=URL;?>assets/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?=URL;?>assets/js/datatables.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?=URL;?>assets/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?=URL;?>assets/js/moment.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?=URL;?>assets/js/datetime-moment.js"></script>
<script type="text/javascript" charset="utf8" src="<?=URL;?>assets/js/script.js?v=1.1"></script>

<script>
$(".datepicker").datepicker({
    format: "dd-mm-yyyy"
});
// moment.locale();         // en
// moment.format();
</script>
<?php
}
require_once 'template/footer.php';
?>