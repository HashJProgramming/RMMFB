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
    <title>Rentals - RMMFBS</title>
    <meta name="description" content="Rental Management and Monitoring for a Fashion Boutique">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="icon" type="image/png" sizes="512x512" href="assets/img/boutique.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="content">
        <nav class="navbar navbar-expand shadow mb-4 topbar static-top navbar-light" id="nav-animation">
            <div class="container-fluid"><img src="assets/img/boutique.png" width="60em"><a class="navbar-brand d-flex align-items-center" href="/"><span>RMMFB</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav mx-auto">
                    <?php navbar(); ?>
                    </ul><a class="btn btn-light shadow" role="button" data-bs-toggle="tooltip" data-bss-tooltip="" data-bs-placement="left" href="functions/logout.php" title="Here you can logout your acccount.">Logout</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark mb-0">Transaction</h3><button class="btn btn-dark btn-sm d-none d-sm-inline-block" type="button" data-bs-target="#create" data-bs-toggle="modal"><i class="fas fa-truck-loading fa-sm text-white-50"></i>&nbsp;Add Item</button>
            </div>
            <div class="card shadow my-5">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <p class="text-primary m-0 fw-bold">Transaction Information</p>
                        </div>
                        <div class="col text-end"><button class="btn btn-danger mx-2" type="button" data-bs-target="#confirm" data-bs-toggle="modal">Cancel</button><button class="btn btn-primary" type="button" data-bs-target="#proceed" data-bs-toggle="modal">Proceed</button></div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Fullname</strong></label><input class="form-control" type="text" id="first_name" placeholder="John" name="first_name" readonly=""></div>
                            </div>
                        </div>
                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Address</strong></label><input class="form-control" type="text" placeholder="Address" name="address" readonly=""></div>
                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Phone</strong></label><input class="form-control" type="text" placeholder="Contact" name="address" readonly=""></div>
                    </form>
                </div>
            </div>
            <div class="card shadow my-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Items</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-striped my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Return Date</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#1</td>
                                    <td>Downy</td>
                                    <td>1</td>
                                    <td>2008/11/29</td>
                                    <td class="text-center"><a class="mx-1" href="#" data-bs-target="#update" data-bs-toggle="modal"><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a><a class="mx-1" href="#" data-bs-target="#remove" data-bs-toggle="modal"><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a></td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td>Tide Powder</td>
                                    <td>1</td>
                                    <td>2008/11/28</td>
                                    <td class="text-center"><a class="mx-1" href="#" data-bs-target="#update" data-bs-toggle="modal"><i class="far fa-edit text-warning" style="font-size: 20px;"></i></a><a class="mx-1" href="#" data-bs-target="#remove" data-bs-toggle="modal"><i class="far fa-trash-alt text-danger" style="font-size: 20px;"></i></a></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr></tr>
                            </tfoot>
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
                    <h4 class="modal-title">Add Item</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div style="margin-top: 5px;"><label class="form-label">Item</label><select class="form-select" name="item">
                                <optgroup label="This is a group">
                                    <option value="12" selected="">This is item 1</option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select></div>
                        <div style="margin-top: 5px;"><label class="form-label">Quantity</label><input class="form-control" type="number" placeholder="Price" name="qty" required="" value="0"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Price</label><input class="form-control" type="number" placeholder="Price" name="price" required="" value="0"></div>
                        <div style="margin-top: 5px;"><label class="form-label">Rental Return Date</label><input class="form-control" placeholder="Item" name="date" type="date" required=""></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
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
    <div class="modal fade" role="dialog" tabindex="-1" id="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cancelation</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this transaction?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="button">Cancel</button></div>
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
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
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