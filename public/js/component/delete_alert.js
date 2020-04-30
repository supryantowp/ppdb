$(".btn-delete").on("click", e => {
    e.preventDefault();
    let deleteForm = e.toElement.parentElement;

    Swal.fire({
        title: "Yakin?",
        text: "Akan mengahapus data ini!",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya hapus!",
        confirmButtonColor: "#58db83",
        cancelButtonColor: "#ec536c"
    }).then(result => {
        if (result.value) {
            deleteForm.submit();
        }
    });
});
