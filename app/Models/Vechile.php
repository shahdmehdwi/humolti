<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vechile extends Model
{
    protected $filable=[
        'licensePlate',
        'type',
    ];
}
