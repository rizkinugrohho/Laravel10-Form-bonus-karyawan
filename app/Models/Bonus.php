<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_bonus',
        'employee1',
        'percentage1',
        'bonus1',
        'employee2',
        'percentage2',
        'bonus2',
        'employee3',
        'percentage3',
        'bonus3',
    ];
}
