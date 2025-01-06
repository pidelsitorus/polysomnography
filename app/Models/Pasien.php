<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Pasien extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'nama_pasien',
        'umur_pasien',
        'tanggal_pemeriksaan',
        'hasil_pemeriksaan',
    ];
}