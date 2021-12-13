<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_kelamin'
    ];
    
    protected $table = "kelas";

    // filter data
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['jenis_kelamin'] ?? false, function($query, $jenis_kelamin) {
            return $query->where('jenis_kelamin',  $jenis_kelamin);
        });
    }
}
