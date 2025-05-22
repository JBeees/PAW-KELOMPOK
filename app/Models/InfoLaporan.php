<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class InfoLaporan extends Model
{
    use HasFactory;
    protected $table = 'info_laporan';
    protected $fillable = ['id', 'tipe_laporan', 'email', 'deskripsi', 'image', 'created_at', 'update_at'];
    protected $primaryKey = 'id';
}
