<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Akun extends Model
{
    use HasFactory;
    protected $table = 'school_account';

    protected $fillable = ['id', 'email', 'password'];
    public $timestamps = false;
}
