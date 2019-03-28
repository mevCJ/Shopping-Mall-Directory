<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'name',
        'lot_number',
        'zone',
        'level',
        'category',
    ];
}
