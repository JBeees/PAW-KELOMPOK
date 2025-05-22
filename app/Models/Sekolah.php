<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sekolah extends Model
{
    use HasFactory;
    protected $table = 'school_info';

    protected $fillable = ['id', 'name', 'phone_number', 'address', 'province', 'city', 'total_student'];
    public $timestamps = false;
}
