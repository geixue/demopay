@extends('app')

@section('content')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li class="is-active">
                <a href="/" aria-current="page">
                    给学网 - 个人收款解决方案
                </a>
            </li>
        </ul>
    </nav>

     @include('product')

    <h1 class="title" style="margin-top: 2em;">个人收款解决方案</h1>
    <h2 class="subtitle">
        以下两个 <strong>个人收款</strong> 服务都是本人亲自使用过的个人收款解决方案，
        如果您也在找针对个人的收款服务，这两个应该可以帮到您！
    </h2>

    <div class="columns">
        <div class="column">

            <div class="notification">
                <h1 class="title is-3">Payjs 支付</h1>

                <div class="content">
                    <ol type="1">
                        <li>手续费： <strong>1.38%~2.38%</strong> 每笔</li>
                        <li>其他费用：<strong>300元</strong> 认证费</li>
                        <li>支付渠道：微信</li>
                        <li>结算周期：<strong>T+1</strong> 工作日</li>
                        <li>其他限制：单日限额 <strong>5万</strong></li>
                    </ol>
                </div>

                <a  href="/payjs" class="button is-fullwidth is-success is-large">
                    查看支付 Demo
                </a>

            </div>
        </div>
        <div class="column">
            <div class="notification">
                <h1 class="title is-3">麦客表单收款</h1>
                <div class="content">
                    <ol type="1">
                        <li>手续费： <strong>1.49%</strong> 每笔</li>
                        <li>其他费用：无</li>
                        <li>支付渠道：微信和支付宝</li>
                        <li>结算周期：<strong>T+1</strong> 工作日</li>
                        <li>其他限制：<strong>2万</strong> 每笔</li>
                    </ol>
                </div>
                <a href="/mike" class="button is-fullwidth is-info is-large">
                    查看支付 Demo
                </a>
            </div>
        </div>
    </div>
@endsection
