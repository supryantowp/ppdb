const frmTerima = document.getElementById("frmTerima");
const frmTidakTerima = document.getElementById("frmTidakTerima");

let btnTerima = document.querySelectorAll(".btn-terima");
let btnTidak = document.querySelectorAll(".btn-tidak");

btnTerima.forEach(index => {
    index.addEventListener("click", event => {
        event.preventDefault();
        let form = event.toElement.parentElement;
        Swal.fire({
            title: "Sudah yakin?",
            text: "Kamu akan yakin menerima siswa ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#58db83",
            cancelButtonColor: "#ec536c",
            confirmButtonText: "Terima!"
        }).then(function(result) {
            if (result.value) {
                form.submit();
            }
        });
    });
});

btnTidak.forEach(index => {
    index.addEventListener("click", event => {
        event.preventDefault();
        let form = event.toElement.parentElement;
        Swal.fire({
            title: "Sudah yakin?",
            text: "Kamu akan yakin tidak menerima siswa ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#58db83",
            cancelButtonColor: "#ec536c",
            confirmButtonText: "Tidak terima!"
        }).then(function(result) {
            if (result.value) {
                form.submit();
            }
        });
    });
});

// frmTerima.addEventListener("click", e => {
//     e.preventDefault();
//     let form = e.toElement.parentElement;
//     Swal.fire({
//         title: "Sudah yakin?",
//         text: "Kamu akan yakin menerima siswa ",
//         type: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#58db83",
//         cancelButtonColor: "#ec536c",
//         confirmButtonText: "Terima!"
//     }).then(function(result) {
//         if (result.value) {
//             frmTerima.submit();
//         }
//     });
// });

// frmTidakTerima.addEventListener("click", e => {
//     e.preventDefault();
//     Swal.fire({
//         title: "Sudah yakin?",
//         text: "Kamu akan tidak menerima siswa ",
//         type: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#58db83",
//         cancelButtonColor: "#ec536c",
//         confirmButtonText: "Tidak Terima!"
//     }).then(function(result) {
//         if (result.value) {
//             frmTerima.submit();
//         }
//     });
// });
