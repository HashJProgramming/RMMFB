<?php
include_once 'functions/authentication.php';
include_once 'functions/view/datatable.php';
include_once 'functions/view/nav-bar.php';
include_once 'functions/view/get-data.php';
$results = get_customer_data();
$fullname = $results['fullname'];
$phone = $results['phone'];
$email  = $results['email'];
$address = $results['address'];
$id = $results['id'];

$total = get_total_rental_item($id);
$count = get_count_rental_items($id);

?>
<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animation" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rentals - RMMFBS</title>
    <meta name="description" content="Rental Management and Monitoring for a Fashion Boutique">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
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
                <h3 class="text-dark mb-0">Transaction</h3><button class="btn btn-dark btn-sm" type="button" data-bs-target="#create" data-bs-toggle="modal"><i class="fas fa-truck-loading fa-sm text-white-50"></i>&nbsp;Add Item</button>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>TOTAL</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span>₱<?php echo $total; ?></span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>TOTAL ITEMS</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span><?php echo $count ?></span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col-lg-6 col-xl-6">
                    <div class="card shadow my-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Items</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                                <table class="table table-striped my-0 w-100" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID #</th>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Return Date</th>
                                            <th class="text-center">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php transaction_item_list($id) ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="card shadow my-5">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <p class="text-primary m-0 fw-bold">Transaction Information</p>
                                </div>
                                <div class="col text-end">
                                <button class="btn btn-danger mx-2" type="button" data-bs-target="#cancel" data-bs-toggle="modal">Cancel</button>
                                <button class="btn btn-primary" type="button" data-bs-target="#proceed" data-bs-toggle="modal">Proceed</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Fullname: </strong><strong><?php echo $fullname ?></strong></label></div>
                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Phone: </strong><strong><?php echo $phone ?></strong></div>
                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Email: </strong><strong><?php echo $email ?></strong></div>
                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Address: </strong><strong><?php echo $address ?></strong></div>  
                            </form>
                        </div>
                    </div>
                </div>     
            </div>   
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="create">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/rent-item-add.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <div style="margin-top: 5px;"><label class="form-label">Item</label>
                        <select class="selectpicker select" data-live-search="true" name="item">
                                <optgroup label="SELECT ITEM">
                                    <?php items() ?>
                                </optgroup>
                            </select></div>
                        <div style="margin-top: 5px;"><label class="form-label">Quantity</label><input class="form-control" type="number" placeholder="Quantity" name="qty" required="" value="1"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Price</label><input class="form-control" type="number" placeholder="Price" name="price" required="" value="1" min="1"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Return Date</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
                    
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Transaction</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/rent-item-update.php" method="post">
                    <input type="hidden" name="data_id">
                        <div style="margin-top: 5px;"><label class="form-label">Rental Return Date</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cancelation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/transaction-cancel.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <p>Are you sure you want to cancel this transaction?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Cancel</button></div>
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
                    <form action="functions/rent-item-remove.php" method="post">
                    <input type="hidden" name="data_id">
                    <p>Are you sure you want to remove this Item?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="proceed">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Proceed Transaction</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to proceed this transaction?</p>
                </div>
                <form action="functions/transaction-proceed.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
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