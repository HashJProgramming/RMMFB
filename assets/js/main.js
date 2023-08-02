$(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const type = urlParams.get('type');
        const message = urlParams.get('message');

    $('#dataTable').DataTable( {
        // dom: 'Blfrtip',
        dom: 'Bfrtip',
        buttons: [
            
            { 
                extend: 'excel', 
                title: 'RMMFB - Rental Management and Monitoring for a Fashion Boutique', 
                className: 'btn btn-primary',
                text: '<i class="fa fa-file-excel"></i> EXCEL'
            },
            {
                extend: 'pdf',
                title: 'RMMFB - Rental Management and Monitoring for a Fashion Boutique', 
                className: 'btn btn-primary',
                text: '<i class="fa fa-file-pdf"></i> PDF'
            },
            { 
                extend: 'print', 
                className: 'btn btn-primary',
                text: '<i class="fa fa-print"></i> Print',
                title: 'RMMFB - Rental Management and Monitoring for a Fashion Boutique', 
                autoPrint: true,
                exportOptions: {
                    columns: ':visible',
                },
                customize: function (win) {
                    $(win.document.body).find('table').addClass('display').css('font-size', '9px');
                    $(win.document.body).find('tr:nth-child(odd) td').each(function(index){
                        $(this).css('background-color','#D0D0D0');
                    });
                    $(win.document.body).find('h1').css('text-align','center');
                }
            }
        ]
    } );

    VANTA.WAVES({
        el: "#bg-animation",
        mouseControls: false,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00,
        color: 0xb7b7c0,
        waveSpeed: 1.00,
        zoom: 0.60
      })  

        
        if (type == 'success') {
            Swal.fire(
                'Success!',
                 message,
                'success'
              )
        } else if (type == 'error') {
            Swal.fire(
                'Error!',
                 message,
                'error'
              )
        }

} );

