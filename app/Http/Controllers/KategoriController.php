<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    // controller get data kategori
    public function getKategori(Request $request)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai hak akses');
            return redirect('/');
        }

        $data = [
            // data Kategori
            "kategori" => Kategori::filter(request(['search']))->paginate(5)->withQueryString(),
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Master Data - Kategori"
        ];

        return view('kategori.index', $data);
    }

    // controller halaman tambah kategori
    public function tambahKategori(Request $request)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai akses');
            return redirect('/');
        }

        $data = [
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Tambah - Master Data - Kategori"
        ];
        return view('kategori.tambah', $data);
    }

    // controller simpan kategori
    public function saveKategori(Request $request)
    {

        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required'
        ],
        // pesan validasi
        [
            // nama
            'nama.required' => "nama harus diisi"
        ]
        );
        
        $validData = $validator->validated();

        Kategori::create($validData);

        $request->session()->flash('success', 'berhasil menambahkan kategori');

        return redirect('/master-data/kategori');
    }

    // controller halaman edit kategori
    public function editKategori(Request $request, Kategori $kategori)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai hak akses');
            return redirect('/');
        }

        $data = [
            // data kategori yang dipilih
            "kategori" => $kategori,
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Edit - Master Data - Kategori"
        ];
        return view('kategori.edit', $data);
    }

    // controller update kategori
    public function updateKategori(Request $request, Kategori $kategori)
    {

        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required'
        ],
        // pesan validasi
        [
            // nama
            'nama.required' => "nama harus diisi"
        ]
        );
        
        $validData = $validator->validated();

        Kategori::where('id', $kategori->id)
            ->update($validData);

        $request->session()->flash('success', 'berhasil mengubah kategori');

        return redirect('/master-data/kategori');
    }

    // controller delete kategori
    public function deleteKategori(Request $request, Kategori $kategori)
    {

        Kategori::destroy($kategori->id);

        $request->session()->flash('success', 'berhasil menghapus kategori');

        return redirect('/master-data/kategori');
    }
}
