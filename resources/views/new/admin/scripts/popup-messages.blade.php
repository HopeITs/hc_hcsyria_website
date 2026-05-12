<script>
    $(document).ready(function() {
        @if(session('success') || isset($success))
        swal({
            title: "Success!",
            text: "{{ session('success') ?? $success }}",
            type: "success",
            timer: 2500,
            showConfirmButton: false,
            position: 'center',
            allowOutsideClick: true
        });
        @endif

        @if(session('error') || isset($err))
        swal({
            title: "Error!",
            text: "{{ session('error') ?? $err }}",
            type: "error",
            confirmButtonColor: "#C92228",
            confirmButtonText: "Close"
        });
        @endif
    });
</script>
