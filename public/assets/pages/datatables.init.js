
/*
 Template Name: Dashor - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Datatable js
 */

$(document).ready(function() {
    $('#datatable').DataTable(
        {
            "scrollX": true
        }
    );

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

    var table = $('#datatable-buttons2').DataTable({
        lengthChange: false,
        dom: 'Bfrtip',
        ordering: false,
        buttons: [
            {
                extend: 'excelHtml5',
                title: $('#valExcel').val()
            },
            {
                extend: 'pdfHtml5',
                title: 'Data export'
            }
        ]
        
    });
    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    $(document).ready(function() {
        $('#datatable2').DataTable();  
    } );
    $(document).ready(function() {
        $('#datatable-search tfoot th').each( function () {
           var title = $(this).text();
           $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
       } );
    
       var table = $('#datatable-search').DataTable( {
           searchPanes:{
               viewTotal: true,
           },
           dom: 'Pfrtip',
       });
    
        table.columns().every( function () {
           var that = this;
     
           $( 'input', this.footer() ).on( 'keyup change', function () {
               if ( that.search() !== this.value ) {
                   that
                       .search( this.value )
                       .draw();
               }
           } );
       } );
   });
} );

