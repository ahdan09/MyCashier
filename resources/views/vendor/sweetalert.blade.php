
<script>
    function confirmDelete(event) {
        event.preventDefault();

        console.log("Button clicked");
        Swal.fire({
            title: 'Apa kamu yakin?',
            text: 'Anda tidak akan dapat memulihkan user ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batalkan'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.closest('form').submit();
            }
        });
    }
    </script>

