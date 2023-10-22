<?php
include_once 'functions/authentication.php';
include_once 'functions/view/datatable.php';
include_once 'functions/view/get-data.php';
include_once 'functions/view/nav-bar.php';
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
                <h3 class="text-dark mb-0">Rental Management</h3><button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bss-tooltip="" data-bs-placement="left" type="button" data-bs-target="#create" title="Here you can create new transaction."><i class="fas fa-user-check fa-sm text-white-50"></i>&nbsp;Create Transaction</button>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>TOTAL RENTS</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span><?php echo get_total_rent() ?></span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-money-bill fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-start-warmning py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col me-2">
                                    <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>TOTAL OVERDUE</span></div>
                                    <div class="text-dark fw-bold h5 mb-0"><span><?php echo get_total_late() ?></span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-money-bill fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow my-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Rental List</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
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
                                    <th>Rent Price</th>
                                    <th>Status</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php get_rent_list() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="create">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Transaction</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/transaction-create.php" method="post">
                        <div style="margin-top: 5px;"><label class="form-label">Customer</label>
                            <select class="selectpicker" data-live-search="true" name="id">
                                <optgroup label="SELECT Customer">
                                <?php customers() ?>
                                </optgroup>
                            </select>
                        </div>
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
                    <form>
                        <div style="margin-top: 5px;"><label class="form-label">Item</label><input class="form-control" type="text" placeholder="Item" name="item" required="" pattern="^(?!\s).*$"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Price</label><input class="form-control" type="number" placeholder="Price" name="price" required=""></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Return Date</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="remove">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="button">Remove</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="return">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Return Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/item-return.php" method="post">
                        <input type="hidden" name="data_id">
                        <div style="margin-top: 5px;"><label class="form-label">Item Condition</label>
                            <select class="form-select" required="" name="conditions">
                                <optgroup label="Conditions">
                                    <option value="1" selected="">Good Condition</option>
                                    <option value="2">Bad Condition</option>
                                    <option value="3">Very Bad Condition</option>
                                    <option value="4">Missing</option>
                                </optgroup>
                            </select>
                        </div>
                        <div style="margin-top: 5px;"><label class="form-label">Penalty</label><input class="form-control" type="number" name="penalty" value="0" required=""></div>
                    
                </div>
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