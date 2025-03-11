<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    protected $fillable = ['name','slug','api_key','api_secret','status'];
}

