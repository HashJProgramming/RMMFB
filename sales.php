<?php
include_once 'functions/authentication.php';
include_once 'functions/view/nav-bar.php';
include_once 'functions/view/datatable.php';
?>
<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animation" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sales &amp; Transactions - RMMFBS</title>
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
            <h3 class="text-dark mb-4">Transactions & Sales</h3>
            <div class="card shadow my-5">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Transactions List</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                        <table class="table table-hover table-bordered my-0 w-100" id="dataTable" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Item</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Qty</th>
                                    <th>Returned</th>
                                    <th>Borrowed Date</th>
                                    <th>Returned Date</th>
                                    <th>Penalty</th>
                                    <th>Rent Price</th>
                                    <th colspan="3" class="text-center">Damages</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php get_transaction_list() ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
    <script>
        $('#dataTable').DataTable({
            // dom: 'Blfrtip',
            dom: 'Bfrtip',
            aaSorting: [
                [0, 'desc']
            ],
            "ordering": false,
            columnDefs: [{
                target: 0,
                visible: false,
                searchable: false
            }],

            buttons: [{
                    extend: 'excel',
                    title: 'RMMFB - Rental Management and Monitoring for a Fashion Boutique',
                    className: 'btn btn-primary',
                    text: '<i class="fa fa-file-excel"></i> EXCEL',
                    messageTop: function() {
                        return 'Date: ' + new Date().toLocaleString('en-US', {
                                year: 'numeric',
                                month: '2-digit',
                                day: '2-digit'
                            }) + ' ' +
                            new Date().toLocaleTimeString('en-US', {
                                hour: '2-digit',
                                minute: '2-digit'
                            });
                    },
                },
                {
                    extend: 'pdf',
                    title: 'RMMFB - Rental Management and Monitoring for a Fashion Boutique',
                    className: 'btn btn-primary',
                    text: '<i class="fa fa-file-pdf"></i> PDF',
                    messageTop: function() {
                        return 'Date: ' + new Date().toLocaleString('en-US', {
                                year: 'numeric',
                                month: '2-digit',
                                day: '2-digit'
                            }) + ' ' +
                            new Date().toLocaleTimeString('en-US', {
                                hour: '2-digit',
                                minute: '2-digit'
                            });
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-primary',
                    text: '<i class="fa fa-print"></i> Print',
                    title: 'RMMFB - Rental Management and Monitoring for a Fashion Boutique',
                    autoPrint: true,
                    customize: function(win) {
                        var table = $(win.document.body).find('table');
                        table.prepend('<thead><tr><th colspan="15" style="text-align: right;" id="dateTimeHeader"> Date: ' + new Date().toLocaleString() + '</th></tr></thead>');

                        $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                        $(win.document.body).find('tr:nth-child(odd) td').each(function(index) {
                            $(this).css('background-color', '#D0D0D0');
                        });
                        $(win.document.body).find('h1').css('text-align', 'center');
                    }
                }
            ]
        });
    </script>
</body>

</html>