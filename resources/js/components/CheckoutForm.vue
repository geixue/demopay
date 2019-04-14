<template>
    <div style="margin-top: 2em;">
        <form @submit.prevent="payment"
              @keydown="form.onKeydown($event)">
            <input type="hidden"
                   name="channel"
                   v-model="form.channel">
            <button
                class="button is-success is-large is-fullwidth"
                :class="{'is-loading':form.busy}"
                type="submit">去支付 2.00 元
            </button>
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
                        <div class="has-text-centered">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                            </svg>
                            <p><strong>订单支付成功</strong></p>
                        </div>
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
    import {Form, HasError, AlertError} from 'vform'

    export default {
        data() {
            timeId: null
            return {
                form: new Form({
                    channel: 'WECHAT'
                }),
                url: '',
                opened: false,
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
            async payment() {
                const {data} = await this.form.post('/payment')
                this.url = data.url
                this.intervalPayment(data.trade_no)
                this.opened = true
            },
            closeModal() {
                this.opened = false
            }
        }
    }
</script>
