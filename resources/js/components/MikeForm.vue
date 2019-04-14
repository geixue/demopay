<template>
    <div>

        <div v-if="paid" class="section">
            <div class="has-text-centered">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
                <p><strong>订单支付成功</strong></p>
            </div>
        </div>

        <div v-else class="section">
            <h2 class="title is-6">
              订单号：  <code style="font-size: 1.5em;">{{trade_no}}</code>
            </h2>
            <button @click="payment" class="button is-large is-info is-fullwidth">去支付 3.00 元</button>
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
