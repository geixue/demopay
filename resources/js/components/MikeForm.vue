<template>
    <div class="container">

        <div v-if="paid" class="section">
            <h2 class="title is-4">支付成功啦！</h2>
        </div>

        <div v-else class="section">
            <h2 class="title is-6">
              订单号：  <code>{{trade_no}}</code>
            </h2>
            <button @click="payment" class="button is-large">去支付 3.00 元</button>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['trade'],
        data() {
            timeId: null
            return {
                trade_no: this.trade,
                paid: false
            }
        },
        methods: {
            checkPayment(trade_no) {
                axios.post('/payment/check', {trade_no: trade_no}).then(response => {
                    this.paid = response.data.paid
                })
            },
            intervalPayment(trade_no) {
                this.timeId = setInterval(() => {
                    if (this.paid) {
                        clearInterval(this.timeId)
                    }
                    this.checkPayment(trade_no)
                }, 3000)
            },
            payment() {
                this.intervalPayment(this.trade_no)
                window.open('http://geixue-com.mikecrm.com/jRAzgOW','_blank')
            }
        }
    }
</script>
