<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_product extends Model
{
    protected $fillable = ['idcart', 'idprod', 'qty'];
}
