<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentNotify extends Model
{

    protected $table = 'paymentnotify';

    protected $primaryKey = 'ID';

    public $timestamps = false;


    public static function isPaymentValid($hash)
    {
        return PaymentNotify::where(["HashCrypted" => $hash])->count() > 0;
    } 

}
