<?php
$css  = '
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
                    <form class="forms-sample" action="<?=base_url(),'stock/update/'.$table;?>" method="POST">
                        <?php
                        $form = new Bas_Form;
                        ?>
                        <div class="d-flex align-items-center justify-content-center">
                            <!-- <img src="<?=base_url();?>assets/img/powermonitor.jpg" alt="" width="120" /> -->
                        </div>
                        <div class="d-flex align-items-center mb-30">
                            <div class="profile-image">
                            <img src="<?=base_url();?>assets/img/powermonitor.jpg" alt="" width="120" />
                                
                            </div>
                            <div class="profile-meta pl-30">
                                <h5 class="text-bold text-dark mb-10">Product</h5>
                                <p class=" text-black"><?=$stock->item_name;?></p>
                            </div>
                        </div>
                        <?php
                        // $form->input_line('text', 'product', 'Product', '', $stock->item_name,true);
                        $form->input_line('text', 'quantity', $page_title, '', $stock->quantity, '',true, 'text-danger');
                        $form->input_line('text', 'desc', 'Keterangan');
                        $form->input_line('text', 'created_at', 'Tanggal', '', tglJamDate($stock->created_at),true);
                        $form->input_hidden('stock_id',$stock->stock_id);
                        ?>
                        <button class="main-btn primary-btn rounded-md btn-hover mr-15">Save</button>
                        <button class="main-btn danger-btn-outline rounded-md btn-hover">Cancel</button>
                    </form>
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
              </script>';
require_once 'template/footer.php';
?>