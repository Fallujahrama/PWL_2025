<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //agar dapat menerima inputan dari user
    protected $fillable = [
        'name',
        'description',
    ];
}
