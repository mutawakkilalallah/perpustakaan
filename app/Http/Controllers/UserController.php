<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    // controller get data user
    public function getUser(Request $request)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai hak akses');
            return redirect('/');
        }

        $data = [
            // data user
            "data" => User::filter(request(['search', 'akses']))->paginate(5)->withQueryString(),
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Data User"
        ];

        return view('user.index', $data);
    }
    
    // controller halaman tambah user
    public function tambahUser(Request $request)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai akses');
            return redirect('/siswa');
        }

        $data = [
            // data anggota untuk di pilih
            "anggota" => Anggota::filter(request(['search']))->get(),
            // data anggota yang sudah dipilih sebelumnya
            "anggotaSelected" => Anggota::where('uuid', old('uuid_user'))->first(),
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Tambah User"
        ];
        return view('user.tambah', $data);
    }

    // controller simpan user
    public function saveUser(Request $request)
    {

        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'uuid_user' => 'required|unique:users',
            'username' => 'required|unique:users|min:4|max:8',
            'password' => 'required|confirmed|min:6',
            'akses' => 'required'
        ],
        // pesan validasi
        [
            // uuid_user atau anggota
            'uuid_user.required' => "harap pilih santri terlebih dahulu",
            'uuid_user.unique' => "santri sudah terdaftar sebagi user",
            // username
            'username.required' => "username harus diisi",
            'username.unique' => "username sudah terdaftar",
            'username.min' => "username minimal berisi 4 karakter",
            'username.max' => "username maksimal berisi 8 karakter",
            // password
            'password.required' => "password harus diisi",
            'password.confirmed' => "password tidak sama",
            'password.min' => "password minimal berisi 6 karakter",
            // akses
            'akses.required' => "harap pilih hak akses terlebih dahulu",
        ]
        );
        
        $validData = $validator->validated();
        // generate UUID
        $validData['uuid'] = Str::uuid();
        // hashing password
        $validData['password'] = Hash::make($validData['password']);

        User::create($validData);

        $request->session()->flash('success', 'berhasil menambahkan user');

        return redirect('/user');
    }

    // controller halaman edit user
    public function editUser(Request $request, User $user)
    {
        // validasi untuk sysadmin
        if (auth()->user()->akses != "sysadmin") {
            $request->session()->flash('invalid', 'anda tidak mempunyai hak akses');
            return redirect('/');
        }

        $data = [
            // data user yang dipilih
            "data" => $user,
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Edit User"
        ];
        return view('user.edit', $data);
    }

    // controller halaman profile user
    public function profileUser(User $user)
    {

        $data = [
            // data user yang dipilih
            "data" => $user,
            // data user yang login
            "user" => Anggota::where('uuid', auth()->user()->uuid_user)->first(),
            "title" => "Profile User"
        ];
        return view('user.profile', $data);
    }

    // controller update user
    public function updateUser(Request $request, User $user)
    {

        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'password' => 'required|confirmed|min:6',
            'akses' => 'required'
        ],
        // pesan validasi
        [
            // password
            'password.required' => "password harus diisi",
            'password.confirmed' => "password tidak sama",
            'password.min' => "password minimal berisi 6 karakter",
            // akses
            'akses.required' => "harap pilih hak akses terlebih dahulu",
        ]
        );
        
        $validData = $validator->validated();

        $validData['password'] = Hash::make($validData['password']);

        User::where('uuid', $user->uuid)
            ->update($validData);

        $request->session()->flash('success', 'berhasil mengubah user');

        return redirect('/user');
    }

    // controller update password user
    public function updatePasswordUser(Request $request, User $user)
    {
        // proses validasi

        // rules validasi
        $validator = Validator::make($request->all(),
        [
            'password' => 'required|confirmed|min:6',
        ],
        // pesan validasi
        [
            // password
            'password.required' => "password harus diisi",
            'password.confirmed' => "password tidak sama",
            'password.min' => "password minimal berisi 6 karakter",
        ]
        );
        
        $validData = $validator->validated();

        $validData['password'] = Hash::make($validData['password']);

        User::where('uuid', $user->uuid)
            ->update($validData);

        $request->session()->flash('success', 'berhasil mengubah password');

        return redirect('/user/profile/' . $user->uuid);
    }

    // controller delete user
    public function deleteUser(Request $request, User $user)
    {

        User::destroy($user->uuid);

        $request->session()->flash('success', 'berhasil menghapus user');

        return redirect('/user');
    }
}
