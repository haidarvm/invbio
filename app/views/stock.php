<?php
$css  = '
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/css/autoComplete.02.min.css">
      <style>
      </style>';
require_once 'template/header.php';
// require_once 'template/menu.php';
?>
<!-- ========== section start ========== -->
<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="titlemb-30">
                        <h2>Stock Managment</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-md-6">
                    <div class="breadcrumb-wrapper mb-30">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#0">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Stock
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
        <!-- ========== section end ========== -->
        <div class="row">
            <div class="col">
                <div class="card-style settings-card-1 mb-30">
                    <div class="title  mb-30  d-flex  justify-content-between  align-items-center">
                        <h6>Stock</h6>
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
                        <button class="border-0 bg-transparent">
                            <i class="lni lni-pencil-alt"></i>
                        </button>
                    </div>
                    <form class="forms-sample" action="<?=base_url();?>stock/save" method="POST">
                        <div class="d-flex align-items-center mb-30">
                            <div class="profile-image">
                                <img src="<?=base_url();?>assets/img/powermonitor.jpg" alt="" width="120" />
                            </div>
                            <div class="profile-meta">
                                <h5 class="text-bold text-dark mb-10">Product</h5>
                                <input type="text" id="autoComplete" placeholder="Power meter" value="" size="100"/>
                            </div>
                        </div>
                        <div class="input-style-1">
                            <label>Product</label>
                            <div class="selection text-gray"></div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <!-- Stock IN -->
                            <div class="tab-pane fade show active" id="in" role="tabpanel" aria-labelledby="in-tab">
                                <div class="input-style-1">
                                    <label>Stock In</label>
                                    <input type="number" name="quantity_in" value="" />
                                </div>
                            </div>
                            <!-- Stock Out -->
                            <div class="tab-pane fade" id="out" role="tabpanel" aria-labelledby="out-tab">
                                <div class="input-style-1">
                                    <label>Stock Out</label>
                                    <input type="number" name="quantity_out" value="" />
                                </div>
                                <input type="hidden" class="item_id" name="item_id" value="" />
                            </div>
                        </div>
                        <button class="main-btn primary-btn rounded-md btn-hover mt-50 mr-15">Save</button>
                        <button class="main-btn danger-btn-outline rounded-md btn-hover mt-50">Cancel</button>
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
              <script src="' . base_url() . 'assets/js/autoComplete.min.js"></script>
              <script src="' . base_url() . 'assets/js/jquery-3.6.0.min.js"></script>
              <script src="' . base_url() . 'assets/js/autoComplete.js"></script>
              <script>
              $("#in-tab").bind("click", function(e) {
                $("input[name=quantity_out]").val("")
                $("#static").fadeOut();
              });
              $("#out-tab").bind("click", function(e) {
                $("input[name=quantity_in]").val("")
                  $("#static").fadeIn();
              });
              </script>
            ';
require_once 'template/footer.php';
?>