<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }

    public function about() {
        return 'NIM : 2341760005 Nama : Fallujah Ramadi C';
    }

    public function articles($id) {
        return 'Halaman Artikel dengan Id : ' .$id;
    }
}
