<?php
include_once 'functions/authentication.php';
include_once 'functions/view/datatable.php';
include_once 'functions/view/nav-bar.php';
?>
<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animation" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Damage List - RMMFBS</title>
    <meta name="description" content="Rental Management and Monitoring for a Fashion Boutique">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/dataTables.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="content">
    <nav class="navbar navbar-expand-lg mb-4 shadow navbar-light">
            <div class="container-fluid"><img src="assets/img/boutique.png" width="60em"><a class="navbar-brand d-flex align-items-center" href="/"><span>RMMFB</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div id="navcol-1" class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
                        <?php navbar(); ?>
                    </ul>
                    <a class="btn btn-light shadow" role="button" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="left" href="functions/logout.php" title="Here you can logout your acccount.">Logout</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Damage Management</h3>
                    <?php
                        if(!isset($_GET['filter'])){
                            ?>
                                <a class="btn btn-dark btn-sm" type="button" href="damage.php?filter=settle" data-bss-tooltip="" title="Here you can view the settled records." data-bs-target="#add"><i class="fas fa-truck-loading fa-sm text-white-50"></i>&nbsp;Filter Settled</a>
                            <?php
                        }else{
                            ?>
                                <a class="btn btn-dark btn-sm" type="button" href="damage.php" data-bss-tooltip="" title="Here you can view the unsettled records." data-bs-target="#add"><i class="fas fa-truck-loading fa-sm text-white-50"></i>&nbsp;Filter Unsettled</a>
                            <?php
                        }
                    ?>
            </div>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Damage Item List</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                    <table class="table table-hover my-0 w-100" id="dataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Item</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Qty</th>
                                    <th>Borrowed Date</th>
                                    <th>Returned Date</th>
                                    <th>Condition</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php get_damage_transaction_list() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/item-condition.php" method="post">
                        <input type="hidden" name="data_id">
                        <div style="margin-top: 5px;"><label class="form-label">Item Condition</label>
                            <select class="form-select" required="" name="conditions">
                                <optgroup label="Conditions">
                                    <option value="5" selected="">Repaired</option>
                                    <option value="6">Beyond Repair</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Item Quantity</label>
                            <input type="number" name="qty" value="1" min="1" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="remove">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remove Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this item?</p>
                </div>
                <form action="functions/item-remove.php" method="post">
                    <input type="hidden" name="data_id">
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap-select.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/jszip.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/three.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/vanta.birds.min.js"></script>
    <script src="assets/js/vanta.waves.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>