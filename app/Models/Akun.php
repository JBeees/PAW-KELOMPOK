<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Akun extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $table = 'school_account';

    protected $fillable = ['id', 'email', 'password'];
    public $timestamps = false;
    protected $hidden = ['password'];
}
