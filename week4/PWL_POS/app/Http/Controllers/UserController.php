<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $data = [
            'level_id' => 2,
            'username' => 'manager_dua',
            'nama' => 'Manager 2',
            'password' => Hash::make('12345')
            // 'nama' => 'Pelanggan Pertama', //eluqoent model
        ];
        UserModel::create($data); //menambahkan data ke tabel m_user
        // UserModel::insert($data); //menambahkan data ke tabel m_user
        // UserModel::where('username', 'customer-1')->update($data);

        //coba akses model UserModel
        $user = UserModel::all(); //mengambil semua data dari tabel m_user
        return view('user', ['data' => $user]); //mengirim data ke view user
    }
}
