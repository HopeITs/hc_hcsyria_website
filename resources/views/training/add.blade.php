<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <?php $page = 'add' ?>
    @include('training.navbar')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add</title>
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/backend.css" rel="stylesheet">
    @stack('navbar_styles')
    <link rel="shortcut icon" href="/images/ico/favicon.ico">
    <style>
        .alert {
            margin-top: 2rem;
        }

        th,
        td {
            text-align: center;
        }

        .edit-btn {
            margin-left: 6px;
        }
    </style>
</head>
<body>

@stack('navbar_body')

<div id="main">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-center">Add Notes</h1>
        </div>
        <div class="col-md-6">
            <h3 class="text-center">{{$table}}</h3>
        </div>
    </div>


</div>
</body>