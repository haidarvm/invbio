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
                    <div class="d-flex align-items-center justify-content-center mb-10">
                        <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <button class="nav-link active" id="in-tab" data-bs-toggle="tab" data-bs-target="#in"
                                    type="button" role="tab" aria-controls="in" aria-selected="true">Stock In</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="out-tab" data-bs-toggle="tab" data-bs-target="#out"
                                    type="button" role="tab" aria-controls="out" aria-selected="false">Stock
                                    Out</button>
                            </li>
                        </ul>
                    </div>
                    <?php
                        $form = new Bas_Form;
                        $form->open(base_url().'stock/save');
                        ?>

                    <div class="profile-info">
                        <div class="profile-image">
                            <img src="<?=base_url();?>assets/img/powermonitor.jpg" alt="" width="120" />
                        </div>
                    </div>
                        <?php
                        $form->input_line('text', 'product', 'Product', '', '', '', '','','autoComplete');
                        ?>
                    <div class="tab-content" id="myTabContent">
                        <!-- Stock IN -->
                        <div class="tab-pane fade show active" id="in" role="tabpanel" aria-labelledby="in-tab">
                            <?php
                                $form->input_line('text', 'rak', 'Tempat Rak');
                                $form->input_line('number', 'quantity_in', 'Stock In', '', '');
                                ?>
                        </div>
                        <!-- Stock Out -->
                        <div class="tab-pane fade" id="out" role="tabpanel" aria-labelledby="out-tab">
                            <?php
                                $form->input_line('number', 'quantity_out', 'Stock out', '', '');
                                ?>
                            <input type="hidden" class="item_id" name="item_id" />
                        </div>
                    </div>
                    <?php
                        $form->input_line('text', 'desc', 'Keterangan');
                        $form->input_hidden('item_id');
                        $form->input_hidden('table');
                        $form->button('Save', 'primary-btn ');
                        $form->a_button( base_url().'stock', "Cancel",'danger-btn-outline');
                        $form->close();
                        ?>
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
               <script>
                $("input[name=table]").val("stock_in");
                $("input[name=quantity_in]").attr("required", true);
                $("#in-tab").bind("click", function(e) {
                    $("input[name=quantity_in]").attr("required", true);
                    $("input[name=quantity_out]").attr("required", false);
                    $("input[name=quantity_out]").val("");
                    $("input[name=table]").val("stock_in");
                    $("#static").fadeOut();
                });
                $("#out-tab").bind("click", function(e) {
                    $("input[name=quantity_in]").attr("required", false);
                    $("input[name=quantity_in]").val("");
                    $("input[name=quantity_out]").attr("required", true);
                    $("input[name=table]").val("stock_out");
                    $("#static").fadeIn();
                });
              </script>';
require_once 'template/footer.php';
?>