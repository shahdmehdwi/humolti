<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    protected $filable=[
        'email',
        'password',
        'name',
        'phoneNumber',
        'location',
    ];
}
