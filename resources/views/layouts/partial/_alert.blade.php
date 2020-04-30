@if (session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: '{{session('success')}}',
        type: 'success',
        showCancelButton: false,
        confirmButtonColor: "#58db83",
    })
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        title: 'Error!',
        text: '{{session('error')}}',
        type: 'error',
        showCancelButton: false,
        confirmButtonColor: "#ec536c",
    })
</script>
@endif