# 给学网个人收款

GeiXue.com 个人收款视频教程 - 支持支付宝和微信支付的个人收款 ： https://geixue.com/course/online-payment-service-for-individual-5qc5uy

### Demo 演示
链接：https://pay.geixue.com

### 使用

**第一步，clone 此项目**

```shell
git clone https://github.com/geixue/demopay.git
```

**第二步，配置 env**

在 `.env` 文件中配置数据链接， Payjs 的商户号和商户秘钥，给学网的支付推送 `API_KEY`：

```
# 数据库链接
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pay-demo
DB_USERNAME=root
DB_PASSWORD=

# Payjs 的商户号和商户秘钥 https://payjs.cn/dashboard
PAYJS_MCHID=
PAYJS_KEY=

# 给学网支付推送API_KEY https://hook.geixue.com/dashboard
GEIXUE_API_KEY=

```

**第三步，分别执行下面三个命令**

```shell
yarn 
// 或者 npm install

composer install

php artisan migrate

```
