<?php

namespace App\Http\Controllers;

use App\Models\Item; //mengambil model item dari namespace App\Models 
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();  // Mengambil semua data item dari database
        return view('items.index', compact('items')); // Mengembalikan view 'items.index' dengan data item yang telah diambil
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create'); // Mengembalikan view 'items.create' untuk membuat item baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([ 
            'name' => 'required', // Nama item harus diisi
            'description' => 'required', // Deskripsi item harus diisi
        ]);

        //Item::create($request->all()); 
        //return redirect()->route('items.index'); 

        // Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description']));
        // Mengembalikan redirect ke route 'items.index' dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item added successfully.'); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        // Mengembalikan view 'items.show' dengan data item yang dipilih
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        // Mengembalikan view 'items.edit' dengan data item yang dipilih
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([ 
            'name' => 'required', // Nama item harus diisi
            'description' => 'required', // Deskripsi item harus diisi
        ]);

        // Mengupdate item yang dipilih dengan data yang telah divalidasi
        // Hanya masukkan atribut yang diizinkan untuk mencegah serangan mass assignment
        $item->update($request->only(['name', 'description']));
        // Mengembalikan redirect ke route 'items.index' dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // Menghapus item yang dipilih dari database
        $item->delete(); 
        // Mengembalikan redirect ke route 'items.index' dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
