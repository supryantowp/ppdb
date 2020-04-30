var table = $("#table").DataTable({
    paginate: false,
    searching: false
});

table
    .buttons()
    .container()
    .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
