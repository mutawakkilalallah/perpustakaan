<?php

namespace Database\Seeders;

use App\Models\Kamar;
use App\Models\Kelas;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KategoriSeeder::class
        ]);

        // seeder kelas
        Kelas::create([
            "nama" => "X PK I",
            "jenis_kelamin" => "L"
        ]); 
        Kelas::create([
            "nama" => "X PK II",
            "jenis_kelamin" => "P"
        ]); 
        Kelas::create([
            "nama" => "XI PK I",
            "jenis_kelamin" => "L"
        ]); 
        Kelas::create([
            "nama" => "XI PK II",
            "jenis_kelamin" => "P"
        ]); 
        Kelas::create([
            "nama" => "XII PK I",
            "jenis_kelamin" => "L"
        ]); 
        Kelas::create([
            "nama" => "XII PK II",
            "jenis_kelamin" => "P"
        ]);
        Kelas::create([
            "nama" => "UNUJA Putra",
            "jenis_kelamin" => "L"
        ]);
        Kelas::create([
            "nama" => "UNUJA Putri",
            "jenis_kelamin" => "P"
        ]);
        
        // seeder kamar
        Kamar::create([
            "nama" => "Al-Hasyimi",
            "jenis_kelamin" => "L"
        ]); 
        Kamar::create([
            "nama" => "Al-Chotimi",
            "jenis_kelamin" => "L"
        ]); 
        Kamar::create([
            "nama" => "Al-Haqqi",
            "jenis_kelamin" => "L"
        ]); 
        Kamar::create([
            "nama" => "Az-Zuhri",
            "jenis_kelamin" => "L"
        ]); 
        Kamar::create([
            "nama" => "B.01",
            "jenis_kelamin" => "P"
        ]); 
        Kamar::create([
            "nama" => "B.02",
            "jenis_kelamin" => "P"
        ]); 
        Kamar::create([
            "nama" => "B.03",
            "jenis_kelamin" => "P"
        ]); 
        Kamar::create([
            "nama" => "B.04",
            "jenis_kelamin" => "P"
        ]); 
        Kamar::create([
            "nama" => "B.05",
            "jenis_kelamin" => "P"
        ]); 
        Kamar::create([
            "nama" => "B.06",
            "jenis_kelamin" => "P"
        ]);
        
        // seeder anggota
        // pengurus
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "rifqoh.png",
            "niup" => 11420404023,
            "nama" => "Rifqoh Wasilah",
            "jenis_kelamin" => "P",
            "tempat_lahir" => "Pamekasan",
            "tanggal_lahir" => "2001/04/17",
            "status" => "pengurus",
            "alamat" => "Pamekasan, Kab. Pamekasan",
            "id_kamar" => 10,
            "id_kelas" => 8,
        ]); 
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "kiki.png",
            "niup" => 11720903664,
            "nama" => "Moh. Rafiqil Ulum",
            "jenis_kelamin" => "L",
            "tempat_lahir" => "Sumenep",
            "tanggal_lahir" => "2001/11/15",
            "status" => "pengurus",
            "alamat" => "Gapura, Kab. Sumenep",
            "id_kamar" => 1,
            "id_kelas" => 7,
        ]);
        // Pr
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "ummah.png",
            "niup" => 11820000301,
            "nama" => "Sarisaadatul Ummah",
            "jenis_kelamin" => "P",
            "tempat_lahir" => "Situbondo",
            "tanggal_lahir" => "2005/09/10",
            "status" => "siswa",
            "alamat" => "Mangaran, Kab. Situbondo",
            "id_kamar" => 7,
            "id_kelas" => 2,
        ]); 
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "kornelia.png",
            "niup" => 11720002391,
            "nama" => "Kornelia Alviatus Sholihah Hasyimi",
            "jenis_kelamin" => "P",
            "tempat_lahir" => "Bondowoso",
            "tanggal_lahir" => "2004/04/20",
            "status" => "siswa",
            "alamat" => "Wonosari, Kab. Bondowoso",
            "id_kamar" => 8,
            "id_kelas" => 4,
        ]); 
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "holida.png",
            "niup" => 11620803045,
            "nama" => "Nur Diana Holida",
            "jenis_kelamin" => "P",
            "tempat_lahir" => "Bondowoso",
            "tanggal_lahir" => "2004/03/08",
            "status" => "siswa",
            "alamat" => "Tenggarang, Kab. Bondowoso",
            "id_kamar" => 9,
            "id_kelas" => 6,
        ]);
        // Lk
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "nasir.png",
            "niup" => 12120113400,
            "nama" => "Muhammad Nasir",
            "jenis_kelamin" => "L",
            "tempat_lahir" => "Bondowoso",
            "tanggal_lahir" => "2004/12/16",
            "status" => "siswa",
            "alamat" => "Sukosari, Kab. Bondowoso",
            "id_kamar" => 2,
            "id_kelas" => 1,
        ]); 
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "wafi.png",
            "niup" => 11720103017,
            "nama" => "Ruhulloh Ali Wafi",
            "jenis_kelamin" => "L",
            "tempat_lahir" => "Patrang",
            "tanggal_lahir" => "2004/12/10",
            "status" => "siswa",
            "alamat" => "Patrang, Kab. Patrang",
            "id_kamar" => 3,
            "id_kelas" => 3,
        ]); 
        Anggota::create([
            "uuid" => Str::uuid(),
            "photo" => "salman.png",
            "niup" => 11620302867,
            "nama" => "Ahmad Salman Hamidi",
            "jenis_kelamin" => "L",
            "tempat_lahir" => "Situbondo",
            "tanggal_lahir" => "2003/12/09",
            "status" => "siswa",
            "alamat" => "Besuki, Kab. Situbondo",
            "id_kamar" => 4,
            "id_kelas" => 5,
        ]);
        // spesial person 
        Anggota::create([
            "uuid" => "07d74892-4ebf-4a58-a17c-9a35166e995b",
            "photo" => "alfi.png",
            "niup" => 21420604012,
            "nama" => "Alfi Nurindiana",
            "jenis_kelamin" => "P",
            "tempat_lahir" => "Bondowoso",
            "tanggal_lahir" => "2002/05/02",
            "status" => "pengurus",
            "alamat" => "Bondowoso, Kab. Bondowoso",
            "id_kamar" => 10,
            "id_kelas" => 8,
        ]);
        Anggota::create([
            "uuid" => "278eb73b-f7c2-49bb-b999-a621e0b50223",
            "photo" => "bidadari.png",
            "niup" => 240420,
            "nama" => "Bidadari Tak Bersayap",
            "jenis_kelamin" => "P",
            "tempat_lahir" => "Sumenep",
            "tanggal_lahir" => "2002/11/02",
            "status" => "pengurus",
            "alamat" => "Mars, Angkasa",
            "id_kamar" => 10,
            "id_kelas" => 8,
        ]);
        // user
        User::create([
            "uuid" => Str::uuid(),
            "uuid_user" => "07d74892-4ebf-4a58-a17c-9a35166e995b",
            "akses" => "sysadmin",
            "username" => "chaca",
            "password" => Hash::make("duamei2002"),
        ]); 
        User::create([
            "uuid" => Str::uuid(),
            "uuid_user" => "278eb73b-f7c2-49bb-b999-a621e0b50223",
            "akses" => "sysadmin",
            "username" => "alien",
            "password" => Hash::make("alien"),
        ]); 
    }
}
