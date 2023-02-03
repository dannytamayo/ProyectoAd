<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travels';
    protected $fillable = [
        'main_street',
        'secondary_street',
        'reference',
        'neighborhood',
        'additional_information',
        'status',
        'user_id',
        'driver_id'
    ];
}
