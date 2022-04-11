<?php
function css() {
    ?>
<link rel="stylesheet" href="<?=URL;?>assets/css/autoComplete.min.css">
<style>
</style>
<?php
}
require_once 'template/header.php';
?>
<!-- ========== section start ========== -->
<section class="section">
    <div class="container-fluid">
        <?php require_once 'template/title_breadcrumb.php'; ?>
        <div class="row">
            <div class="col">
                <div class="card-style settings-card-1 mb-30">
                    <?php
                    $form = new Bas_Form;
                    $form->open(base_url().'stock/save_multi');
                    ?>
                    <div class="table-wrapper">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h6>Nama Barang</h6>
                                    </th>
                                    <th>
                                        <h6 class="text-success">Stock IN</h6>
                                    </th>
                                    <th>
                                        <h6 class="text-danger">Stock Out</h6>
                                    </th>
                                </tr>
                                <!-- end table row-->
                            </thead>
                            <tbody>
                                <?php 
                                for ($x = 1; $x <= 10; $x++) { ?>
                                <tr>
                                    <td class="min-width">
                                        <?php $form->input_only_multi('text', 'item', 'Item','','','','col-sm-12'. '','autocomplete'.$x,'autoComplete');?>
                                    </td>
                                    <td class="min-width ">
                                        <?php $form->input_only_multi('text', 'quantity_in', 'QTY IN');?>
                                    </td>
                                    <td class="min-width">
                                        <?php $form->input_only_multi('text', 'quantity_out', 'QTY OUT');?>
                                    </td>
                                </tr>
                                <?php } 
                                ?>
                            </tbody>
                        </table>
                        <?php
                        $form->button('Save', 'primary-btn ');
                        $form->close();
                        ?>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <!-- end container -->
    </div>
</section>
<?php
function javascript() {
    ?>
<script>
var base_url = "<?=URL;?>";
</script>
<script src="<?=URL;?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?=URL;?>assets/js/autoComplete.min.js"></script>
<script src="<?=URL;?>assets/js/autoComplete.js?v=1.2"></script>
<!--<script src="<?=URL;?>assets/js/autoComplete.js"></script>-->
<script>

create_autocomplete("#autocomplete1");
create_autocomplete("#autocomplete2");
create_autocomplete("#autocomplete3");
create_autocomplete("#autocomplete4");
create_autocomplete("#autocomplete5");
create_autocomplete("#autocomplete6");
create_autocomplete("#autocomplete7");
create_autocomplete("#autocomplete8");
create_autocomplete("#autocomplete9");
create_autocomplete("#autocomplete10");
</script>
<?php
}
require_once 'template/footer.php';
?>