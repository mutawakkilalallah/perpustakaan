<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // kolom yang boleh di isi
    protected $fillable = [
        'uuid',
        'uuid_user',
        'akses',
        'username',
        'password'
    ];
    
    // nama table
    protected $table = "users";
    // uuid sebagai primary
    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;
    // relasi N+1
    protected $with = ['anggota'];

    // filter data
    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('username', 'like', '%' . $search . '%');
        });

        $query->when($filters['akses'] ?? false, function($query, $akses) {
            return $query->where('akses',  $akses);
        });
    }
    
    // relasi ke anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'uuid_user');
    }
}
