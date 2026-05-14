<script>
    $(document).ready(function() {
        @if(session('success'))
        swal({
            title: "Success!",
            text: "{!! session('success') !!}",
            type: "success",
            timer: 2500,
            showConfirmButton: false,
            position: 'center',
            allowOutsideClick: true
        });
        @endif

        @if(session('error'))
        swal({
            title: "Error!",
            text: "{!! session('error') !!}",
            type: "error",
            confirmButtonColor: "#C92228",
            confirmButtonText: "Close"
        });
        @endif
    });
</script>
