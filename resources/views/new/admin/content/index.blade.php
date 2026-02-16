<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="/js/jquery.js"></script>

    <?php $page = 'content' ?>
    @include('new.admin.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Content</title>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>

    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <link href="/css/dashboard_new.css" rel="stylesheet">
    <link href="/css/dashboard_navbar.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script> <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <link href="/css/tabs.css" rel="stylesheet">
    <style>
        #selectAll {
            /*position: absolute;*/
            /*visibility: hidden;*/
            opacity: 0;
            display: block !important;
            position: relative;
            right: 5px;
            bottom: 5px;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 col-md-11 col-sm-11 col-11">
            <div id="projects">
                <div class="row mb-3">
                    <div class="form-group col-lg-8 col-md-8 col-12">
                        <label>Select Project</label><br>
                        <div class="btn-group w-100 flex-wrap" role="group">
                            @foreach($what_categories as $what)
                                <input type="radio" name="whatCategory" class="btn-check"  data-name="{{$what->name}}"
                                       id="category_{{$what->id}}" value="{{$what->id}}">
                                <label for="category_{{$what->id}}"
                                       class="btn btn-outline-primary">{{$what->name}}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Placeholder for AJAX-loaded form --}}
                <div id="section-form-container" class="mt-4">
                    <div class="text-muted">Select a section to edit its content.</div>
                </div>
            </div>
        </div>
    </div>
</div>


@stack('navbar_scripts')
<script>
    const inputs = document.querySelectorAll('input[name="whatCategory"]');
    const container = document.getElementById('section-form-container');

    // Handle change events
    inputs.forEach(button => {
        button.addEventListener('change', function () {
            const categoryName = this.dataset.name;
            const whatId = this.value;

            // Update URL
            const url = new URL(window.location);
            url.searchParams.set('project', categoryName);
            window.history.replaceState(null, '', url);

            // Fetch and display content
            container.innerHTML = '<div class="text-muted">Loading...</div>';
            fetch(`/admin/content/${whatId}/ajax-form`)
                .then(response => response.text())
                .then(html => {
                    container.innerHTML = html;
                })
                .catch(err => {
                    container.innerHTML = '<div class="text-danger">Failed to load content.</div>';
                    console.error(err);
                });
        });
    });

    // On page load: auto-fetch if ?project=... is in URL
    window.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const selectedProject = urlParams.get('project');

        if (selectedProject) {
            // Try to find the matching input based on data-name
            inputs.forEach(input => {
                if (input.dataset.name === selectedProject) {
                    input.checked = true;
                    input.dispatchEvent(new Event('change')); // Trigger the change
                }
            });
        }
    });
</script>
</body>
