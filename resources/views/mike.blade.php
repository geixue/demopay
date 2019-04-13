<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>给学网个人支付收款教程 - Mikecrm</title>

    <link href="/css/app.css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
<div id="app">
    <div class="content">
        <mike-form trade="{{$payment->trade_no}}"></mike-form>
    </div>
</div>
</body>
<script src="/js/app.js"></script>
</html>
