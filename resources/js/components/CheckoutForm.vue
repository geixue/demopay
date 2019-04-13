<template>
    <div class="container">
        <form @submit.prevent="payment" @keydown="form.onKeydown($event)">
            <button class="button is-success" type="submit">去支付</button>
        </form>

        <div class="modal" :class="{'is-active': opened}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">使用微信支付</p>
                    <button @click="closeModal" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">

                    <div v-if="paid">
                        <p><strong>订单支付成功</strong></p>
                    </div>

                    <div v-else>
                        <div class="has-text-centered" v-if="url">
                            <qrcode :value="url" :options="{ width: 200 }"></qrcode>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        mounted() {

        },
        data() {
            timeId: null
            return {
                url: '',
                opened: false,
                paid: false
            }
        },
        methods: {
            checkPayment(trade_no){
                axios.post('/payment/check',{trade_no: trade_no}).then(response => {
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
                axios.post('/payment').then(response => {
                    this.url = response.data.url
                    this.intervalPayment(response.data.trade_no)
                    this.opened = true
                })
            },
            closeModal() {
                this.opened = false
            }
        }
    }
</script>
