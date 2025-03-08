<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        //     // 'nama' => 'Pelanggan Pertama', //eluqoent model
        // ];
        // UserModel::create($data); //menambahkan data ke tabel m_user
        // UserModel::insert($data); //menambahkan data ke tabel m_user
        // UserModel::where('username', 'customer-1')->update($data);

        //coba akses model UserModel
        // $user = UserModel::all(); //mengambil semua data dari tabel m_user
        // $user = UserModel::find(1); //mengambil data dari tabel m_user dengan id 1
        $user = UserModel::where('level_id', 1)->first(); //mengambil data dari tabel m_user dengan level_id 1
        // $user = UserModel::firstWhere('level_id', 1); //mengambil data dari tabel m_user dengan level_id 1
        return view('user', ['data' => $user]); //mengirim data ke view user
    }
}
