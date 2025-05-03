<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'school_info';

    protected $fillable = ['id', 'name', 'phone_number', 'address', 'province', 'city', 'total_student'];
    public $timestamps = false;
}
