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
        // $user = UserModel::where('level_id', 1)->first(); //mengambil data dari tabel m_user dengan level_id 1
        // $user = UserModel::firstWhere('level_id', 1); //mengambil data dari tabel m_user dengan level_id 1

        // $user = UserModel::findOr(20, ['username', 'nama'], function (){ //mencari data dari tabel m_user dengan id 1 atau username dan nama
        //     abort(404); //jika data tidak ditemukan, kembali dengan error 404
        // });

        // $user = UserModel::findOrFail(1); //mengambil data dari tabel m_user dengan id 1 atau error 404
        // $user = UserModel::where('username', 'manager9')->firstOrFail(); //mengambil data dari tabel m_user dengan username manager9 atau error 404

        // $user = UserModel::where('level_id', 2)->count(); 
        // dd($user);

        $user = UserModel::firstOrCreate(
            [
                'username' => 'manager22',
                'nama' => 'Manager Dua Dua',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        return view('user', ['data' => $user]); //mengirim data ke view user
    }
}
