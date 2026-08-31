<style>
    /* --- DRAG & DROP + VISUAL COVER INDICATOR --- */
    #image-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: block; /* keep block so jQuery UI Sortable behaves */
    }

    #image-list .image-checkbox {
        position: relative;
        display: inline-block;
        vertical-align: top;
        margin: 0 15px 15px 0;
        cursor: grab;
    }

    #image-list .image-checkbox:active {
        cursor: grabbing;
    }

    /* Minimalist Cover Label on the first image */
    #image-list .image-checkbox:first-child::after {
        content: 'Cover';
        position: absolute;
        top: 0;
        left: 0;
        background: #b5121b;
        color: #ffffff;
        padding: 2px 6px;
        font-size: 11px;
        font-weight: bold;
        border-bottom-right-radius: 4px;
        z-index: 10;
        pointer-events: none;
    }

    /* Matching border around the cover image */
    #image-list .image-checkbox:first-child img {
        border: 2px solid #b5121b;
        box-sizing: border-box;
    }
</style>

<link rel="stylesheet" href="vendor/jquery/jquery-ui/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
    // --- Delete selected images (SweetAlert confirmation) ---
    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
        event.preventDefault();

        let check = [];
        $(".image-checkbox").each(function () {
            if (this.classList.contains('image-checkbox-checked')) {
                check.push('true');
            } else check.push('false');
        });

        if (!check.includes("true")) {
            Swal.fire({
                title: 'No Images Selected',
                text: 'Please select images!',
                icon: 'info'
            });
            return;
        }

        Swal.fire({
            text: 'Are you sure you want to delete the selected images?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#b5121b',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        let initialCoverId;

        // Reusable save: posts the current order; first image becomes the cover.
        function saveImageOrder() {
            let imageIdsArray = [];
            $('#image-list li').each(function () {
                let id = $(this).attr('id');
                let split_id = id.split("_");
                imageIdsArray.push(split_id[1]);
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ $orderRoute }}",
                data: {imageIds: imageIdsArray},
                success: function (response) {
                    Swal.fire({
                        title: "Saved!",
                        text: "Cover and image order have been successfully updated!",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }

        // Sortable with cover-change confirmation + auto-save
        $("#image-list").sortable({
            start: function (event, ui) {
                // Record the current cover (first item) when dragging starts
                initialCoverId = $('#image-list li:first-child').attr('id');
            },
            update: function (event, ui) {
                let newCoverId = $('#image-list li:first-child').attr('id');

                // Only confirm + auto-save when the cover (first item) changed
                if (initialCoverId !== newCoverId) {
                    Swal.fire({
                        title: 'Change Cover Image?',
                        text: 'Do you really want to change the cover after ordering?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#b5121b',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, change it!',
                        cancelButtonText: 'No, revert'
                    }).then((result) => {
                        if (!result.isConfirmed) {
                            $(this).sortable('cancel');
                        } else {
                            initialCoverId = newCoverId;
                            saveImageOrder();
                        }
                    });
                }
            }
        });

        // Manual "Save Image Order" button (for non-cover reordering)
        $('#submit').click(function (e) {
            e.preventDefault();
            saveImageOrder();
        });
    });
</script>
