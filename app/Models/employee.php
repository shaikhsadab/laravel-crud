<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class employee extends Model
{

    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'mobile',
        'address',
        'gender',
        'hobby',
        'file'
    ];

}
