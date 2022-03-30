<?php
$css  = '<link rel="stylesheet" href="' . base_url() . 'assets/css/autoComplete.min.css">
        <style>
        </style>';
require_once 'template/header.php';
// require_once 'template/menu.php';
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
                                for ($x = 0; $x <= 10; $x++) { ?>
                                    <tr>
                                        <td class="min-width">
                                            <?php $form->input_only('text', 'item', 'Item','','','','col-sm-12');?>
                                        </td>
                                        <td class="min-width">
                                            <?php $form->input_only('text', 'quantity_in', 'QTY IN');?>
                                        </td>
                                        <td class="min-width">
                                            <?php $form->input_only('text', 'quantity_out', 'QTY OUT');?>
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
// Show Footer SET rules cannot both 0 or null
$javascript = '<script>            
              var base_url = "' . base_url() . '";
              </script>
              <script src="' . base_url() . 'assets/js/autoComplete.min.js"></script>
              <script src="' . base_url() . 'assets/js/jquery-3.6.0.min.js"></script>
              <script src="' . base_url() . 'assets/js/autoComplete.js"></script>
              ';
require_once 'template/footer.php';
?>