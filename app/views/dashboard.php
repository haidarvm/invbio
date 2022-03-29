<?php
$css  = '<link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/css/datatables.min.css">
      <style>
      </style>';
require_once 'template/header.php';?>
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="titlemb-30">
                        <h2>Dashboard</h2>
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
                                    <?=$page_title?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <div class="row">
            <div class="col">
                <div class="tables-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="card-style mb-30">
                                <h6 class="mb-10">Stock Tersedia </h6>
                                <p class="text-sm mb-20">
                                    Berikut stock tersedia semua barang
                                </p>
                                <div class="table-wrapper table-responsive">
                                    <table class="table" id="stocklist">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>Nama Barang</h6>
                                                </th>
                                                <th>
                                                    <h6>Kode Barang</h6>
                                                </th>
                                                <th>
                                                    <h6>Nama Akun</h6>
                                                </th>
                                                <th>
                                                    <h6>Quantity</h6>
                                                </th>
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
                                                            <img src="assets/img/powermonitor.jpg" alt="" />
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
                                                <td class="min-width">
                                                    <p><?=$row->quantity;?></p>
                                                </td>
                                                <td class="min-width">
                                                    <p><?=$row->created_at;?></p>
                                                </td>
                                                <td>
                                                    <div class="action">
                                                        <button class="text-danger">
                                                            <i class="lni lni-pencil"></i> | 
                                                            <i class="lni lni-trash-can"></i>
                                                        </button>
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
$javascript ='<script>            
              var base_url = "' . base_url() . '";
             
              </script>
              <script src="' . base_url() . 'assets/js/jquery-3.6.0.min.js"></script>
              <script type="text/javascript" charset="utf8" src="' . base_url() . 'assets/js/datatables.min.js"></script>
              <script>   
              $(document).ready( function () {
                $("#stocklist").DataTable({

                        dom: "Bfrtip",
                        buttons: [
                            {
                                extend: "collection",
                                text: "Export",
                                buttons: [
                                    "copy",
                                    "excel",
                                    "csv",
                                    "pdf",
                                    "print"
                                ]
                            }
                        ]
                    });
            });
                </script>';
require_once 'template/footer.php';
?>