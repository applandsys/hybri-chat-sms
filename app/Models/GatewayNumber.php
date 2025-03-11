<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GatewayNumber extends Model
{
    protected $fillable = ['user_id','gateway_id','number','limit','status'];
}

