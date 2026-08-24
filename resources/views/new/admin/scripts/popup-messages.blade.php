<script>
    /*
     * Flash-message popups.
     *
     * The admin views do not agree on a SweetAlert version: most load 6.6.9,
     * a few load v11, and v11 removed the global swal() this file used to call.
     * On those pages every success and error message silently failed. Detect
     * the API that is actually present and fall back to a plain alert so a
     * message is never lost.
     */
    (function () {
        function showMessage(type, title, text) {
            if (!text) {
                return;
            }

            var isError = type === 'error';

            if (window.Swal && typeof window.Swal.fire === 'function') {
                window.Swal.fire({
                    title: title,
                    text: text,
                    icon: type,
                    timer: isError ? undefined : 2500,
                    showConfirmButton: isError,
                    confirmButtonColor: '#C92228',
                    confirmButtonText: 'Close',
                    allowOutsideClick: true
                });
                return;
            }

            if (typeof window.swal === 'function') {
                window.swal({
                    title: title,
                    text: text,
                    type: type,
                    timer: isError ? undefined : 2500,
                    showConfirmButton: isError,
                    confirmButtonColor: '#C92228',
                    confirmButtonText: 'Close',
                    position: 'center',
                    allowOutsideClick: true
                });
                return;
            }

            window.alert(title + '\n\n' + text);
        }

        function run() {
            @if(session('success'))
                showMessage('success', 'Success', @json(session('success')));
            @endif

            @if(session('error'))
                showMessage('error', 'Error', @json(session('error')));
            @endif
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', run);
        } else {
            run();
        }
    })();
</script>
