<?php
/**
 * Created by PhpStorm.
 * User: myuce
 * Date: 15.12.2016
 * Time: 22:21
 */

namespace app\Libraries;

class PaytrUtil
{

    private $merchant_id = 116599;
    private $merchant_key = "HnS9wbXMfZn4J9Ee";
    private $merchant_salt = "W2K515hg3ujkfTMP";
    private $merchant_ok_url = "https://zirvesapka.com.com/payment/success";
    private $merchant_fail_url = "https://zirvesapka.com/payment/fail";
    private $timeout_limit = "30";
    private $debug_on = 0;
    private $no_installment = 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın
    ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
    ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
    private $max_installment = 9;
    private $paytr_token;
    private $hash_str;
    private $currency = "TL";

    public function sendPayment($email, $payment_amount, $siparis_no, $user_name_surname, $user_address, $user_phone, $user_basket)
    {
        //Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $merchant_oid = $siparis_no;
        // Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        $user_name = $user_name_surname;

        ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        $user_ip = $this->getUserIp();
        //$user_ip = "85.98.169.152";
        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $this->hash_str = $this->merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $this->no_installment . $this->max_installment . $this->currency;
        $this->paytr_token = base64_encode(hash_hmac('sha256',  $this->hash_str . $this->merchant_salt, $this->merchant_key, true));
        $post_vals = array(
            'merchant_id' => $this->merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $this->paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $this->debug_on,
            'no_installment' => $this->no_installment,
            'max_installment' => $this->max_installment,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $this->merchant_ok_url,
            'merchant_fail_url' => $this->merchant_fail_url,
            'timeout_limit' => $this->timeout_limit,
            'currency' => $this->currency
        );
        return $this->getToken($post_vals);
    }

    private function getUserIp()
    {
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            if (strstr($ip, ',')) {
                $tmp = explode(',', $ip);
                $ip = trim($tmp[0]);
            }
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
        return $ip;
    }

    /**
     * @param $post_vals
     * @return array
     */
    private function getToken($post_vals)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $result = @curl_exec($ch);

        if (curl_errno($ch))
            die("PAYTR IFRAME connection error. err:" . curl_error($ch));

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success'){
            return array("status"=>'success', "token"=>$result['token']);

        }
        else{
            return array("status"=>'error', "reason"=>$result['reason']);
        }




    }

    /**
     * @return string
     */
    public function getMerchantKey()
    {
        return $this->merchant_key;
    }

    /**
     * @return string
     */
    public function getMerchantSalt()
    {
        return $this->merchant_salt;
    }

    /**
     * @return int
     */
    public function getMerchantId()
    {
        return $this->merchant_id;
    }

    /**
     * @param int $merchant_id
     */
    public function setMerchantId($merchant_id)
    {
        $this->merchant_id = $merchant_id;
    }

    /**
     * @return string
     */
    public function getMerchantOkUrl()
    {
        return $this->merchant_ok_url;
    }

    /**
     * @param string $merchant_ok_url
     */
    public function setMerchantOkUrl($merchant_ok_url)
    {
        $this->merchant_ok_url = $merchant_ok_url;
    }

    /**
     * @return string
     */
    public function getMerchantFailUrl()
    {
        return $this->merchant_fail_url;
    }

    /**
     * @param string $merchant_fail_url
     */
    public function setMerchantFailUrl($merchant_fail_url)
    {
        $this->merchant_fail_url = $merchant_fail_url;
    }

    /**
     * @return string
     */
    public function getTimeoutLimit()
    {
        return $this->timeout_limit;
    }

    /**
     * @param string $timeout_limit
     */
    public function setTimeoutLimit($timeout_limit)
    {
        $this->timeout_limit = $timeout_limit;
    }

    /**
     * @return int
     */
    public function getDebugOn()
    {
        return $this->debug_on;
    }

    /**
     * @param int $debug_on
     */
    public function setDebugOn($debug_on)
    {
        $this->debug_on = $debug_on;
    }

    /**
     * @return int
     */
    public function getNoInstallment()
    {
        return $this->no_installment;
    }

    /**
     * @param int $no_installment
     */
    public function setNoInstallment($no_installment)
    {
        $this->no_installment = $no_installment;
    }

    /**
     * @return int
     */
    public function getMaxInstallment()
    {
        return $this->max_installment;
    }

    /**
     * @param int $max_installment
     */
    public function setMaxInstallment($max_installment)
    {
        $this->max_installment = $max_installment;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
    /**
     * @return mixed
     */
    public function getHashStr()
    {
        return $this->hash_str;
    }
    /**
     * @return mixed
     */
    public function getPaytrToken()
    {
        return $this->paytr_token;
    }


}