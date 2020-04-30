<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Required datatable js -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets')}}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables/jszip.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables/pdfmake.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables/vfs_fonts.js"></script>
<script src="{{asset('assets')}}/plugins/datatables/buttons.html5.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/plugins/datatables/buttons.colVis.min.js"></script>

<script>
    var table = $("#table").DataTable({
        paginate: false,
        searching: false,
    })

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
</script>