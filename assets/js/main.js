$(document).ready(function() {
    const currentPath = window.location.pathname;
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

        if (currentPath.includes("/RMMFB/customers.php")) {
            $('a[data-bs-target="#update"]').on('click', function() {
                var id = $(this).data('id');
                var fullname = $(this).data('fullname');
                var address = $(this).data('address');
                var phone = $(this).data('phone');
                var email = $(this).data('email');
                var date = $(this).data('birthdate');

            //    console.log(id, fullname, address, phone, email, date);
                $('input[name="data_id"]').val(id);
                $('input[name="name"]').val(fullname);
                $('input[name="address"]').val(address);
                $('input[name="phone"]').val(phone);
                $('input[name="email"]').val(email);
                $('input[name="date"]').val(date);
            });

          } else if (currentPath.includes("/RMMFB/staff.php")) {
            $('a[data-bs-target="#update"]').on('click', function() {
                var id = $(this).data('id');
                var username = $(this).data('username');
                console.log(id, username);

                $('input[name="data_id"]').val(id);
                $('input[name="username"]').val(username);

            });
          } else if (currentPath.includes("/RMMFB/inventory.php")) {
            $('a[data-bs-target="#update"]').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var description = $(this).data('description');
                $('input[name="data_id"]').val(id);
                $('input[name="name"]').val(name);
                $('input[name="description"]').val(description);
                console.log(id); 
                $('input[name="data_id"]').val(id);
            });

            $('a[data-bs-target="#stock-in"]').on('click', function() {
                var id = $(this).data('id');
                console.log(id); 
                $('input[name="data_id"]').val(id);
            });

            $('a[data-bs-target="#stock-out"]').on('click', function() {
                var id = $(this).data('id');
                console.log(id); 
                $('input[name="data_id"]').val(id);
            });
          } else{
            console.log("The URL is neither /customer nor /list");
          }



        $('a[data-bs-target="#remove"]').on('click', function() {
            var id = $(this).data('id');
            console.log(id); 
            $('input[name="data_id"]').val(id);
        });


} );

