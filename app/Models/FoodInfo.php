<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodInfo extends Model
{
    protected $table = 'food_info';

    protected $fillable = ['id_sekolah', 'id_makanan', 'nama_pengirim', 'phone_number', 'waktu', 'tanggal', 'jumlah_porsi', 'jumlah_siswa', 'kualitas_bagus', 'kualitas_buruk', 'dokumentasi', 'catatan'];
    public $timestamps = false;
}
