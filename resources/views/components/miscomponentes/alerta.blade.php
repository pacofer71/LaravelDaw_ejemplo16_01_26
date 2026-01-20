@session('mensaje')
    <script>
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{ session('mensaje') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endsession
