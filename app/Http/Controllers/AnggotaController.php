<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kelas;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCode;

class AnggotaController extends Controller
{
    // get siswa
    public function getSiswa()
    {
        $user = Anggota::where('uuid', auth()->user()->uuid_user)->first();
        if (auth()->user()->akses == "sysadmin") {
            $anggota = Anggota::filter(request(['search', 'id_kamar', 'id_kelas', 'jenis_kelamin']))->paginate(5)->withQueryString();
            $kamar = Kamar::all();
            $kelas = Kelas::all();
        } 
        else if (auth()->user()->akses == "admin") {
            $anggota = Anggota::filter(request(['search', 'id_kamar', 'id_kelas', 'jenis_kelamin']))->paginate(5)->withQueryString();
            $kamar = Kamar::all();
            $kelas = Kelas::all();
        } else if (auth()->user()->akses == "supervisor") {
            $anggota = Anggota::filter(request(['search', 'id_kamar', 'id_kelas', 'jenis_kelamin']))->paginate(5)->withQueryString();
            $kamar = Kamar::all();
            $kelas = Kelas::all();
        } else {
        $anggota = Anggota::filter(request(['search', 'id_kamar', 'id_kelas', 'jenis_kelamin']))->where('jenis_kelamin', $user->jenis_kelamin)->paginate(5)->withQueryString();
        $kamar = Kamar::where('jenis_kelamin', $user->jenis_kelamin)->get();
        $kelas = Kelas::where('jenis_kelamin', $user->jenis_kelamin)->get();
        }
        
        $data = [
            "data" => $anggota,
            "user" => $user,
            "kamar" => $kamar,
            "kelas" => $kelas,
            "kamarSelected" => Kamar::where('id', request('id_kamar'))->first(),
            "kelasSelected" => Kelas::where('id', request('id_kelas'))->first(),
            "title" => "Data Siswa/i"
        ];

        // return Carbon::parse($anggota->tanggal_lahir)->translatedFormat('d M Y');
        return view('anggota.siswa', $data);
    }

    // get detail person
    // public function detail(Anggota $anggota)
    // {
    //     $data = [
    //         "data" => $anggota,
    //         "title" => "Detail Person"
    //     ];

    //     return view('anggota.detail', $data);
    // }

    // public function tambah()
    // {
        
    //     $data = [
    //         "title" => "Tambah Person"
    //     ];

    //     return view('anggota.tambah', $data);
    // }

    // public function save(Request $request)
    // {
    //     DB::table('anggota')->insert([
    //         "uuid" => Str::uuid(),
    //         "niup" => 128963219873,
    //         "photo" => "rifqoh.png",
    //         "nama" => $request->input('nama'),
    //         "jenis_kelamin" => $request->input('jenis_kelamin'),
    //         "status" => $request->input('status'),
    //         "tempat_lahir" => $request->input('tempat_lahir'),
    //         "tanggal_lahir" => "12/04/2004",
    //         "alamat" => $request->input('alamat'),
    //         "id_kelas" => $request->input('kelas'),
    //         "id_kamar" => $request->input('kamar'),
            
    //     ]);

    //     return redirect('/siswa');
    // }
}
