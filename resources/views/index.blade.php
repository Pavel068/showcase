<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/app.css">
    <title>{{env('APP_NAME')}}</title>

    <style>
        body {
            color: #8A94A7 !important;
        }

        .card, card * {
            color: #242830 !important;
        }

        .back-button {
            font-size: 14px !important;
        }
    </style>
</head>

<body class="is-boxed has-animations">

<div id="app">
    <router-view :key="$route.fullPath"></router-view>
</div>

<script src="{{mix('/js/app.js')}}"></script>

</body>
</html>
