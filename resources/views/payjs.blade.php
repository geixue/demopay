@extends('app')

@section('content')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="/">首页</a></li>
            <li class="is-active"><a href="#" aria-current="page">Payjs 收款</a></li>
        </ul>
    </nav>

    <h1 class="title"><a href="https://geixue.com/payjs" target="_blank"> Payjs 收款 </a> </h1>
    <h2 class="subtitle">
        <a href="https://geixue.com/payjs" target="_blank"> Payjs </a> 是由 <strong>北京顶风科技有限公司</strong> 基于微信支付服务商的小商户开发的收款服务。
        目前是只支持 <strong>微信支付</strong> 这一种支付方式
    </h2>

    @include('product')
    <check-form></check-form>
@endsection
