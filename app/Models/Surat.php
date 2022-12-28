<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal','nomor_surat','perihal','dari','jenis_surat','tanggal_diterima','file'];
}
