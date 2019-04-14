@extends('app')

@section('content')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="/">首页</a></li>
            <li class="is-active"><a href="#" aria-current="page">麦客表单收款</a></li>
        </ul>
    </nav>
    <h1 class="title">麦客表单收款</h1>
    <h2 class="subtitle">
        <a href="https://www.mikecrm.com" target="_blank">麦客</a> 表单收款 是由 <strong><a  href="https://www.mikecrm.com" target="_blank">MikeCRM 团队</a></strong>  开发的基于表单的个人收款服务，
        目前新版应该是对接了 <strong>快钱</strong> <a href="https://99bill.com">99bill.com</a> 的商户系统，支付体验上来说还是很好的！
    </h2>
    @include('product')
        <mike-form trade="{{$payment->trade_no}}"></mike-form>

@endsection
