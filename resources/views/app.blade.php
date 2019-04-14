<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>给学网个人支付收款教程 - Mikecrm</title>

    <meta name="author" content="GeiXue.com">
    <meta name="keywords" content="geixue,geixue.com,给学网,给学">
    <meta name="description" content="支持个人收款和线上支付的解决方案">

    <link rel="apple-touch-icon" sizes="180x180" href="https://geixue.com/assets/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://geixue.com/assets/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://geixue.com/assets/favicon-16x16.png">
    <link rel="mask-icon" href="https://geixue.com/assets/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href="/css/app.css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<div id="app">
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8 is-offset-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</div>
@include('foot')
</body>

<script src="/js/app.js"></script>
</html>
