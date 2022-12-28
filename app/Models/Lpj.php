<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpj extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kegiatan','tema_kegiatan','waktu_pelaksanaan','tempat_pelaksanaan','file'];
}
