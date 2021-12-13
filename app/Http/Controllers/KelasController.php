<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    // controller get data kelas
    public function getKelas(Request $request)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai hak akses');
            return redirect('/');
        }

        $data = [
            // data kelas
            "data" => Kelas::filter(request(['search', 'jenis_kelamin']))->paginate(5)->withQueryString(),
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Master Data - Kelas"
        ];

        return view('kelas.index', $data);
    }
    
    // controller halaman tambah kelas
    public function tambahKelas(Request $request)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai akses');
            return redirect('/');
        }

        $data = [
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Tambah Master Data Kelas"
        ];
        return view('kelas.tambah', $data);
    }

    // controller simpan kelas
    public function saveKelas(Request $request)
    {

        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'jenis_kelamin' => 'required'
        ],
        // pesan validasi
        [
            // nama
            'nama.required' => "nama harus diisi",
            // jenis_kelamin
            'jenis_kelamin.required' => "harap pilih kategori terlebih dahulu"
        ]
        );
        
        $validData = $validator->validated();

        Kelas::create($validData);

        $request->session()->flash('success', 'berhasil menambahkan kelas');

        return redirect('/master-data/kelas');
    }

    // controller halaman edit kelas
    public function editKelas(Request $request, Kelas $kelas)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai hak akses');
            return redirect('/');
        }

        $data = [
            // data kelas yang dipilih
            "data" => $kelas,
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Edit Master Data Kelas"
        ];
        return view('kelas.edit', $data);
    }

    // controller update kelas
    public function updateKelas(Request $request, Kelas $kelas)
    {

        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'jenis_kelamin' => 'required'
        ],
        // pesan validasi
        [
            // nama
            'nama.required' => "nama harus diisi",
            // jenis_kelamin
            'jenis_kelamin.required' => "harap pilih kategori terlebih dahulu"
        ]
        );
        
        $validData = $validator->validated();

        Kelas::where('id', $kelas->id)
            ->update($validData);

        $request->session()->flash('success', 'berhasil mengubah kelas');

        return redirect('/master-data/kelas');
    }

    // controller delete kelas
    public function deleteKelas(Request $request, Kelas $kelas)
    {

        Kelas::destroy($kelas->id);

        $request->session()->flash('success', 'berhasil menghapus kelas');

        return redirect('/master-data/kelas');
    }
}
