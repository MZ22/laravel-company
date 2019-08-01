<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['reference', 'current_state', 'paid_ht', 'paid_ttc', 'taxe', 'delivery_address', 'idcart', 'id_carrier', 'id_customer', 'id_payment'];
}
