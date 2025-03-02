<!DOCTYPE html>
<html>
<head>
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>

    <!-- Direktif Blade yang memeriksa apakah ada pesan sukses di session -->
    @if(session('success'))
        <!-- Tag paragraf yang menampilkan pesan sukses di session -->
        <p>{{ session('success') }}</p>
    @endif

    <!-- Tag anchor yang menampilkan link untuk menambahkan item baru -->
    <a href="{{ route('items.create') }}">Add Item</a>

    <ul>
        <!-- Direktif Blade yang melakukan iterasi pada koleksi item -->
        @foreach ($items as $item)
            <li>
                <!-- Tag yang menampilkan nama item -->
                {{ $item->name }} -
                <!-- Tag anchor yang menampilkan link untuk mengedit item -->
                <a href="{{ route('items.edit', $item) }}">Edit</a>
                <!-- Tag form yang menampilkan link untuk menghapus item -->
                <form action="{{ route('items.destroy', $item) }}" method="POST" style="display:inline;">
                    <!-- Direktif Blade yang menambahkan token CSRF pada form -->
                    @csrf
                    <!-- Direktif Blade yang menentukan metode DELETE untuk menghapus item -->
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>