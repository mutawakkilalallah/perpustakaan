<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nis',
        'nama',
        'jenis_kelamin',
        'id_kelas',
        'id_kamar',
        'alamat',
    ];
    
    protected $table = "anggota";
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    protected $with = ['kelas', 'kamar'];
    public $incrementing = false;
    protected $dates = ['tanggal_lahir'];

    // filter data
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['id_kamar'] ?? false, function($query, $id_kamar) {
            return $query->where('id_kamar',  $id_kamar);
        });

        $query->when($filters['id_kelas'] ?? false, function($query, $id_kelas) {
            return $query->where('id_kelas',  $id_kelas);
        });

        $query->when($filters['jenis_kelamin'] ?? false, function($query, $jenis_kelamin) {
            return $query->where('jenis_kelamin',  $jenis_kelamin);
        });
    }

    // relasi ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // relasi ke kamar
    public function kamar()
    {
        return $this->belongsTo(Kamar::class, 'id_kamar');
    }
}
